{{-- resources/views/layouts/storefront.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Oscar Multimedia') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    {{-- CSS Kustom dari Proyek Sebelumnya (opsional, jika diperlukan) --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.partials.topbar-lading')

    {{-- Konten Utama Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Di sini Anda bisa menambahkan footer jika ada --}}
    {{-- @include('layouts.partials.storefront-footer') --}}

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>