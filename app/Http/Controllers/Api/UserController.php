<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\DestroyManyRequest;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

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
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $users = QueryBuilder::for(User::class)
                            ->with([
                                'roles' => [
                                    'permissions',
                                ]
                            ])
                            ->allowedSorts(['name', 'email','phone', 'post_code', 'city', 'country', 'created_at'])
                            ->where('name', 'like', "%$q%")
                            ->orWhere('email', 'like', "%$q%")
                            ->WithoutAuthUser()
                            ->WithoutSuperAdmin()
                            ->latest()
                            ->paginate($perPage)
                            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return UserCollection::make($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->safe(['name', 'email'])
            + [
                'password' => bcrypt($request->validated(['password'])),
                'email_verified_at' => now(),
            ]);
        $user->assignRole([$request->validated('role')]);

        return $this->responseWithSuccess('User created successfully', [
            'user' => UserResource::make($user)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return $this->responseWithSuccess('User details', UserResource::make($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->safe(['name', 'email'])
            + ['password' => bcrypt($request->validated(['password']))]);

        $user->syncRoles($request->validated(['role']));

        return $this->responseWithSuccess('User updated successfully', UserResource::make($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return $this->responseWithSuccess('User deleted successfully', [], Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return $this->responseWithError($e->getMessage(), $e->getCode());
        }
    }

    public function destroyMany(DestroyManyRequest $request)
    {
        $this->authorize('destroyMany', User::class);

        User::destroy($request->validated('users'));

        return $this->responseWithSuccess('Users deleted successful!');
    }
}
