<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\MediumOfStudyRequest;
use App\Models\MediumOfStudy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MediumOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => MediumOfStudy::all()])
        : view('pages.master.medium-of-study');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediumOfStudyRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $mediumofStudy = MediumOfStudy::create($validated);

        return response()->json([
            'item' => $mediumofStudy,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(MediumOfStudy $mediumOfStudy): JsonResponse
    {
        return response()->json($mediumOfStudy);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(MediumOfStudyRequest $request,MediumOfStudy $mediumOfStudy)
    {
        $validated = $request->validated();

        $mediumOfStudy->update($validated);

        return response()->json([
            'item' => $mediumOfStudy,
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
