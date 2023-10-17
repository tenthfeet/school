<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ClassRoomRequest;
use App\Models\ClassRoom;
use App\Models\AcademicStandard;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $academicStandard = AcademicStandard::where('is_active', 1)->get();
        $department = Department::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => ClassRoom::with('academicStandard', 'department')->get()])
            : view('pages.master.class-room', [
                'academicStandards' => $academicStandard,
                'departments' => $department
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassRoomRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $classRoom = ClassRoom::create($validated);

        return response()->json([
            'item' => $classRoom->load('academicStandard','department'),
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom): JsonResponse
    {
        return response()->json($classRoom);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ClassRoomRequest $request, ClassRoom $classRoom)
    {
        $validated = $request->validated();

        $classRoom->update($validated);

        return response()->json([
            'item' => $classRoom->load('academicStandard','department'),
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
