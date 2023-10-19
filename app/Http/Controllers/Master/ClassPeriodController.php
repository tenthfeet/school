<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ClassPeriodRequest;
use App\Models\ClassPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ClassPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
            ? response()->json(['data' => ClassPeriod::all()])
            : view('pages.master.class-period', ['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassPeriodRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $classPeriod = ClassPeriod::create($validated);

        return response()->json([
            'item' => $classPeriod,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassPeriod $classPeriod): JsonResponse
    {
        return response()->json($classPeriod);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ClassPeriodRequest $request, ClassPeriod $classPeriod)
    {
        $validated = $request->validated();

        $classPeriod->update($validated);

        return response()->json([
            'item' => $classPeriod,
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
