<?php


namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FeeRequest;
use App\Models\Fee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => Fee::all()])
        : view('pages.master.fee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $fee = Fee::create($validated);

        return response()->json([
            'item' => $fee,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee): JsonResponse
    {
        return response()->json($fee);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(FeeRequest $request,Fee $fee)
    {
        $validated = $request->validated();

        $fee->update($validated);

        return response()->json([
            'item' => $fee,
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
