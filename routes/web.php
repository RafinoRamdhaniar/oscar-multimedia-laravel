<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');


Route::middleware('auth')->group(function () {
    // Halaman dashboard (statistik)
    Route::get('/dashboard', function () {
        $totalProduk = \App\Models\Produk::count();
        $totalKategori = \App\Models\Produk::select('kategori')->distinct()->count();
        return view('dashboard', compact('totalProduk', 'totalKategori'));
    })->name('dashboard');

    // Halaman produk (CRUD)
    Route::get('/home', [BerandaController::class, 'index']);
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

require __DIR__.'/auth.php';
