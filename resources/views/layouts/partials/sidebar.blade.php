<div class="sidebar bg-light text-black d-flex flex-column" id="sidebar">
    {{-- Logo --}}
    <div class="text-center py-3 border-bottom">
        <a href="{{ route('dashboard') }}" class="d-block px-3">
            <img src="{{ asset('logo_oscar_old.png') }}" alt="Logo" class="logo-img mx-auto d-block">
        </a>
    </div>

    {{-- Menu utama --}}
    <div class="pt-3 px-3 flex-grow-1 d-flex flex-column gap-1 align-items-stretch">
        <a href="{{ route('dashboard') }}" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-speedometer2 fs-5"></i>
                <span class="sidebar-text">Dashboard</span>
            </div>
        </a>
        <a href="{{ route('admin.kategori.index') }}" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('admin.kategori.index') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-boxes fs-5"></i>
                <span class="sidebar-text">Kategori Produk</span>
            </div>
        </a>
        <a href="{{ route('admin.produk.index') }}" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('admin.produk.index') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-box fs-5"></i>
                <span class="sidebar-text">Produk</span>
            </div>
        </a>
        <a href="{{ route('admin.kontak.index') }}" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('admin.kontak.index') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-telephone fs-5"></i>
                <span class="sidebar-text">Kontak</span>
            </div>
        </a>
        <a href="{{ route('admin.profile.index') }}" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded {{ request()->routeIs('admin.profile.index') ? 'active' : '' }}">
            <div class="sidebar-link-inner">
                <i class="bi bi-building-gear fs-5"></i>
                <span class="sidebar-text">Profile</span>
            </div>
        </a>
    </div>

    {{-- Logout di bagian bawah --}}
    <div class="px-3 py-3 border-top">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link text-black text-decoration-none py-2 px-2 rounded logout-link">
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