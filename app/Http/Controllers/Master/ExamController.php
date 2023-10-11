<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ExamRequest;
use App\Models\MediumOfStudy;
use App\Models\ClassName;
use App\Models\ExamCategory;
use App\Models\Exam;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $examCategory = ExamCategory::where('is_active', 1)->get();
        $mediumofStudy = MediumOfStudy::where('is_active', 1)->get();
        $className = ClassName::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => Exam::with('examCategory', 'mediumofStudy', 'className')->get()])
            : view('pages.master.exam', [
                'mediumofStudies' => $mediumofStudy,
                'examCategories' => $examCategory,
                'classNames' => $className
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $exam = Exam::create($validated);

        return response()->json([
            'item' => $exam->load('examCategory', 'mediumofStudy', 'className'),
            'message' => [
                'text' => "Exam added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam): JsonResponse
    {
        return response()->json($exam);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ExamRequest $request, Exam $exam)
    {
        $validated = $request->validated();

        $exam->update($validated);

        return response()->json([
            'item' => $exam->load('examCategory', 'mediumofStudy', 'className'),
            'message' => [
                'text' => "Exam updated successfully...",
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
