<?php

use App\Http\Controllers\Master\AcademicStandardController;
use App\Http\Controllers\Master\AcademicYearController;
use App\Http\Controllers\Master\ExamCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\PermissionGroupController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\StateController;
use App\Http\Controllers\Master\CityController;
use App\Http\Controllers\Master\ClassRoomController;
use App\Http\Controllers\Master\CountryController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\ExamController;
use App\Http\Controllers\Master\FeeController;
use App\Http\Controllers\Master\FeeDetailController;
use App\Http\Controllers\Master\FinancialYearController;
use App\Http\Controllers\Master\LanguageController;
use App\Http\Controllers\Master\MediumOfStudyController;
use App\Http\Controllers\Master\StatusController;
use App\Http\Controllers\Master\SubjectController;
use App\Http\Controllers\Master\TermController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\StudentController;


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
    Route::apiResource('users', UserController::class);
    Route::get('/cities-by-state-id', [UserController::class, 'fetchCities']);
    Route::apiResource('states', StateController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('languages', LanguageController::class);
    Route::apiResource('statuses', StatusController::class);
    Route::apiResource('financial-years', FinancialYearController::class);
    Route::apiResource('subjects', SubjectController::class);
    Route::apiResource('terms', TermController::class);
    Route::apiResource('fees', FeeController::class);
    Route::apiResource('exams', ExamController::class);
    Route::apiResource('medium-of-studies', MediumOfStudyController::class);
    Route::apiResource('class-rooms', ClassRoomController::class);
    Route::apiResource('exam-categories', ExamCategoryController::class);
    Route::apiResource('academic-years', AcademicYearController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('academic-standards', AcademicStandardController::class);
    Route::apiResource('fee-details', FeeDetailController::class);

    Route::apiResource('students', StudentController::class);
    Route::get('student-autocomplete',[StudentController::class,'autoComplete']);
    Route::get('/parent-info/{student}',[StudentController::class,'getParentInfo']);
});


require __DIR__ . '/auth.php';
