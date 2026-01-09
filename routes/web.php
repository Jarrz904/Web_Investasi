<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Portal Investasi Kabupaten Tegal - Web Routes
|--------------------------------------------------------------------------
*/Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 1. BERANDA
Route::get('/', [InvestasiController::class, 'index'])->name('beranda');

// 2. POTENSI (Dropdown Menu)
Route::prefix('potensi')->group(function () {
    Route::get('/', [InvestasiController::class, 'potensi'])->name('potensi.index');
    Route::get('/profil', [InvestasiController::class, 'profilWilayah'])->name('potensi.profil');
    Route::get('/sub-wilayah', [InvestasiController::class, 'subWilayah'])->name('potensi.sub');
    Route::get('/sektor', [InvestasiController::class, 'sektor'])->name('potensi.sektor');
    Route::get('/spatial-plan', [InvestasiController::class, 'spatialPlan'])->name('potensi.spatial');
});

// 3. PELUANG & DETAIL
Route::get('/peluang', [InvestasiController::class, 'peluang'])->name('peluang.index');
Route::get('/peluang/{id}', [InvestasiController::class, 'detailPeluang'])->name('peluang.show');

// 4. PETA INVESTASI
Route::get('/peta-investasi', [InvestasiController::class, 'peta'])->name('peta.index');

// 5. PERUSAHAAN
Route::get('/perusahaan', [InvestasiController::class, 'perusahaan'])->name('perusahaan.index');
// Tambahan rute show untuk menangani detail perusahaan (Memperbaiki error RouteNotFoundException)
Route::get('/perusahaan/{id}', [InvestasiController::class, 'detailPerusahaan'])->name('perusahaan.show');

// 6. GALERI
Route::get('/galeri', [InvestasiController::class, 'galeri'])->name('galeri.index');

// 7. KONTAK
Route::get('/kontak', [InvestasiController::class, 'kontak'])->name('kontak.index');