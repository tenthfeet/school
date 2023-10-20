<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Language::all()])
        : view('pages.master.language',['status' => Status::labelArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $language = Language::create($validated);

        return response()->json([
            'item' => $language,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language): JsonResponse
    {
        return response()->json($language);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(LanguageRequest $request,Language $language)
    {
        $validated = $request->validated();

        $language->update($validated);

        return response()->json([
            'item' => $language,
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
