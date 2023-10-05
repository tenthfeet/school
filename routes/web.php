<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\PermissionGroupController;
use App\Http\Controllers\Master\StateController;
use App\Http\Controllers\Master\CityController;
use App\Http\Controllers\Master\CountryController;
use App\Http\Controllers\Master\FinancialYearController;
use App\Http\Controllers\Master\LanguageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::apiResource('permission-groups', PermissionGroupController::class);
    Route::apiResource('states', StateController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('languages', LanguageController::class);
    Route::apiResource('financial-years', FinancialYearController::class);
});


require __DIR__ . '/auth.php';
