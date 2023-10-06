<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\TermRequest;
use App\Models\Term;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TermController extends Controller
{/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Term::all()])
        : view('pages.master.term');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TermRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $term = Term::create($validated);

        return response()->json([
            'item' => $term,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term): JsonResponse
    {
        return response()->json($term);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(TermRequest $request,Term $term)
    {
        $validated = $request->validated();

        $term->update($validated);

        return response()->json([
            'item' => $term,
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
