<style>
    .marquee-container {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        max-width: 100%;
    }

    .marquee-text {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 15s linear infinite;
        font-size: 1.25rem; /* Ukuran font lebih besar */
        font-weight: 600;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .navbar-custom {
        padding-top: 1rem;  /* Tambah tinggi */
        padding-bottom: 1rem;
        font-size: 1.7rem; /* Ukuran font untuk menu */
    }

    @media (min-width: 768px) {
        .marquee-container {
            width: auto;
        }
    }

    .nav-link-custom {
        font-size: 1.1rem; /* Ukuran font untuk link navigasi */
    }

    .nav-icon {
        width: 1.2em;
        height: 1.2em;
    }

    .nav-link-custom {
    font-size: 1.1rem;
}
</style>

<nav class="navbar fixed-top shadow-sm navbar-custom" style="background-color: #E8B535;">
    <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">
        
        <!-- Marquee Teks Selamat Datang -->
        <div class="marquee-container text-dark fw-semibold">
            <div class="marquee-text">
                Selamat Datang di <strong>Oscar Multimedia</strong> Ungaran, mau cetak apa saja bisa
            </div>
        </div>

        <!-- Menu Link -->
        <div class="d-flex align-items-center gap-4 mt-3 mt-md-0 pe-5 ps-3">
            <!-- Link Profile -->
            <a class="text-dark d-flex align-items-center gap-4 text-decoration-none nav-link-custom" href="{{ route('home') }}">
                <svg class="nav-icon" stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                </svg>
            </a>
            <a class="text-dark text-decoration-none nav-link-custom" href="{{ route('profile') }}">Profile</a>
            <a class="text-dark text-decoration-none nav-link-custom" href="{{ route('kontak') }}">Alamat & Contact</a>
        </div>
            </div>
</nav>