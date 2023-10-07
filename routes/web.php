<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AngkatanController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\KelasController;
use App\Http\Controllers\Dashboard\SiswaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProgramKeahlianController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'store'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy'])
        ->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('/guru', GuruController::class);

    Route::resource('/user', UserController::class);

    Route::resource('/angkatan', AngkatanController::class);

    Route::resource('/program', ProgramKeahlianController::class);

    Route::resource('/kelas', KelasController::class);

    Route::resource('/angkatan/{angkatan}/kelas/{kelas}/siswa', SiswaController::class);
});
