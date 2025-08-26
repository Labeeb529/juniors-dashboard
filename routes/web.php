<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\GuidesController;
use App\Http\Controllers\AttendanceController;

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

Route::view('/', 'home');

Route::view('/about', 'about');

Route::get('/notes', [NotesController::class, "loadNotes"]);
Route::view('/past-papers', 'past-papers');
Route::view('/gpa-calculator', 'gpa-calculator');

Route::get('/guides', [GuidesController::class, "loadGuides"]);
Route::get('/guide/{guide}', [GuidesController::class, "viewSingleGuide"]);

Route::get('/attendance', [AttendanceController::class, 'attendance']);
Route::post('/attendance', [AttendanceController::class, 'attendance']);

Route::get('/cms', function () {
    return redirect()->away('https://cms.must.edu.pk:8082');
});

//Admins Panel

Route::get('/admin-login', [AdminController::class, 'showLoginPage']);
Route::post('/admin-login', [AdminController::class, 'login']);

Route::get('/admin', [AdminController::class, 'loadAdmin'])
    ->middleware('auth')
    ->name('admin');

Route::post('/signout', [AdminController::class, 'signout']);

Route::post('/create-guide', [GuidesController::Class, 'createGuide']);