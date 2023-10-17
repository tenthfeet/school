<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\AcademicStandardRequest;
use App\Models\AcademicStandard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AcademicStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => AcademicStandard::all()])
        : view('pages.master.academic-standard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicStandardRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $academicStandard = AcademicStandard::create($validated);

        return response()->json([
            'item' => $academicStandard,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicStandard $academicStandard): JsonResponse
    {
        return response()->json($academicStandard);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(AcademicStandardRequest $request,AcademicStandard $academicStandard)
    {
        $validated = $request->validated();

        $academicStandard->update($validated);

        return response()->json([
            'item' => $academicStandard,
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
