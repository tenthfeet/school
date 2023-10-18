<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\HomeworkRequest;
use App\Models\Homework;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classRoom = ClassRoom::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $subject = Subject::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => Homework::with('classRoom', 'subject', 'user')->get()])
            : view('pages.master.homework', [
                'classRooms' => $classRoom,
                'subjects' => $subject,
                'users' => $user
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HomeworkRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $homework = Homework::create($validated);

        return response()->json([
            'item' => $homework->load('classRoom', 'subject','user'),
            'message' => [
                'text' => "Home Work added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Homework $homework): JsonResponse
    {
        return response()->json($homework);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(HomeworkRequest $request, Homework $homework)
    {
        $validated = $request->validated();

        $homework->update($validated);

        return response()->json([
            'item' => $homework->load('classRoom', 'subject','user'),
            'message' => [
                'text' => "Home Work updated successfully...",
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
