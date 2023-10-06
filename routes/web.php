<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\GuruController;
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
    Route::get('/', [AuthController::class, 'create']);

    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('/guru', GuruController::class);
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])
        ->name('guru.destroy');
});
