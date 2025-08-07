<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        // Data untuk section lain yang mungkin Anda butuhkan
        $productIds = [1, 5, 8, 12, 15, 3];
        $digitalPrintingProducts = produk::whereIn('id', $productIds)
                                    ->orderByRaw('FIELD(id, ' . implode(',', $productIds) . ')')
                                    ->get();

        // Data untuk section lain yang mungkin Anda butuhkan
        $highlightedProducts = Produk::latest()->take(4)->get();
        $highlightProduct = Produk::latest()->first();

        // --- Logika untuk Carousel ---
        // 1. Ambil semua kategori yang unik
        $categories = Produk::select('kategori')->distinct()->get();
        
        // 2. Siapkan koleksi untuk menampung produk carousel
        $carouselProducts = new Collection();

        // 3. Ambil 1 produk terbaru dari setiap kategori
        foreach ($categories as $category) {
            $product = Produk::where('kategori', $category->kategori)->latest()->first();
            if ($product) {
                $carouselProducts->push($product);
            }
        }

        // --- Logika untuk Section "Desain Grafis" ---
        // Ambil semua produk 'Desain' untuk fitur tampilkan/sembunyikan
        $desainProducts = Produk::where('kategori', 'Desain Logo')
                                ->latest()
                                ->get();

        // --- Kirim semua data yang dibutuhkan ke view ---
        // Bagian ini telah diperbaiki dengan menghapus duplikat
        return view('home', [
            'carouselProducts'    => $carouselProducts,
            'desainProducts'      => $desainProducts,
            'digitalPrintingProducts' => $digitalPrintingProducts,
            'highlightedProducts' => $highlightedProducts,
            'highlightProduct'    => $highlightProduct,
        ]);
    }
}