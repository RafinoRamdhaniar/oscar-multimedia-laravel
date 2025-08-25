{{-- Memberi tahu Laravel untuk menggunakan layout 'guest' --}}
@extends('layouts.guest')

{{-- (Opsional) Mengisi judul halaman spesifik --}}
@section('title', 'Oscar Multimedia - Produk')

{{-- Mengisi bagian 'content' yang sudah kita siapkan di layout --}}
@section('content')
<style>
    /* Atur jarak atas untuk konten yang berada di bawah topbar fixed */
.content-top-padding {
    /* Margin untuk tampilan mobile dan tablet */
    margin-top: 90px; 
}

/* Media query untuk tampilan desktop */
@media (min-width: 768px) {
    .content-top-padding {
        /* Sesuaikan dengan tinggi topbar di desktop */
        margin-top: 50px;
    }
}

@media (min-width: 768px) and (max-width: 991.98px) {

    /* 1. Ubah alignment container utama menjadi ke tengah */
    .navbar-custom > .container-fluid {
        justify-content: center !important; /* Paksa item di dalamnya ke tengah */
    }

    /* 2. Hapus margin atas pada grup menu yang tidak lagi diperlukan */
    .navbar-custom .d-flex.align-items-center.gap-4 {
        margin-top: 0 !important;
    }
}

.card .overlay {
    position: absolute;
    inset: 0; /* top:0; right:0; bottom:0; left:0 */
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card:hover .overlay {
    opacity: 1;
}
</style>
<div class="container content-top-padding">
    <div class="text-center mb-5">
        <h1>Katalog Produk Kami</h1>
        <p class="lead text-muted">Temukan produk terbaik yang sesuai dengan kebutuhan Anda.</p>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Filter</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('produk') }}">
                        <div class="mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                        </div>
                        
                        <h6>Kategori</h6>
                        @foreach($kategori as $kat)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" 
                                       value="{{ $kat }}" id="kategori-{{ $loop->index }}"
                                       {{ request('kategori') == $kat ? 'checked' : '' }}>
                                <label class="form-check-label" for="kategori-{{ $loop->index }}">
                                    {{ $kat }}
                                </label>
                            </div>
                        @endforeach

                        <div class="d-grid gap-2 mt-4">
                            <button target="_blank" class="btn mt-2" style= "background-color: #e8b535; color: #fff;">Terapkan Filter</a></button>
                            <a href="{{ route('produk') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($produks as $produk)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">

                    {{-- Gambar dengan overlay hover --}}
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $produk->foto) }}" 
                             class="card-img-top" 
                             alt="{{ $produk->nama_produk }}" 
                             style="height: 220px; object-fit: cover;">
                        
                        {{-- Overlay tombol detail --}}
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <a href="{{ route('detail', $produk->id) }}" 
                               class="btn btn-warning text-white fw-bold px-4">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    {{-- Info Produk di tengah card --}}
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $produk->nama_produk }}</h5>
                        <p class="text-muted small mb-1">{{ $produk->kategori }}</p>
                        <p class="fw-bold fs-5 text-success mb-0">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Produk yang Anda cari tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection