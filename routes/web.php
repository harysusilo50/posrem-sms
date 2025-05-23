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

    Route::get('/penyuluhan/informasi-posyandu', [PenyuluhanController::class, 'information'])->name('penyuluhan.informasi.index');
    Route::get('/penyuluhan/informasi-posyandu/create', [PenyuluhanController::class, 'information_create'])->name('penyuluhan.informasi.create');
    Route::post('/penyuluhan/informasi-posyandu/store', [PenyuluhanController::class, 'information_store'])->name('penyuluhan.informasi.store');
    Route::get('/penyuluhan/informasi-posyandu/edit/{id}', [PenyuluhanController::class, 'information_edit'])->name('penyuluhan.informasi.edit');
    Route::post('/penyuluhan/informasi-posyandu/update/{id}', [PenyuluhanController::class, 'information_update'])->name('penyuluhan.informasi.update');
    Route::delete('/penyuluhan/informasi-posyandu/destroy/{id}', [PenyuluhanController::class, 'information_destroy'])->name('penyuluhan.informasi.destroy');

    Route::get('/penyuluhan/kegiatan', [PenyuluhanController::class, 'kegiatan'])->name('penyuluhan.kegiatan.index');
    Route::get('/penyuluhan/kegiatan/create', [PenyuluhanController::class, 'kegiatan_create'])->name('penyuluhan.kegiatan.create');
    Route::post('/penyuluhan/kegiatan/store', [PenyuluhanController::class, 'kegiatan_store'])->name('penyuluhan.kegiatan.store');
    Route::get('/penyuluhan/kegiatan/edit/{id}', [PenyuluhanController::class, 'kegiatan_edit'])->name('penyuluhan.kegiatan.edit');
    Route::post('/penyuluhan/kegiatan/update/{id}', [PenyuluhanController::class, 'kegiatan_update'])->name('penyuluhan.kegiatan.update');
    Route::delete('/penyuluhan/kegiatan/destroy/{id}', [PenyuluhanController::class, 'kegiatan_destroy'])->name('penyuluhan.kegiatan.destroy');

    Route::get('/penyuluhan/artikel_kesehatan', [PenyuluhanController::class, 'artikel_kesehatan'])->name('penyuluhan.artikel_kesehatan.index');
    Route::get('/penyuluhan/artikel_kesehatan/create', [PenyuluhanController::class, 'artikel_kesehatan_create'])->name('penyuluhan.artikel_kesehatan.create');
    Route::post('/penyuluhan/artikel_kesehatan/store', [PenyuluhanController::class, 'artikel_kesehatan_store'])->name('penyuluhan.artikel_kesehatan.store');
    Route::get('/penyuluhan/artikel_kesehatan/edit/{id}', [PenyuluhanController::class, 'artikel_kesehatan_edit'])->name('penyuluhan.artikel_kesehatan.edit');
    Route::post('/penyuluhan/artikel_kesehatan/update/{id}', [PenyuluhanController::class, 'artikel_kesehatan_update'])->name('penyuluhan.artikel_kesehatan.update');
    Route::delete('/penyuluhan/artikel_kesehatan/destroy/{id}', [PenyuluhanController::class, 'artikel_kesehatan_destroy'])->name('penyuluhan.artikel_kesehatan.destroy');
    
    Route::get('/penyuluhan/artikel_mental', [PenyuluhanController::class, 'artikel_mental'])->name('penyuluhan.artikel_mental.index');
    Route::get('/penyuluhan/artikel_mental/create', [PenyuluhanController::class, 'artikel_mental_create'])->name('penyuluhan.artikel_mental.create');
    Route::post('/penyuluhan/artikel_mental/store', [PenyuluhanController::class, 'artikel_mental_store'])->name('penyuluhan.artikel_mental.store');
    Route::get('/penyuluhan/artikel_mental/edit/{id}', [PenyuluhanController::class, 'artikel_mental_edit'])->name('penyuluhan.artikel_mental.edit');
    Route::post('/penyuluhan/artikel_mental/update/{id}', [PenyuluhanController::class, 'artikel_mental_update'])->name('penyuluhan.artikel_mental.update');
    Route::delete('/penyuluhan/artikel_mental/destroy/{id}', [PenyuluhanController::class, 'artikel_mental_destroy'])->name('penyuluhan.artikel_mental.destroy');
});
