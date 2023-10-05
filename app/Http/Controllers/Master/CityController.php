<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\CityRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $state = State::where('is_active', 1)->get();
        return $request->wantsJson()
            ? response()->json(['data' => City::with('state')->get()])
            : view('pages.master.city', ['states' => $state]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $city = City::create($validated);

        return response()->json([
            'item' => $city->load('state'),
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city): JsonResponse
    {
        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CityRequest $request, City $city)
    {
        $validated = $request->validated();

        $city->update($validated);

        return response()->json([
            'item' => $city->load('state'),
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
