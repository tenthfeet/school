<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\StoreRoleRequest;
use App\Http\Requests\Api\Role\UpdateRoleRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct() {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * @return JsonResponse
     */
    public function create()
    {
        $permissionModules = Permission::all()->groupBy('module_name');

        return $this->responseWithSuccess(message: 'Permissions fetched successful.', data: $permissionModules);
    }

    /**
     * Display a listing of the resource.
     *
     * @return RoleCollection
     *
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $roles = QueryBuilder::for(Role::class)
                            ->with('permissions')
                            ->allowedSorts(['name', 'created_at'])
                            ->where('name', 'like', "%$q%")
                            ->latest()
                            ->paginate($perPage)
                            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return new RoleCollection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $request
     * @return JsonResponse
     *
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(['name' => $request->validated('name')]);
        $role->syncPermissions($request->validated('permissions'));

        return $this->responseWithSuccess(
            'Role created successfully',
            RoleResource::make($role),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     * @return JsonResponse
     *
     */
    public function show(Role $role)
    {
        $role['modules'] = Permission::all()->groupBy('module_name');
        $role['permissionIds'] = $role->permissions()->pluck('id')->toArray();

        return $this->responseWithSuccess('Role fetched successfully', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return JsonResponse
     *
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update(['name' => $request->validated('name')]);
        $role->syncPermissions($request->validated('permissions'));

        return $this->responseWithSuccess('Role updated successfully', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return JsonResponse
     *
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return $this->responseWithSuccess('Role deleted successfully', [], Response::HTTP_NO_CONTENT);
    }
}
