<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
     * @return Application|Factory|View
     */
    public function index()
    {
        if (auth()->user()->cannot('database_backup viewAny')) {
            abort(403);
        }

        $breadcrumbsItems = [
            [
                'name' => 'Database Backup',
                'url' => route('database-backups.index'),
                'active' => true
            ],
        ];

        $databaseBackupList = $this->backupList();
        $files = $this->getFiles('local');


        return view('database-backup.index', [
            'databaseBackupList' => $databaseBackupList,
            'files' => $files,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Database Backup'
        ]);
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
     * @return RedirectResponse
     */
    public function create()
    {
        if (auth()->user()->cannot('database_backup create')) {
            abort(403);
        }

        Artisan::call('backup:run --only-db');
        return back()->with('message', 'Database backup created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        if (auth()->user()->cannot('database_backup delete')) {
            abort(403);
        }

        $files = $this->getFiles('local');

        $deletingFile = $files[$id];

        $backupDestination = BackupDestination::create('local', config('backup.backup.name'));

        $backupDestination
            ->backups()
            ->first(function (Backup $backup) use ($deletingFile) {
                return $backup->path() === $deletingFile['path'];
            })
            ->delete();

        return back()->with(['message' => 'File Deleted Successfully!']);
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
            return back()->with('error', __('Backup file not found.'));
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
