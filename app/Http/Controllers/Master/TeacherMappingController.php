<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\TeacherMappingRequest;
use App\Models\TeacherMapping;
use App\Models\ClassRoom;
use App\Models\AcademicYear;
use App\Models\ClassPeriod;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TeacherMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classRoom = ClassRoom::where('is_active', 1)->get();
        $classPeriod = ClassPeriod::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $academicYear = AcademicYear::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => TeacherMapping::with('classRoom','classPeriod','academicYear', 'user')->get()])
            : view('pages.master.teacher-mapping', [
                'classPeriods'=>$classPeriod,
                'classRooms' => $classRoom,
                'academicYears' => $academicYear,
                'users' => $user
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherMappingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $teacherMapping = TeacherMapping::create($validated);

        return response()->json([
            'item' => $teacherMapping->load('classRoom', 'academicYear','user','classPeriod'),
            'message' => [
                'text' => "Teacher Mapping added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherMapping $teacherMapping): JsonResponse
    {
        return response()->json($teacherMapping);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(TeacherMappingRequest $request, TeacherMapping $teacherMapping)
    {
        $validated = $request->validated();

        $teacherMapping->update($validated);

        return response()->json([
            'item' => $teacherMapping->load('classRoom', 'academicYear','user','classPeriod'),
            'message' => [
                'text' => "Teacher Mapping updated successfully...",
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
