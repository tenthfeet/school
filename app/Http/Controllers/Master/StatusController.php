<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StatusRequest;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Status::all()])
        : view('pages.master.status');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $status = Status::create($validated);

        return response()->json([
            'item' => $status,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status): JsonResponse
    {
        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StatusRequest $request,Status $status)
    {
        $validated = $request->validated();

        $status->update($validated);

        return response()->json([
            'item' => $status,
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
