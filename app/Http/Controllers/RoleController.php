<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class RoleController extends Controller
{
    /**
     * Handle permission of this resource controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
                'name' => 'Roles',
                'url' => route('roles.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $roles = QueryBuilder::for(Role::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('roles.index', [
            'breadcrumbItems' => $breadcrumbsItems,
            'roles' => $roles,
            'pageTitle' => 'Roles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Roles',
                'url' => route('roles.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('roles.create'),
                'active' => true
            ],
        ];

        $permissionModules = Permission::all()->groupBy('module_name');

        return view('roles.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'permissionModules' => $permissionModules,
            'pageTitle' => 'Create Role'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request)
    {
        $createdRole = Role::create(['name' => $request->validated('name')]);
        $createdRole->syncPermissions($request->validated('permissions'));

        return to_route('roles.index')->with('message', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     * @return Application|Factory|View
     */
    public function show(Role $role)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Roles',
                'url' => route('roles.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ],
        ];

        $permissionModules = Permission::all()->groupBy('module_name');

        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.show', [
            'role' => $role,
            'breadcrumbItems' => $breadcrumbsItems,
            'permissionModules' => collect($permissionModules),
            'rolePermissions' => $rolePermissions,
            'pageTitle' => 'Show Role'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Roles',
                'url' => route('roles.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ],
        ];

        $permissionModules = Permission::all()->groupBy('module_name');

        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view('roles.edit', [
            'role' => $role,
            'breadcrumbItems' => $breadcrumbsItems,
            'permissionModules' => collect($permissionModules),
            'rolePermissions' => $rolePermissions,
            'pageTitle' => 'Edit Role'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update(['name' => $request->validated('name')]);
        $role->syncPermissions($request->validated('permissions'));

        return to_route('roles.index')->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return to_route('roles.index')->with('message', 'Role deleted successfully');
    }
}
