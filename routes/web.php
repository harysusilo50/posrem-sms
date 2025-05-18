<?php

use App\Http\Controllers\Pages\UserController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\DataKesehatanController;
use App\Http\Controllers\Pages\KonsultasiController;
use App\Http\Controllers\Pages\PenyuluhanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    // User
    Route::resource('user', UserController::class);
    Route::get('report/user', [UserController::class, 'export_pdf'])->name('user.report');
    Route::get('profile', [UserController::class, 'profil'])->name('user.profil');
    Route::put('profile/update', [UserController::class, 'update_profil'])->name('user.update-profil');

    // Data Kesehatan
    Route::resource('data-kesehatan', DataKesehatanController::class);

    // Konsultasi
    Route::resource('konsultasi', KonsultasiController::class);

    // penyuluhan
    Route::get('/penyuluhan', [PenyuluhanController::class, 'index'])->name('penyuluhan.index');
});
