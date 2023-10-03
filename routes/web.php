<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\PermissionGroupController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\RoleController;

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
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('roles', RoleController::class);
});

require __DIR__ . '/auth.php';
