<?php
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/', [PesananController::class, 'create'])->name('home');
    Route::get('/menu', [PesananController::class, 'daftarMenu'])->name('menu.index');
    Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/cek-tagihan', [PesananController::class, 'formCekPesanan'])->name('pesanan.cek');
    Route::post('/cek-tagihan', [PesananController::class, 'prosesCekPesanan'])->name('pesanan.proses_cek');
    Route::get('/pembayaran/{pesanan}', [PesananController::class, 'pembayaran'])->name('pesanan.pembayaran');

    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/admin/pesanan/{pesanan}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::put('/admin/pesanan/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::delete('/admin/pesanan/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

    // Rute Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});