<?php

namespace App\Http\Controllers\Master;

use App\Enums\Day;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\SubjectMappingRequest;
use App\Models\SubjectMapping;
use App\Models\ClassRoom;
use App\Models\AcademicYear;
use App\Models\ClassPeriod;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SubjectMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classRoom = ClassRoom::where('is_active', 1)->get();
        $classPeriod = ClassPeriod::where('is_active', 1)->get();
        $subject = Subject::where('is_active', 1)->get();
        $academicYear = AcademicYear::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => SubjectMapping::with('classRoom','classPeriod', 'academicYear', 'subject')->get()])
            : view('pages.master.subject-mapping', [
                'days' => Day::labelArray(),
                'classPeriods'=>$classPeriod,
                'classRooms' => $classRoom,
                'academicYears' => $academicYear,
                'subjects' => $subject
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectMappingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $subjectMapping = SubjectMapping::create($validated);

        return response()->json([
            'item' => $subjectMapping->load('classRoom', 'academicYear','subject','classPeriod'),
            'message' => [
                'text' => "Subject Mapping added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectMapping $subjectMapping): JsonResponse
    {
        return response()->json($subjectMapping);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(SubjectMappingRequest $request, SubjectMapping $subjectMapping)
    {
        $validated = $request->validated();

        $subjectMapping->update($validated);

        return response()->json([
            'item' => $subjectMapping->load('classRoom', 'academicYear','subject','classPeriod'),
            'message' => [
                'text' => "Subject Mapping updated successfully...",
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
