<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentLoginController;
use App\Http\Controllers\teacherLoginController;

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
    return view('studentLogin');
});
Route::get('/studentLogin', [studentLoginController::class, 'Login'])->name('studentLogin');
Route::post('/studentLogin', [studentLoginController::class, 'studentLogin'])->name('student-Login');
Route::get('/studentRegistration', [studentLoginController::class, 'Registration'])->name('studentRegistration');
Route::post('/studentRegister', [studentLoginController::class, 'Register'])->name('studentRegister');
Route::get('/studentDashboard', [studentLoginController::class, 'Dashboard'])->name('studentDashboard');
Route::get('/studentLogout', [studentLoginController::class, 'Logout'])->name('studentLogout');

Route::get('/teacherLogin', [teacherLoginController::class, 'Login'])->name('teacherLogin');
Route::post('/teacherLogin', [teacherLoginController::class, 'teacherLogin'])->name('teacher-Login');
Route::get('/teacherRegistration', [teacherLoginController::class, 'Registration'])->name('teacherRegistration');
Route::post('/teacherRegister', [teacherLoginController::class, 'Register'])->name('teacherRegister');
Route::get('/teacherDashboard', [teacherLoginController::class, 'Dashboard'])->name('teacherDashboard');
Route::get('/teacherLogout', [teacherLoginController::class, 'Logout'])->name('teacherLogout');
