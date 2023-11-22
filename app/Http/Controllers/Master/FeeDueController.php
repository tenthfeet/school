<?php

namespace App\Http\Controllers\master;

use App\Enums\PartialPayment;
use App\Enums\penaltyApplied;
use App\Http\Controllers\Controller;
use App\Http\Requests\master\FeeDueRequest;
use App\Models\AcademicStandard;
use App\Models\AcademicYear;
use App\Models\FeeDue;
use App\Models\Term;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeeDueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $academicYears = AcademicYear::where('is_active', 1)->pluck('name','id')->toArray();
        $academicStandards = AcademicStandard::where('is_active', 1)->pluck('name','id')->toArray();
        $terms = Term::where('is_active', 1)->pluck('name','id')->toArray();

        return $request->wantsJson()
            ? response()->json(['data' => FeeDue::all()])
            : view('pages.master.fee-due', [
                'academicYears' => $academicYears,
                'academicStandards' => $academicStandards,
                'terms' => $terms,
                'penaltyApplied' => PenaltyApplied::labelArray(),
                'partialPayment' => PartialPayment::labelArray(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeDueRequest $request):JsonResponse
    {
        $validated = $request->validated();

        $feeDue = FeeDue::create($validated);

        return response()->json([
            'item' => $feeDue->load('academicYear', 'academicStandards','terms'),
            'message' => [
                'text' => "Fee Due added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeDue $feeDue): JsonResponse
    {
        return response()->json($feeDue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeDueRequest $request,FeeDue $feeDue)
    {
        $validated = $request->validated();

        $feeDue->update($validated);

        return response()->json([
            'item' => $feeDue->load('academicYear', 'academicStandards', 'terms'),
            'message' => [
                'text' => "Fee Due updated successfully...",
                'icon' => 'success'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
