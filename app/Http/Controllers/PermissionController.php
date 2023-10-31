<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;

class PermissionController extends Controller
{
    /**
     * Handle permission of this resource controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     *
     */
    public function index(Request $request)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false
            ],
            [
                'name' => 'Permissions',
                'url' => route('permissions.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $permissions = QueryBuilder::for(Permission::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('permissions.index', [
            'permissions' => $permissions,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Permissions'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Permissions',
                'url' => route('permissions.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('permissions.create'),
                'active' => true
            ],
        ];
        return view('permissions.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Permission'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return to_route('permissions.index')->with('message', 'Permission created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $permission
     * @return Application|Factory|View
     *
     */
    public function edit(Permission $permission)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Permissions',
                'url' => route('permissions.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ],
        ];

        // add the module name and override permission name to the permission object
        $permission['permissionModuleName'] = explode(' ', $permission->name)[0];
        $permission['name'] = explode(' ', $permission->name)[1];

        return view('permissions.edit', [
            'permission' => $permission,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Permission'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePermissionRequest  $request
     * @param  Permission  $permission
     * @return RedirectResponse
     *
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->validated('permission_name'),
            'module_name' => $request->validated('module_name'),
        ]);

        return to_route('permissions.index')->with('message', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return RedirectResponse
     *
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return to_route('permissions.index')->with('message', 'Permission deleted successfully');
    }
}
