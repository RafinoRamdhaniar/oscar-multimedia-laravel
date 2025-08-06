<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo_oscar_old.ico') }}">
    <title>Profil - Oscar Multimedia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding-top: 100px;
        }

        .bg-custom-header-footer {
            background-color: #e8b535;
            color: #212529;
        }

        .section-title {
            font-weight: bold;
            color: #333;
            margin-top: 4rem;
            margin-bottom: 2rem;
        }

        .profile-logo {
            max-width: 200px;
            margin-bottom: 1rem;
        }

        .profile-content p {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            text-align: justify;
        }
    </style>
</head>
<body>
    {{-- Header --}}
    @include('layouts.header')

    {{-- Konten Profil --}}
    <main class="container text-center px-4 my-5">
        @if ($profile->logo)
            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Oscar Multimedia" class="profile-logo">
        @endif
        <h2 class="fw-bold" style="color: #e8b535;">{!! $profile -> judul !!}</h2>

        <div class="profile-content mt-4">
            <p>{!! $profile->konten !!}</p>
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>