<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ExamCategoryRequest;
use App\Models\ExamCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ExamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => ExamCategory::all()])
        : view('pages.master.exam-category',['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamCategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $examCategory = ExamCategory::create($validated);

        return response()->json([
            'item' => $examCategory,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamCategory $examCategory): JsonResponse
    {
        return response()->json($examCategory);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ExamCategoryRequest $request,ExamCategory $examCategory)
    {
        $validated = $request->validated();

        $examCategory->update($validated);

        return response()->json([
            'item' => $examCategory,
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
