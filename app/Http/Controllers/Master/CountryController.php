<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\CountryRequest;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Country::all()])
        : view('pages.master.country');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $country = Country::create($validated);

        return response()->json([
            'item' => $country,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): JsonResponse
    {
        return response()->json($country);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CountryRequest $request,Country $country)
    {
        $validated = $request->validated();

        $country->update($validated);

        return response()->json([
            'item' => $country,
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
