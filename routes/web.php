<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->get('/barang', [BarangController::class, 'index'])->name('barang.index');


Route::middleware(['auth', 'role:admin'])->group(function () {
    // fitur tambah barang
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

    // fitur update
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

});


Route::middleware(['auth', 'role:staff'])->group(function () {
    // index adalah method untuk menampilkan daftar data contoh seperti get /barang
  
    

    // fitur transaksi masuk
    Route::get('/transaksi/masuk', [TransaksiController::class, 'masuk'])->name('transaksi.masuk');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

    //Fitur transaksi keluar 
    Route::get('/transkasi/keluar', [TransaksiController::class, 'keluar'])->name('transaksi.keluar');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

});

Route::middleware(['auth', 'role:staff'])->group(function () {

    // Transaksi masuk & keluar
    Route::get('/transaksi/masuk', [TransaksiController::class, 'formMasuk'])->name('transaksi.masuk');
    Route::post('/transaksi/masuk', [TransaksiController::class, 'storeMasuk'])->name('transaksi.store.masuk');

    Route::get('/transaksi/keluar', [TransaksiController::class, 'formKeluar'])->name('transaksi.keluar');
    Route::post('/transaksi/keluar', [TransaksiController::class, 'storeKeluar'])->name('transaksi.store.keluar');
});
require __DIR__ . '/auth.php';
