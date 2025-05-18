<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Index,
    BukuController,
    AnggotaController,
    TransaksiController,
    LaporanController,
    LoginController // <- perbaikan penamaan
};
use Barryvdh\DomPDF\Facade as PDF;

// ===================
// LOGIN ROUTES
// ===================
// Tampilkan form login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// ===================
// PROTECTED ROUTES
// ===================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [Index::class, 'index'])->name('dashboard');

    // Buku
    Route::prefix('buku')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('buku.index');
        Route::get('/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    });

    // Anggota
    Route::prefix('anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('anggota.index');
        Route::get('/create', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::post('/', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::put('/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
        Route::delete('/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    });

    // Transaksi
    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
        Route::put('/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
        Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    });

    // Laporan
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/buku', [LaporanController::class, 'buku'])->name('buku');
        Route::get('/anggota', [LaporanController::class, 'anggota'])->name('anggota');
        Route::get('/transaksi', [LaporanController::class, 'transaksi'])->name('transaksi');
        Route::get('/buku/pdf', [LaporanController::class, 'bukuPdf'])->name('buku.pdf');
        Route::get('/anggota/pdf', [LaporanController::class, 'anggotaPdf'])->name('anggota.pdf');
    });

    // PDF Test Route (for development only)
    if (app()->environment('local')) {
        Route::get('/pdf-test', function () {
            $data = ['title' => 'Test PDF'];
            return PDF::loadView('pdf.test', $data)->stream('test.pdf');
        });
    }
});

// ===================
// FALLBACK
// ===================
Route::fallback(function () {
    return redirect()->route('dashboard')->with('error', 'Halaman tidak ditemukan');
});
