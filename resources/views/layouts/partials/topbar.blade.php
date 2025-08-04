<div class="topbar d-flex align-items-center justify-content-between px-3">
    {{-- Tombol ini sekarang memiliki id="sidebarToggle" --}}
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list fs-4"></i>
    </button>
    <div class="fw-semibold">
        Halo, {{ Auth::check() ? Auth::user()->name : 'Guest' }}
    </div>
</div>