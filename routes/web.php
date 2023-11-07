<?php

use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\Master\AcademicStandardController;
use App\Http\Controllers\Master\AcademicYearController;
use App\Http\Controllers\master\AttendanceController;
use App\Http\Controllers\Master\CityController;
use App\Http\Controllers\Master\ClassPeriodController;
use App\Http\Controllers\Master\ClassRoomController;
use App\Http\Controllers\Master\CountryController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\ExamCategoryController;
use App\Http\Controllers\Master\ExamController;
use App\Http\Controllers\Master\FeeController;
use App\Http\Controllers\Master\FeeDetailController;
use App\Http\Controllers\master\FeeDueController;
use App\Http\Controllers\master\FeesBundleController;
use App\Http\Controllers\Master\FinancialYearController;
use App\Http\Controllers\Master\HomeworkController;
use App\Http\Controllers\Master\LanguageController;
use App\Http\Controllers\Master\MediumOfStudyController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\PermissionGroupController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\StateController;
use App\Http\Controllers\Master\StatusController;
use App\Http\Controllers\Master\StudentController;
use App\Http\Controllers\Master\SubjectController;
use App\Http\Controllers\Master\SubjectMappingController;
use App\Http\Controllers\Master\TeacherMappingController;
use App\Http\Controllers\Master\TermController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return to_route('login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Dashboards
    // Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    // Locale
    // Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // User
    // Route::resource('users', UserController::class);
    // Permission
    // Route::resource('permissions', PermissionController::class)->except(['show']);
    // Roles
    // Route::resource('roles', RoleController::class);
    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');
    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    // Route::resource('database-backups', DatabaseBackupController::class);
    // Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');
});


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
    Route::get('/fee-details-by-year-and-standard',[FeeDetailController::class,'getByYearAndStandard']);
    Route::get('/fee-bundle-total-amount',[FeeDetailController::class,'getFeeBundleTotalAmount']);
    Route::apiResource('homeworks', HomeworkController::class);
    Route::apiResource('teacher-mappings', TeacherMappingController::class);
    Route::apiResource('subject-mappings', SubjectMappingController::class);
    Route::apiResource('class-periods', ClassPeriodController::class);
    Route::apiResource('students', StudentController::class);
    Route::get('student-autocomplete', [StudentController::class, 'autoComplete']);
    Route::get('/parent-info/{student}', [StudentController::class, 'getParentInfo']);
    Route::apiResource('fee-bundles', FeesBundleController::class);
    Route::apiResource('attendances', AttendanceController::class);
    Route::apiResource('fee-dues', FeeDueController::class);
});

require __DIR__ . '/auth.php';
