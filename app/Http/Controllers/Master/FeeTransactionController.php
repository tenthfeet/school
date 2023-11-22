<?php

namespace App\Http\Controllers\master;

use App\Enums\PaymentMode;
use App\Http\Controllers\Controller;
use App\Http\Requests\master\FeeTransactionRequest;
use App\Models\FeeTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->wantsJson()
        ? response()->json(['data' => FeeTransaction::all()])
        : view('pages.master.fee-transaction', [
            'paymentMode' => PaymentMode::labelArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeeTransactionRequest $request):JsonResponse
    {
        $validated = $request->validated();

        $feeTransaction = FeeTransaction::create($validated);

        return response()->json([
            'item' => $feeTransaction,
            'message' => [
                'text' => "Fee Transaction added successfully...",
                'icon' => 'success'
            ]
        ], Response::HTTP_CREATED);
    }

     /**
     * Display the specified resource.
     */
    public function show(FeeTransaction $feeTransaction): JsonResponse
    {
        return response()->json($feeTransaction);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeeTransactionRequest $request,FeeTransaction $feeTransaction)
    {
        $validated = $request->validated();

        $feeTransaction->update($validated);

        return response()->json([
            'item' => $feeTransaction,
            'message' => [
                'text' => "Fee Transaction updated successfully...",
                'icon' => 'success'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
