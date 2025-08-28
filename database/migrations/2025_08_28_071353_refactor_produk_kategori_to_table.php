<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up(): void
    {
        // === LANGKAH 1: Buat tabel 'kategoris' yang baru ===
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori')->unique();
            $table->timestamps();
        });

        // === LANGKAH 2: Isi tabel 'kategoris' dengan data dari enum yang lama ===
        // Ini memastikan semua kategori lama Anda masuk ke tabel baru.
        $kategoriLama = ['Desain', 'Digital Printing', 'Computer'];
        foreach ($kategoriLama as $nama) {
            DB::table('kategoris')->insert([
                'nama_kategori' => $nama,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === LANGKAH 3: Tambah kolom 'kategori_id' ke tabel 'produks' ===
        // Dibuat nullable dulu agar tidak error saat proses pemindahan data.
        Schema::table('produks', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->after('nama_produk')->constrained('kategoris');
        });

        // === LANGKAH 4: Pindahkan data dari kolom 'kategori' lama ke 'kategori_id' baru ===
        // Ini adalah langkah paling krusial untuk menyelamatkan data Anda.
        $produks = DB::table('produks')->get();
        foreach ($produks as $produk) {
            $kategori = DB::table('kategoris')->where('nama_kategori', $produk->kategori)->first();
            if ($kategori) {
                DB::table('produks')->where('id', $produk->id)->update(['kategori_id' => $kategori->id]);
            }
        }

        // === LANGKAH 5: Hapus kolom 'kategori' enum yang lama ===
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down(): void
    {
        // Method 'down' ini berguna jika Anda perlu membatalkan migrasi.
        // 1. Tambah lagi kolom enum 'kategori' yang lama.
        Schema::table('produks', function (Blueprint $table) {
            $table->enum('kategori', ['Desain', 'Digital Printing', 'Computer'])->nullable()->after('nama_produk');
        });

        // 2. Kembalikan data dari 'kategori_id' ke kolom 'kategori' (opsional, tapi best practice).
        $produks = DB::table('produks')->whereNotNull('kategori_id')->get();
        foreach ($produks as $produk) {
            $kategori = DB::table('kategoris')->where('id', $produk->kategori_id)->first();
            if ($kategori) {
                DB::table('produks')->where('id', $produk->id)->update(['kategori' => $kategori->nama_kategori]);
            }
        }

        // 3. Hapus foreign key dan kolom 'kategori_id'.
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });

        // 4. Hapus tabel 'kategoris'.
        Schema::dropIfExists('kategoris');
    }
};
