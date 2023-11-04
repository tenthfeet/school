<?php

namespace App\Http\Controllers\master;

use App\Enums\AttendanceGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\AttendanceRequest;
use App\Models\Attendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => Attendance::all()])
            : view('pages.master.attendance', ['attendance' => AttendanceGroup::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $attendance = Attendance::create($validated);

        return response()->json([
            'item' => $attendance,
            'message' => [
                'text' => "{$request->name}attendance added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance): JsonResponse
    {
        return response()->Json($attendance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceRequest $request, Attendance $attendance)
    {
        $validated = $request->validated();

        $attendance->update($validated);

        return response()->json([
            'item' => $attendance,
            'message' => [
                'text' => "{$request->name}attendance updated successfully...",
                'icon' => 'success'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
