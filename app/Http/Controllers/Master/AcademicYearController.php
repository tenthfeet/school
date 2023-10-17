<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\AcademicYearRequest;
use App\Models\AcademicYear;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => AcademicYear::all()])
        : view('pages.master.academic-year');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicYearRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $academicYear = AcademicYear::create($validated);

        return response()->json([
            'item' => $academicYear,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear): JsonResponse
    {
        return response()->json($academicYear);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(AcademicYearRequest $request,AcademicYear $academicYear)
    {
        $validated = $request->validated();

        $academicYear->update($validated);

        return response()->json([
            'item' => $academicYear,
            'message' => [
                'text' => "{$request->name} updated successfully...",
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
}
