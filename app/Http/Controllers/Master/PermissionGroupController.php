<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\PermissionGroupRequest;
use App\Models\PermissionGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => PermissionGroup::all()])
            : view('pages.master.permission-group');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionGroupRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $permissionGroup = PermissionGroup::create($validated);

        return response()->json([
            'item' => $permissionGroup,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionGroup $permissionGroup): JsonResponse
    {
        return response()->json($permissionGroup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionGroupRequest $request,PermissionGroup $permissionGroup)
    {
        $validated = $request->validated();

        $permissionGroup->update($validated);

        return response()->json([
            'item' => $permissionGroup,
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
