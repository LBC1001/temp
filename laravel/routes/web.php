<?php

use App\Http\Controllers\Employee\HomeController;
use App\Http\Controllers\Employee\WorklogController;
use App\Http\Controllers\Employer\EmployeeController as EmployerEmployeeController;
use App\Http\Controllers\Employer\EnrollmentController;
use App\Http\Controllers\Employer\HomeController as EmployerHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (!is_null(Auth::user())) {
        if (Auth::user()->hasRole('employee')) {
            return redirect(route('employee.home'));
        }

        if (Auth::user()->hasRole('employer')) {
            return redirect(route('employer.home'));
        }
    }

    return view('welcome');
})->name('home');

Route::get('/employerdetail', function () {
    return view('employerdetail');
});
Route::group(['middleware' => ['role:employee'], 'prefix' => 'employee'], function () {
    Route::get('', [HomeController::class, 'show'])->name('employee.home');
    Route::post('/worklogs', [WorklogController::class, 'store'])->name('employee.worklogs.store');
    Route::put('/worklogs/{worklog}', [WorklogController::class, 'edit'])->name('employee.worklogs.update');
});

Route::group(['middleware' => ['role:employer'], 'prefix' => 'employer'], function () {
    Route::get('/employees', [EmployerHomeController::class, 'show'])->name('employer.home');
    Route::get('/employees/create', [EmployerEmployeeController::class, 'create'])->name('employer.employees.create');
    Route::get('/employees/{employee}', [EmployerEmployeeController::class, 'show'])->name('employer.employees.show');
    Route::get('/employees/{employee}/edit', [EmployerEmployeeController::class, 'edit'])->name('employer.employees.edit');
    Route::post('/enroll/{employee}', [EnrollmentController::class, 'enroll'])->name('employer.employee.enroll');
    Route::post('/unenroll/{employee}', [EnrollmentController::class, 'unEnroll'])->name('employer.employee.unenroll');
    Route::post('/employees', [EmployerEmployeeController::class, 'store'])->name('employer.employee.create');
    Route::put('/employees/{employee}', [EmployerEmployeeController::class, 'update'])->name('employer.employees.update');
});

Auth::routes();
