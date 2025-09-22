<section id="{{ $printingId }}" class="container py-5"> {{-- Menambahkan class container dan padding --}}
    <h2 class="text-center section-title mb-5">DIGITAL PRINTING</h2> {{-- Menambahkan margin bawah --}}

    @if($digitalPrintingProducts->count() >= 6)
    <div class="row g-4 align-items-center">
        {{-- Hapus d-none d-lg-block, tambahkan col-12 dan mb-4 --}}
        <div class="col-12 col-lg-3 mb-4 mb-lg-0"> 
            @php $product = $digitalPrintingProducts[0]; @endphp
            <div class="product-card tall-card position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center p-3">
                    <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                    <a href="{{ route('produk', ['kategori' => $printingId]) }}"
                       class="btn rounded-pill px-4" 
                       style= "background-color: #e8b535; color: #fff;">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        </div>

        {{-- Tambahkan col-12 dan mb-4 --}}
        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <div class="row g-4">
                @for ($i = 1; $i <= 4; $i++)
                    @php $product = $digitalPrintingProducts[$i]; @endphp
                    <div class="col-6">
                        <div class="product-card small-card position-relative overflow-hidden">
                            <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center p-3">
                                <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                                <a href="{{ route('produk', ['kategori' => $printingId]) }}"
                                   class="btn rounded-pill px-4" 
                                   style= "background-color: #e8b535; color: #fff;">
                                   Lihat Semua Produk
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Tambahkan col-12 --}}
        <div class="col-12 col-lg-3"> 
            @php $product = $digitalPrintingProducts[5]; @endphp
            <div class="product-card tall-card position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center p-3">
                    <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                    <a href="{{ route('produk', ['kategori' => $printingId]) }}"
                       class="btn rounded-pill px-4" 
                       style= "background-color: #e8b535; color: #fff;">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

<style>
    .product-card {
        /* border-radius: 0.5rem; */
        overflow: hidden;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card img {
        transition: transform 0.4s ease;
    }

    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }

    .product-card:hover img {
        transform: scale(1.1);
    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.5);
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    .product-card:hover .overlay {
        opacity: 1;
    }

    .tall-card {
        height: 100%;
        min-height: 460px;
    }

    .small-card {
        height: 220px;
    }
    
    @media (max-width: 991.98px) {
        .tall-card {
            min-height: 350px; /* Kurangi tinggi di layar mobile/tablet */
        }
    }
</style>