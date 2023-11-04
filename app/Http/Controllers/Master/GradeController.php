<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Grade::all()])
        : view('pages.master.grade',['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $grade = Grade::create($validated);

        return response()->json([
            'item' => $grade,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade): JsonResponse
    {
        return response()->json($grade);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(GradeRequest $request,Grade $grade)
    {
        $validated = $request->validated();

        $grade->update($validated);

        return response()->json([
            'item' => $grade,
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
