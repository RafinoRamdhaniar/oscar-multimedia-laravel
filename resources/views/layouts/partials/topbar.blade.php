<div class="topbar d-flex align-items-center justify-content-between">
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>
    <div>
        Halo,
        {{ Auth::check() ? Auth::user()->name : 'Guest' }}
    </div>
</div>