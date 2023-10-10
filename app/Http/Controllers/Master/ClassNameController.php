<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ClassNameRequest;
use App\Models\ClassName;
use App\Models\MediumOfStudy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mediumofStudy = MediumOfStudy::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => ClassName::with('mediumofStudy')->get()])
            : view('pages.master.class-name', [
                'mediumofStudies' => $mediumofStudy
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassNameRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $className = ClassName::create($validated);

        return response()->json([
            'item' => $className->load('mediumofStudy'),
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassName $className): JsonResponse
    {
        return response()->json($className);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ClassNameRequest $request, ClassName $className)
    {
        $validated = $request->validated();

        $className->update($validated);

        return response()->json([
            'item' => $className->load('mediumofStudy'),
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
