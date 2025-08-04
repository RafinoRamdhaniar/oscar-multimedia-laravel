<nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
    <div class="container-fluid px-4">
        {{-- Logo --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('Logo Oscar old.png') }}" alt="Oscar Multimedia" style="height: 70px;">
        </a>

        {{-- Tombol Toggler untuk Mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#storefrontNavbar" aria-controls="storefrontNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Konten Navbar --}}
        <div class="collapse navbar-collapse" id="storefrontNavbar">
            {{-- Search Bar di Tengah --}}
            <div class="mx-auto" style="width: 100%; max-width: 1100px;">
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-9" id="search-icon"><i class="bi bi-search"></i></span>
                        <input class="form-control border-start-0" type="search" placeholder="Mau cetak apa?" aria-label="Search">
                    </div>
                </form>
            </div>

            {{-- Kategori Dropdown di Kanan --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori Produk
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#digital-printing">Digital Printing</a></li>
                        <li><a class="dropdown-item" href="#desain">Desain Grafis</a></li>
                        <li><a class="dropdown-item" href="#jasa-komputer">Jasa Komputer</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>