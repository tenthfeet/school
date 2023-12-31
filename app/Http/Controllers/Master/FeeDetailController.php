<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FeeDetailRequest;
use App\Models\AcademicStandard;
use App\Models\AcademicYear;
use App\Models\Fee;
use App\Models\FeeDetail;
use App\Services\FeeDetailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $academicStandard = AcademicStandard::where('is_active', 1)->get();
        $academicYear = AcademicYear::where('is_active', 1)->get();
        $fee = Fee::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => FeeDetail::with('academicYear', 'fee', 'academicStandard')->get()])
            : view('pages.master.fee-detail', [
                'status' => Status::labelArray(),
                'academicYears' => $academicYear,
                'academicStandards' => $academicStandard,
                'fees' => $fee,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeDetailRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $feeDetail = FeeDetail::create($validated);

        return response()->json([
            'item' => $feeDetail->load('academicYear', 'fee', 'academicStandard'),
            'message' => [
                'text' => "Fee Detail added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeDetail $feeDetail): JsonResponse
    {
        return response()->json($feeDetail);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(FeeDetailRequest $request, FeeDetail $feeDetail)
    {
        $validated = $request->validated();

        $feeDetail->update($validated);

        return response()->json([
            'item' => $feeDetail->load('academicYear', 'fee', 'academicStandard'),
            'message' => [
                'text' => "Fee Detail updated successfully...",
                'icon' => 'success'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getByYearAndStandard(Request $request, FeeDetailService $service): JsonResponse
    {
        $data = $service->feeDetailsByYearAndStandard(
            $request->academic_year_id,
            $request->academic_standard_id
        );
        return response()->json($data);
    }

    public function getFeeBundleTotalAmount(Request $request): jsonResponse
    {
        $totalAmount = FeeDetail::whereIn('id', $request->fee_details_id)
            ->sum('fee_amount');
        return response()->json(['totalAmount' => $totalAmount]);
    }
}
