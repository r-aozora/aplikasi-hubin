<?php

use App\Http\Controllers\Dashboard\AngkatanController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\GuruController;
use App\Http\Controllers\Dashboard\JadwalPrakerinController;
use App\Http\Controllers\Dashboard\KelasController;
use App\Http\Controllers\Dashboard\SiswaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PerusahaanController;
use App\Http\Controllers\Dashboard\ProgramKeahlianController;
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

Route::get('/dashboard', function () {
    return view('dashboard')->with([
        'title' => 'Dashboard',
        'active' => 'Dashboard',
        'subActive' => null,
        'triActive' => null,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/guru', GuruController::class);
        Route::post('/guru/import', [GuruController::class, 'import'])
            ->name('guru.import');
        Route::get('/guru/export/to-excel', [GuruController::class, 'export'])
            ->name('guru.export');

        Route::resource('/user', UserController::class);

        Route::resource('/angkatan', AngkatanController::class);

        Route::resource('/program', ProgramKeahlianController::class);

        Route::resource('/angkatan/{angkatan}/kelas', KelasController::class)
            ->parameters(['kelas' => 'kelas']);

        Route::resource('/angkatan/{angkatan}/kelas/{kelas}/siswa', SiswaController::class);

        Route::resource('/perusahaan', PerusahaanController::class);
        Route::post('/perusahaan/import', [PerusahaanController::class, 'import'])
            ->name('perusahaan.import');
        Route::get('/perusahaan/export/to-excel', [PerusahaanController::class, 'export'])
            ->name('perusahaan.export');

        Route::resource('/jadwal', JadwalPrakerinController::class);

        Route::get('/data', [DataController::class, 'index'])->name('data.index');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
