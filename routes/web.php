<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController; // Pastikan controller admin diimport

/*
|--------------------------------------------------------------------------
| Portal Investasi Kabupaten Tegal - Web Routes
|--------------------------------------------------------------------------
*/

// --- AUTHENTICATION ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- PUBLIC AREA ---
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
Route::get('/perusahaan/{id}', [InvestasiController::class, 'detailPerusahaan'])->name('perusahaan.show');

// 6. GALERI
Route::get('/galeri', [InvestasiController::class, 'galeri'])->name('galeri.index');

// 7. KONTAK
Route::get('/kontak', [InvestasiController::class, 'kontak'])->name('kontak.index');


// --- ADMIN AREA (TAMBAHAN BARU) ---
// Semua rute di dalam group ini membutuhkan login (middleware auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contoh Rute Manajemen Proyek (CRUD nantinya)
    // Route::resource('proyek', ProyekController::class);
    
});