<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StateRequest;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => State::all()])
            : view('pages.master.state', ['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StateRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $state = State::create($validated);

        return response()->json([
            'item' => $state,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state): JsonResponse
    {
        return response()->json($state);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StateRequest $request, State $state)
    {
        $validated = $request->validated();

        $state->update($validated);

        return response()->json([
            'item' => $state,
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
