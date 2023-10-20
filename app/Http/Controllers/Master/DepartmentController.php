<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Department::all()])
        : view('pages.master.department',['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $department = Department::create($validated);

        return response()->json([
            'item' => $department,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department): JsonResponse
    {
        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(DepartmentRequest $request,Department $department)
    {
        $validated = $request->validated();

        $department->update($validated);

        return response()->json([
            'item' => $department,
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
