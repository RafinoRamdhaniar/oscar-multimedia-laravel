<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori; // DITAMBAHKAN: Import model Kategori
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        // === LANGKAH 1: Ambil ID Kategori yang dibutuhkan ===
        $kategoriDesain    = Kategori::where('id', '1')->first();
        $kategoriPrinting  = Kategori::where('id', '2')->first();
        // Anda bisa menambahkan kategori lain jika perlu, misal:
        $kategoriComputer  = Kategori::where('id', '3')->first();

        // Ambil ID-nya dengan aman (jika kategori tidak ditemukan, hasilnya akan null)
        $desainId    = $kategoriDesain?->id;
        $printingId  = $kategoriPrinting?->id;
        $computerId  = $kategoriComputer?->id;
        
        $desainNama    = $kategoriDesain?->nama_kategori;
        $printingNama  = $kategoriPrinting?->nama_kategori;
        $computerNama  = $kategoriComputer?->nama_kategori;
        // === PERBAIKAN LOGIKA LAMA ANDA ===

        // --- Logika untuk Section "Digital Printing" ---
        // DIUBAH: Mengambil produk berdasarkan ID kategori, bukan ID produk statis.
        $digitalPrintingProducts = Produk::where('kategori_id', $printingId)
                                         ->latest()
                                         ->get();

        // --- Logika untuk Produk Sorotan (Highlighted) ---
        $highlightedProducts = Produk::latest()->take(4)->get();
        $highlightProduct = Produk::latest()->first();

        // --- Logika untuk Carousel ---
        // DIUBAH: Mengambil data dari tabel Kategori langsung.
        $categories = Kategori::all();
        $carouselProducts = new Collection();

        foreach ($categories as $category) {
            // Ambil 1 produk terbaru dari setiap kategori menggunakan ID-nya.
            $product = Produk::where('kategori_id', $category->id)->latest()->first();
            if ($product) {
                $carouselProducts->push($product);
            }
        }

        // --- Logika untuk Section "Desain" ---
        // DIUBAH: Mengambil produk berdasarkan ID kategori 'Desain'.
        $desainProducts = Produk::where('kategori_id', $desainId)
                                ->latest()
                                ->get();

        // --- Kirim semua data yang dibutuhkan ke view ---
        return view('home', [
            'carouselProducts'        => $carouselProducts,
            'desainProducts'          => $desainProducts,
            'digitalPrintingProducts' => $digitalPrintingProducts,
            'highlightedProducts'     => $highlightedProducts,
            'highlightProduct'        => $highlightProduct,
            
            // DITAMBAHKAN: Kirim ID ke view agar bisa dipakai di link
            'desainId'                => $desainId,
            'printingId'              => $printingId,
            'computerId'              => $computerId,
            'desainNama'                => $desainNama,
            'printingNama'              => $printingNama,
            'computerNama'              => $computerNama,
            'kategoris'                => $categories
        ]);
    }
}
