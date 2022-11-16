<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentLoginController;
use App\Http\Controllers\teacherLoginController;
use App\Http\Controllers\teacherDashboardController;

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
Route::get('/Student/Login', [studentLoginController::class, 'Login'])->name('studentLogin');
Route::post('/Student', [studentLoginController::class, 'studentLogin'])->name('student-Login');
Route::get('/Student/Registration', [studentLoginController::class, 'Registration'])->name('studentRegistration');
Route::post('/Student/Register', [studentLoginController::class, 'Register'])->name('studentRegister');
Route::get('/Student/Dashboard', [studentLoginController::class, 'Dashboard'])->name('studentDashboard');
Route::get('/Student/Logout', [studentLoginController::class, 'Logout'])->name('studentLogout');

Route::get('/Teacher/Login', [teacherLoginController::class, 'Login'])->name('teacherLogin');
Route::post('/Teacher', [teacherLoginController::class, 'teacherLogin'])->name('teacher-Login');
Route::get('/Teacher/Registration', [teacherLoginController::class, 'Registration'])->name('teacherRegistration');
Route::post('/Teacher/Register', [teacherLoginController::class, 'Register'])->name('teacherRegister');
Route::get('/Teacher/Dashboard', [teacherLoginController::class, 'Dashboard'])->name('teacherDashboard');
Route::get('/Teacher/Logout', [teacherLoginController::class, 'Logout'])->name('teacherLogout');

Route::post('/Teacher/Edit', [teacherDashboardController::class, 'edit'])->name('edit');
Route::get('/Teacher/Delete/{id}', [teacherDashboardController::class, 'delete'])->name('delete');
