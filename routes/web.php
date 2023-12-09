<?php

use App\Http\Controllers\Dashboard\AngkatanController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\JadwalPrakerinController;
use App\Http\Controllers\Dashboard\KelasController;
use App\Http\Controllers\Dashboard\SiswaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PerusahaanController;
use App\Http\Controllers\Dashboard\ProgramController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'checkLevel:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/guru', GuruController::class);
        Route::post('/guru/import', [GuruController::class, 'import'])->name('guru.import');
        Route::get('/guru/export/to-excel', [GuruController::class, 'export'])->name('guru.export');

        Route::resource('/user', UserController::class);

        Route::resource('/program', ProgramController::class);

        Route::resource('/perusahaan', PerusahaanController::class);
        Route::post('/perusahaan/import', [PerusahaanController::class, 'import'])->name('perusahaan.import');
        Route::get('/perusahaan/export/to-excel', [PerusahaanController::class, 'export'])->name('perusahaan.export');

        Route::resource('/jadwal', JadwalPrakerinController::class);
    });
});

Route::middleware(['auth', 'checkLevel:admin,auru'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/angkatan', AngkatanController::class);
    
        Route::resource('/kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
    
        Route::resource('/siswa', SiswaController::class);

        Route::get('/panduan', [DashboardController::class, 'help'])->name('help');

        Route::get('/pengaturan', [DashboardController::class, 'setting'])->name('setting');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update_profile'])->name('profile.update_profile');
        Route::patch('/profile', [ProfileController::class, 'update_account'])->name('profile.update_account');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
