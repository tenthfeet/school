<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\UserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $state = State::where('is_active', 1)->get();
        $city = City::where('is_active', 1)->get();
        $country = Country::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => User::with('state', 'city', 'country')->get()])
            : view('pages.master.user', [
                'states' => $state,
                'cities' => $city,
                'countries' => $country
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt(Carbon::parse($request->date_of_birth)->format('Ymd'));
        $user = User::create($validated);

        return response()->json([
            'item' => $user->load('state', 'city', 'country'),
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return response()->json([
            'item' => $user->load('state', 'city', 'country'),
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

    public function fetchCities(Request $request)
    {
        $cities = City::select('id', 'name')
            ->where('state_id', $request->state_id)
            ->where('is_active', 1)
            ->get();
        return response()->json($cities);
    }
}
