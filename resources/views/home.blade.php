<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo_oscar_old.ico') }}">
    <title>Oscar Multimedia - Landing Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* Kustomisasi Warna dan Style */
        body {
            background-color: #ffffff; /* Warna latar belakang utama */
        }

        .bg-custom-header-footer {
            background-color: #e6b34b; /* Warna kuning/emas untuk header dan footer */
            color: #212529; /* Warna teks gelap agar kontras */
        }

        .placeholder-box {
            background-color: #d9d9d9; /* Warna abu-abu untuk placeholder */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #555;
            min-height: 150px; /* Tinggi minimum untuk semua box */
            width: 100%;
            border-radius: 0.25rem; /* Sedikit lengkungan di sudut */
        }

        .section-title {
            font-weight: bold;
            color: #333;
            margin-top: 4rem;
            margin-bottom: 2rem;
        }

        /* Menyesuaikan tinggi placeholder sesuai desain */
        .tall-placeholder {
            height: 420px;
        }
        .small-placeholder {
            height: 200px;
        }
        .large-placeholder {
            height: 350px;
        }
    </style>
</head>
<body>
    <!-- Header -->
      @include('layouts.header')
    <main class="container-fluid px-4 my-5">\
        @include('layouts.partials.topbar-lading')

        @include('layouts.partials.highlight-product')

        @include('layouts.partials.digital-printing')

        @include('layouts.partials.desain-grafis')

        @include('layouts.partials.jasa-komputer')
    </main> 
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>