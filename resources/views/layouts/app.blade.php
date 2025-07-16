<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Oscar') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { overflow-x: hidden; }
        .sidebar {
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: #343a40;
            color: #fff;
            transition: width 0.3s ease;
        }
        /* .sidebar.collapsed { transform: translateX(-100%); } */
        .sidebar.collapsed {
            width: 72px; /* Bukan lagi translateX */
        }
        .logo-img {
            width: 100%;
            max-width: 160px;
            height: auto;
            transition: max-width 0.3s ease;
        }
        .sidebar.collapsed .logo-img {
             max-width: 48px;
        }
        /* Sidebar link layout */
        .sidebar-link-inner {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: flex-start;
            transition: all 0.3s ease;
        }
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        .sidebar.collapsed .sidebar-link-inner {
            flex-direction: column;
            justify-content: center;
        }

        .sidebar-toggle { background: none; border: none; font-size: 1.2rem; }
        .sidebar a { color: #fff; padding: 10px 20px; display: block; text-decoration: none; }
        .sidebar a:hover { background-color:  rgba(129, 129, 129, 0.1); }
        .main-content { margin-left: 240px; transition: margin-left 0.3s ease; }
        .main-content.full { margin-left: 70px; }
        .topbar { background-color: #fff; padding: 10px 20px; border-bottom: 1px solid #dee2e6; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
        .sidebar a.sidebar-link {
            transition: background 0.2s ease;
        }
        .sidebar a.sidebar-link:hover {
            background-color: rgba(129, 129, 129, 0.1);
        }
        .sidebar a.sidebar-link.active {
            background-color: rgba(129, 129, 129, 0.1);
        }
        /* Hover efek khusus untuk logout */
        .logout-link:hover {
            background-color: #dc3545 !important; /* Merah (bootstrap danger) */
            color: #fff !important;
        }
        .logout-link:hover i,
        .logout-link:hover .sidebar-text {
            color: #fff !important;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    {{-- Main --}}
    <div class="main-content" id="mainContent">
        {{-- Topbar --}}
        @include('layouts.partials.topbar')

        {{-- Page Content --}}
        <div class="container-fluid mt-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('full');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            // Auto collapse jika layar kecil saat load
            if (window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('full');
            }

            // Optional: Responsif saat resize layar
            window.addEventListener('resize', function () {
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('full');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('full');
                }
            });
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    </script>

</body>
</html>