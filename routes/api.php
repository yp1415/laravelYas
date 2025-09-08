<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
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

Route::controller(CoursesController::class)->group(function () {
    Route::post('/create-course',  'createNewCourse');
    Route::get('/courses/{id}',  'getCourseById');
    Route::get('/getall-course',  'getAllCourses');
    Route::delete('/courses/{id}', 'destroy');
});
