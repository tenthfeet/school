<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Permission\StorePermissionRequest;
use App\Http\Requests\Api\Permission\UpdatePermissionRequest;
use App\Http\Resources\PermissionCollection;
use App\Http\Resources\PermissionResource;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;

class PermissionController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct() {
        $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return PermissionCollection
     *
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $permissions = QueryBuilder::for(Permission::class)
                        ->allowedSorts(['name', 'created_at'])
                        ->where('name', 'like', "%$q%")
                        ->paginate($perPage)
                        ->appends(['per_page' => $perPage, 'q' => $q, 'sort'=> $sort]);

        return new PermissionCollection($permissions);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest  $request
     * @return JsonResponse
     *
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return $this->responseWithSuccess('Permission created successfully', PermissionResource::make($permission), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Permission  $permission
     * @return JsonResponse
     *
     */
    public function show(Permission $permission)
    {
        return $this->responseWithSuccess('Permission details', PermissionResource::make($permission));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePermissionRequest  $request
     * @param  Permission  $permission
     * @return JsonResponse
     *
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return $this->responseWithSuccess('Permission updated successfully', PermissionResource::make($permission));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return JsonResponse
     *
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return $this->responseWithSuccess('Permission deleted successfully', [], Response::HTTP_NO_CONTENT);
    }
}
