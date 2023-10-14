<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AngkatanController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\JadwalPrakerinController;
use App\Http\Controllers\Dashboard\KelasController;
use App\Http\Controllers\Dashboard\PeriodePrakerinController;
use App\Http\Controllers\Dashboard\SiswaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PerusahaanController;
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
    Route::post('/guru/import', [GuruController::class, 'import'])
        ->name('guru.import');
    Route::get('/guru/export/to-excel', [GuruController::class, 'export'])
        ->name('guru.export');

    Route::resource('/user', UserController::class);

    Route::resource('/angkatan', AngkatanController::class);

    Route::resource('/program', ProgramKeahlianController::class);

    Route::resource('/angkatan/{angkatan}/kelas', KelasController::class);

    Route::resource('/angkatan/{angkatan}/kelas/{kelas}/siswa', SiswaController::class);

    Route::resource('/perusahaan', PerusahaanController::class);
    Route::post('/perusahaan/import', [PerusahaanController::class, 'import'])
        ->name('perusahaan.import');
    Route::get('/perusahaan/export/to-excel', [PerusahaanController::class, 'export'])
        ->name('perusahaan.export');

    Route::resource('/jadwal', JadwalPrakerinController::class);

    Route::resource('/periode', PeriodePrakerinController::class);

    Route::get('/data', [DataController::class, 'index']);
});
