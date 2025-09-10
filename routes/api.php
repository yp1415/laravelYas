<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', AdminMiddleware::class])->group( function() {
    Route::get('/admin/dashboard', function (Request $request) {
        return response()->json(['user' => $request->user()]);
    });
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::controller(CoursesController::class)
    ->prefix("course")
    ->group(function () {
    Route::post('/create', 'createNewCourse');
    Route::get('/getall', 'getAllCourses');
    Route::get('/{id}', 'getCourseById');
    Route::delete('/{id}', 'destroy');
    Route::put('/{id}', 'destroy');
});


Route::controller(UserController::class)
    ->prefix("user")
    ->group(function () {
    Route::get('/getall',  'GetAllUser');
    Route::post('/create',  'createNewUser');
    Route::delete('/{id}', 'destroy');
});


Route::post('/SubmitCourse/{id}', [EnrollmentController::class, 'submitStudentInCourse'])->middleware('auth:sanctum');
