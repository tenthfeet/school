<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\PermissionRequest;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => Permission::with('permissionGroup:id,name')->get()])
            : view('pages.master.permission');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['name']=Str::snake($validated['name']);
        $permission = Permission::create($validated);

        return response()->json([
            'item' => $permission->load('permissionGroup:id,name'),
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission): JsonResponse
    {
        $permissionGroups = PermissionGroup::select('id', 'name')->get();
        return response()->json(compact('permission', 'permissionGroups'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $validated = $request->validated();
        $validated['name']=Str::snake($validated['name']);
        $permission->update($validated);

        return response()->json([
            'item' => $permission->load('permissionGroup:id,name'),
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
