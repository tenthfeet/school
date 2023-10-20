<?php

namespace App\Http\Controllers\Master;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FinancialYearRequest;
use App\Models\FinancialYear;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FinancialYearController extends Controller
{ /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
       return $request->wantsJson()
       ? response()->json(['data' => FinancialYear::all()])
       : view('pages.master.financial-year',['status' => Status::labelArray()]);
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(FinancialYearRequest $request): JsonResponse
   {
       $validated = $request->validated();

       $financialYear = FinancialYear::create($validated);

       return response()->json([
           'item' => $financialYear,
           'message' => [
               'text' => "{$request->name} added successfully...",
               'icon' => 'success'
           ]
       ], Response::HTTP_CREATED);
   }

   /**
    * Display the specified resource.
    */
   public function show(FinancialYear $financialYear): JsonResponse
   {
       return response()->json($financialYear);
   }

   /**
    * Update the specified resource in storage.
    */

   public function update(FinancialYearRequest $request,FinancialYear $financialYear)
   {
       $validated = $request->validated();

       $financialYear->update($validated);

       return response()->json([
           'item' => $financialYear,
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
