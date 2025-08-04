<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Oscar') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { overflow-x: hidden; background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .sidebar.collapsed {
            width: 72px;
        }
        .main-content {
            margin-left: 240px;
            transition: margin-left 0.3s ease;
        }
        .main-content.full {
            margin-left: 72px;
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
        .sidebar-link-inner {
            display: flex;
            align-items: center;
            gap: 16px;
            justify-content: flex-start;
        }
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        .sidebar-toggle { background: none; border: none; font-size: 1.2rem; color: #000; }
        
        /* CSS yang disesuaikan untuk sidebar terang */
        .sidebar a.active {
            background-color: rgba(0, 0, 0, 0.08);
            font-weight: 500;
        }
        
        .topbar { background-color: #fff; padding: 10px 20px; border-bottom: 1px solid #dee2e6; }
        
        .logout-link:hover { 
            background-color: #dc3545 !important; 
            color: #fff !important;
        }
        .logout-link:hover .sidebar-text, .logout-link:hover i {
            color: #fff !important;
        }
        
        @media (max-width: 992px) {
            .sidebar { width: 72px; }
            .sidebar.show { width: 240px; }
            .main-content { margin-left: 72px; }
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
                <div class="card-body p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            function toggleSidebar() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('full');
            }
            
            if(sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            function checkScreenSize() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('full');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('full');
                }
            }

            checkScreenSize();
            window.addEventListener('resize', checkScreenSize);
        });

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