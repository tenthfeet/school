<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\RoleRequest;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => Role::all()])
            : view('pages.master.role', [
                'permissionGroups' => PermissionGroup::with('permissions')
                    ->whereHas('permissions')
                    ->get()
            ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $role = Role::create($request->safe(['name']));

            $role->syncPermissions($request->safe(['permissions']));

            DB::commit();
            return response()->json([
                'item' => $role,
                'message' => [
                    'text' => "{$role->name} added successfully...",
                    'icon' => 'success'
                ]
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);

            return response()->json([
                'message' => [
                    'text' => "Could not add {$role->name}...",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): JsonResponse
    {
        return response()->json($role->load('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();
            $role->update($request->safe(['name']));

            $role->syncPermissions($request->safe(['permissions']));

            DB::commit();
            return response()->json([
                'item' => $role,
                'message' => [
                    'text' => "{$role->name} updated successfully...",
                    'icon' => 'success'
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);

            return response()->json([
                'message' => [
                    'text' => "Could not update {$role->name}...",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleRequest $request, Role $role)
    {
        //
    }
}
