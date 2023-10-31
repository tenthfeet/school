<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
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
                'name' => 'Users',
                'url' => route('users.index'),
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $users = QueryBuilder::for(User::class)
            ->allowedSorts(['name', 'email','phone', 'post_code', 'city', 'country'])
            ->where('name', 'like', "%$q%")
            ->orWhere('email', 'like', "%$q%")
            ->withoutAuthUser()
            ->withoutSuperAdmin()
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('users.index', [
            'users' => $users,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Users'
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
                'name' => 'Users',
                'url' => route('users.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('users.create'),
                'active' => true
            ],
        ];

        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->safe(['name', 'email'])
            + [
                'password' => bcrypt($request->validated(['password'])),
                'email_verified_at' => now(),
            ]);
        $user->assignRole([$request->validated('role')]);

        return redirect()->route('users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Application|Factory|View
     *
     */
    public function show(User $user)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Users',
                'url' => route('users.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('users.show', [
            'user' => $user,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Show User',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return Application|Factory|View
     *
     */
    public function edit(User $user)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Users',
                'url' => route('users.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ],
        ];


        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit User',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     *
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->safe(['name', 'email'])
            + ['password' => bcrypt($request->validated(['password']))]);

        $user->syncRoles([$request->validated(['role'])]);

        return redirect()->route('users.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse
     *
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('message', 'User deleted successfully');
    }
}
