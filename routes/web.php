<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

Route::get('/kontak', [KontakController::class, 'show'])->name('kontak');
// Route::get('/kontak', function () {
//     return view('kontak');
// })->name('kontak');

Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('detail');

Route::get('/produk', [ProdukController::class, 'katalog'])->name('produk');

Route::middleware('auth')->group(function () {
    // Halaman dashboard (statistik)
    Route::get('/dashboard', function () {
        $totalProduk = \App\Models\Produk::count();
        $totalKategori = \App\Models\Produk::select('kategori')->distinct()->count();
        return view('dashboard', compact('totalProduk', 'totalKategori'));
    })->name('dashboard');

    // Halaman produk (CRUD)
    // Route::get('/home', [BerandaController::class, 'index']);
    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
    Route::post('/admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::put('/admin/produk/{produk}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{produk}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

    Route::get('/admin/kontak', [KontakController::class, 'form'])->name('admin.kontak.index');
    Route::post('/admin/kontak', [KontakController::class, 'storeOrUpdate'])->name('admin.kontak.save');

    // Admin profil
    Route::get('/admin/profile', [ProfileController::class, 'form'])->name('admin.profile.index');
    Route::post('/admin/profile', [ProfileController::class, 'storeOrUpdate'])->name('admin.profile.update');

});

require __DIR__.'/auth.php';
