<div class="sidebar bg-light text-black d-flex flex-column" id="sidebar" style="min-height: 100vh;">
    {{-- Logo --}}
    <div class="text-center py-3 border-bottom bg-light bg-opacity-25">
        <a href="{{ route('dashboard') }}" class="d-block px-3">
            <img src="{{ asset('Logo Oscar old.png') }}"
                 alt="Logo"
                 class="logo-img mx-auto d-block">
        </a>
    </div>

    {{-- Menu utama --}}
    <div class="pt-3 px-3 flex-grow-1 d-flex flex-column gap-1 align-items-stretch">
        <a href="{{ route('dashboard') }}"
           class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-speedometer2 fs-5"></i>
                <span class="sidebar-text">Dashboard</span>
            </div>
        </a>

        <a href="{{ route('produk.index') }}"
           class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('produk.index') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-box fs-5"></i>
                <span class="sidebar-text">Produk</span>
            </div>
        </a>
    </div>

    {{-- Logout di bagian bawah --}}
    <div class="px-3 py-3">
        <a href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="sidebar-link text-danger text-decoration-none py-2 px-2 rounded logout-link">
            <div class="sidebar-link-inner">
                <i class="bi bi-box-arrow-left fs-5"></i>
                <span class="sidebar-text">Logout</span>
            </div>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
