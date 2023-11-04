<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\MarkRequest;
use App\Models\Mark;
use App\Models\ClassRoom;
use App\Models\AcademicYear;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Grade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classRoom = ClassRoom::where('is_active', 1)->get();
        $exam = Exam::where('is_active', 1)->get();
        $subject = Subject::where('is_active', 1)->get();
        $studentAdmission = Student::all();
        $grade = Grade::where('is_active', 1)->get();
        $academicYear = AcademicYear::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => Mark::with('classRoom','grade','studentAdmission','academicYear','subject', 'exam')->get()])
            : view('pages.master.mark', [
                'studentAdmissions'=>$studentAdmission,
                'classRooms' => $classRoom,
                'academicYears' => $academicYear,
                'exams' => $exam,
                'grades' => $grade,
                'subjects' => $subject,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarkRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $mark = Mark::create($validated);

        return response()->json([
            'item' => $mark->load('classRoom','grade','studentAdmission','academicYear','subject', 'exam'),
            'message' => [
                'text' => "Mark added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark): JsonResponse
    {
        return response()->json($mark);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(MarkRequest $request, Mark $mark)
    {
        $validated = $request->validated();

        $mark->update($validated);

        return response()->json([
            'item' => $mark->load('classRoom','grade','studentAdmission','academicYear','subject', 'exam'),
            'message' => [
                'text' => "Mark updated successfully...",
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
