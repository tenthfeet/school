<?php

namespace App\Http\Controllers\master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FeesBundleRequest;
use App\Models\AcademicStandard;
use App\Models\AcademicYear;
use App\Models\FeesBundle;
use App\Services\FeeDetailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FeesBundleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $academicStandard = AcademicStandard::where('is_active', 1)->get()->toArray();
        $academicYear = AcademicYear::where('is_active', 1)->get()->toArray();
        return $request->wantsJson()
            ? response()->json(['data' => FeesBundle::with('academicYear', 'academicStandard')->get()])
            : view('pages.master.fees-bundle', [
                'academicYears' => $academicYear,
                'academicStandards' => $academicStandard,
                'status' => Status::labelArray(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeesBundleRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $bundleData = $request->only((new FeesBundle())->getFillable());
            $feesBundle = FeesBundle::create($bundleData);
            $feesBundle->feeDetails()->sync($request->fee_details_id);

            DB::commit();
            return response()->json([
                'item' => $feesBundle,
                'message' => [
                    'text' => "{$request->name} added successfully...",
                    'icon' => 'success'
                ]
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return response()->json([
                'message' => [
                    'text' => "Could not  add {$request->name}...",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesBundle $feeBundle, FeeDetailService $service): JsonResponse
    {
        $feeDetails = $service->feeDetailsByYearAndStandard(
            $feeBundle->academic_year_id,
            $feeBundle->academic_standard_id
        );
        $feeDetailsId = $feeBundle->feeDetails->pluck('id');
        $feeDetailsData = [];
        foreach ($feeDetails as $feeDetail) {
            if ($feeDetailsId->contains($feeDetail['id'])) {
                $feeDetail['selected'] = true;
            }
            $feeDetailsData[] = $feeDetail;
        }

        return response()->json(compact('feeBundle', 'feeDetailsData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(FeesBundleRequest $request, FeesBundle $feeBundle)
    {
        try {
            DB::beginTransaction();
            $bundleData = $request->only((new FeesBundle())->getFillable());
            $feeBundle->update($bundleData);
            $feeBundle->feeDetails()->sync($request->fee_details_id);

            DB::commit();
            return response()->json([
                'item' => $feeBundle,
                'message' => [
                    'text' => "{$request->name} updated successfully...",
                    'icon' => 'success'
                ]
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return response()->json([
                'message' => [
                    'text' => "Could not  update {$request->name}...",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
