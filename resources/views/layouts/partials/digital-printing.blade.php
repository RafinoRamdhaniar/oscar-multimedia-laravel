<section id="digital-printing">
    <h2 class="text-center section-title">DIGITAL PRINTING</h2>

    @php
        use App\Models\produk;
        $digitalPrintingProducts = produk::where('kategori', 'Digital Printing')->latest()->take(6)->get();
    @endphp

    @if($digitalPrintingProducts->count() >= 6)
    <div class="row g-4 align-items-center">
        <!-- KOTAK TINGGI KIRI -->
        <div class="col-lg-3 d-none d-lg-block">
            @php $product = $digitalPrintingProducts[0]; @endphp
            <div class="product-card tall-card position-relative overflow-hidden">
                <img src="{{ asset('storage/produk/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                    <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                    <a href="https://wa.me/6287708259500?text=Halo, saya ingin membeli produk: {{ urlencode($product->nama_produk) }}" target="_blank" class="btn mt-2" style= "background-color: #e8b535; color: #fff;">Beli via WhatsApp</a>
                </div>
            </div>
        </div>

        <!-- 4 KOTAK KECIL TENGAH -->
        <div class="col-lg-6">
            <div class="row g-4">
                @for ($i = 1; $i <= 4; $i++)
                    @php $product = $digitalPrintingProducts[$i]; @endphp
                    <div class="col-6">
                        <div class="product-card small-card position-relative overflow-hidden">
                            <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                                <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                                <a href="https://wa.me/6287708259500?text=Halo, saya ingin membeli produk: {{ urlencode($product->nama_produk) }}" target="_blank" class="btn mt-2" style= "background-color: #e8b535; color: #fff;">Beli via WhatsApp</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- KOTAK TINGGI KANAN -->
        <div class="col-lg-3">
            @php $product = $digitalPrintingProducts[5]; @endphp
            <div class="product-card tall-card position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100 object-fit-cover">
                <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                    <h4 class="text-white fw-bold text-center">{{ $product->nama_produk }}</h4>
                    <a href="https://wa.me/6287708259500?text=Halo, saya ingin membeli produk: {{ urlencode($product->nama_produk) }}" target="_blank" class="btn mt-2" style= "background-color: #e8b535; color: #fff;">>Beli via WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

<style>
    .product-card {
        border-radius: 0.5rem;
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
</style>