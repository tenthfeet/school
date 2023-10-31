<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralSettingsController;
use App\Http\Controllers\Api\GeneralSettingsMediaController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EnvironmentController;
use App\Http\Controllers\Api\DatabaseBackupController;
use Illuminate\Support\Facades\Route;

/*
 * API Routes
 */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// OAuth
Route::post('login-oauth', [AuthController::class, 'social']);

Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

// Verify new email after change
Route::get('profile-verify-new-email/{token}',
    [ProfileController::class, 'verifyNewEmail'])->name('profile.verify-new-email');

// authenticated routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('resend-verification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1');
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiSingleton('env', EnvironmentController::class);
    Route::group(['middleware' => 'verified', 'as' => 'api.v1.'], function () {
        Route::post('password-change', [AuthController::class, 'changePassword']);
        Route::apiResource('users', UserController::class);
        Route::delete('users-delete-many', [UserController::class, 'destroyMany']);
        Route::apiResource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class)->except('edit');
        Route::apiSingleton('profile', ProfileController::class);
        Route::put('general-settings-images', GeneralSettingsMediaController::class);
        // Database Backup
        Route::apiResource('database-backups', DatabaseBackupController::class)->only(['index', 'destroy']);
        Route::get('database-backups-create', [DatabaseBackupController::class,'createBackup']);
        Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload']);
    });
});

// General Settings
Route::get('general-settings', GeneralSettingsController::class);
