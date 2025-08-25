{{-- Menggunakan kerangka dari layout 'guest' --}}
@extends('layouts.guest')

{{-- Menetapkan judul spesifik untuk halaman ini --}}
@section('title', 'Hubungi Kami - Oscar Multimedia')

{{-- Memulai bagian konten yang akan diisi --}}
@section('content')

{{-- CSS ini spesifik hanya untuk halaman kontak, jadi kita letakkan di sini --}}
<style>
    /* Mengatur agar konten mengisi sisa ruang, diperlukan jika footer 'terbang' */
    .contact-container {
        min-height: calc(100vh - 250px); /* Sesuaikan 250px dengan tinggi header+footer Anda */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contact-card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .contact-title {
        font-weight: bold;
        color: #1a1a1a;
    }

    .contact-link {
        text-decoration: none;
        color: #4a60ff; /* Warna link yang lebih modern */
    }

    .contact-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container py-5 contact-container">
    <h2 class="text-center fw-bold mb-4">Hubungi Kami</h2>
    
    <div class="row justify-content-center g-4">
        {{-- Alamat --}}
        <div class="col-md-8">
            <div class="contact-card">
                <h5 class="contact-title"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Alamat</h5>
                <p class="mb-1">{{ $kontak->alamat }}</p>
                <p class="mb-0">Maps: <a href="{{ $kontak->maps_link }}" class="contact-link" target="_blank">Oscar Multimedia</a></p>
            </div>
        </div>

        {{-- Email --}}
        <div class="col-md-8">
            <div class="contact-card">
                <h5 class="contact-title"><i class="bi bi-envelope-fill text-primary me-2"></i>Email</h5>
                <p class="mb-0">{{ $kontak->email }}</p>
            </div>
        </div>

        {{-- Social Media --}}
        <div class="col-md-8">
            <div class="contact-card">
                <h5 class="contact-title"><i class="bi bi-phone-fill text-success me-2"></i>Social Media</h5>
                <p class="mb-0">Whatsapp: <a href="{{ $kontak->whatsapp_link }}" class="contact-link" target="_blank">Oscar Multimedia</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- Akhir dari bagian konten --}}