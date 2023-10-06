<?php


namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FeesTypeRequest;
use App\Models\FeesType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FeesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => FeesType::all()])
        : view('pages.master.fees-type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeesTypeRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $feesType = FeesType::create($validated);

        return response()->json([
            'item' => $feesType,
            'message' => [
                'text' => "{$request->name} added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesType $feesType): JsonResponse
    {
        return response()->json($feesType);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(FeesTypeRequest $request,FeesType $feesType)
    {
        $validated = $request->validated();

        $feesType->update($validated);

        return response()->json([
            'item' => $feesType,
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
