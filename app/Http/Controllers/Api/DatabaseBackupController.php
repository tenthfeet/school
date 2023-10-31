<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DatabaseBackupController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        if (auth()->user()->cannot('database_backup viewAny')) {
            abort(403);
        }

        $data['databaseBackupList'] = $this->backupList();
        $data['files'] = $this->getFiles('local');

        // set index for each item in $data['files]
        $data['files'] = array_map(function ($item, $index) {
            $item['index'] = $index;
            return $item;
        }, $data['files'], array_keys($data['files']));

        return $this->responseWithSuccess(message: 'Successfully fetched.', data: $data);
    }

    public function getFiles(string $disk = '')
    {
        if ($disk) {
            $activeDisk = $disk;
        }

        $backupDestination = BackupDestination::create($activeDisk, config('backup.backup.name'));

        return $backupDestination
            ->backups()
            ->map(function (Backup $backup) {
                $size = method_exists($backup, 'sizeInBytes') ? $backup->sizeInBytes() : $backup->size();

                return [
                    'path' => $backup->path(),
                    'file_name' => explode('/', $backup->path())[1],
                    'date' => $backup->date()->format('Y-m-d H:i:s'),
                    'size' => Format::humanReadableSize($size),
                ];
            })
            ->toArray();
    }

    public function backupList(): array
    {
        return BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'))
            ->map(function (BackupDestinationStatus $backupDestinationStatus) {
                return [
                    'name' => $backupDestinationStatus->backupDestination()->backupName(),
                    'disk' => $backupDestinationStatus->backupDestination()->diskName(),
                    'reachable' => $backupDestinationStatus->backupDestination()->isReachable(),
                    'healthy' => $backupDestinationStatus->isHealthy(),
                    'amount' => $backupDestinationStatus->backupDestination()->backups()->count(),
                    'newest' => $backupDestinationStatus->backupDestination()->newestBackup()
                        ? $backupDestinationStatus->backupDestination()->newestBackup()->date()->diffForHumans()
                        : 'No backups present',
                    'usedStorage' => Format::humanReadableSize($backupDestinationStatus->backupDestination()->usedStorage()),
                ];
            })
            ->values()
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function createBackup()
    {
        if (auth()->user()->cannot('database_backup create')) {
            abort(403);
        }

        Artisan::call('backup:run --only-db');
        return $this->responseWithSuccess('Backup successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        if (auth()->user()->cannot('database_backup delete')) {
            abort(403);
        }

        $files = $this->getFiles('local');

        try {
            $deletingFile = $files[$id];
        }
        catch (Exception $exception){
            return $this->responseWithError(message: 'File not found.', code: 404);
        }

        $backupDestination = BackupDestination::create('local', config('backup.backup.name'));

        $backupDestination
            ->backups()
            ->first(function (Backup $backup) use ($deletingFile) {
                return $backup->path() === $deletingFile['path'];
            })
            ->delete();

        return $this->responseWithSuccess('Deleted Successfully.');
    }

    public function databaseBackupDownload(string $fileName)
    {
        if (auth()->user()->cannot('database_backup download')) {
            abort(403);
        }

        $backupDestination = BackupDestination::create('local', config('backup.backup.name'));

        $backup = $backupDestination->backups()->first(function (Backup $backup) use ($fileName) {
            return $backup->path() === config('backup.backup.name').'/'.$fileName;
        });

        if (! $backup) {
            return $this->responseWithError('Backup file not found.');
        }

        return $this->respondWithBackupStream($backup);
    }
    public function respondWithBackupStream(Backup $backup): StreamedResponse
    {
        $fileName = pathinfo($backup->path(), PATHINFO_BASENAME);
        $size = method_exists($backup, 'sizeInBytes') ? $backup->sizeInBytes() : $backup->size();

        $downloadHeaders = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type' => 'application/zip',
            'Content-Length' => $size,
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            'Pragma' => 'public',
        ];

        return response()->stream(function () use ($backup) {
            $stream = $backup->stream();

            fpassthru($stream);

            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, $downloadHeaders);
    }
}
