<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    // Halaman dashboard (statistik)
    Route::get('/dashboard', function () {
        $totalProduk = \App\Models\Produk::count();
        $totalKategori = \App\Models\Produk::select('kategori')->distinct()->count();
        return view('dashboard', compact('totalProduk', 'totalKategori'));
    })->name('dashboard');

    // Halaman produk (CRUD)
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

require __DIR__.'/auth.php';
