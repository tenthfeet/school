<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Subject::all()])
        : view('pages.master.subject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $subject = Subject::create($validated);

        return response()->json([
            'item' => $subject,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject): JsonResponse
    {
        return response()->json($subject);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(SubjectRequest $request,Subject $subject)
    {
        $validated = $request->validated();

        $subject->update($validated);

        return response()->json([
            'item' => $subject,
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
