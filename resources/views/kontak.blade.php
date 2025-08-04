<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Oscar Multimedia</title>
    <link rel="icon" href="{{ asset('Logo Oscar old.ico') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            margin-top: 100px; /* agar tidak tertutup navbar */
        }

        .bg-custom-header-footer {
            background-color: #e6b34b;
            color: #212529;
        }

        .contact-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .contact-title {
            font-weight: bold;
            color: #1a1a1a;
        }

        .contact-link {
            text-decoration: none;
            color: #4a60ff;
        }

        .contact-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.header')

    {{-- Konten --}}
    <main class="container py-5">
    <h2 class="text-center fw-bold mb-4">Hubungi Kami</h2>
    
    <div class="row justify-content-center g-4">
        <div class="col-md-8">
            <div class="contact-card ">
                <h5 class="contact-title"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Alamat</h5>
                <p class="mb-1">Jl. Bukit Leyangan Indah IV No. 294</p>
                <p class="mb-0">Maps: <a href="https://maps.app.goo.gl/YtqGkYRvm8Gt4WXS6" class="contact-link" target="_blank">Oscar Multimedia</a></p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="contact-card ">
                <h5 class="contact-title"><i class="bi bi-envelope-fill text-primary me-2"></i>Email</h5>
                <p class="mb-0">oscarmultimedia.new@gmail.com</p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="contact-card ">
                <h5 class="contact-title"><i class="bi bi-phone-fill text-success me-2"></i>Social Media</h5>
                <p class="mb-0">Whatsapp: <a href="https://wa.me/message/5H5HU5R4NEDCK1" class="contact-link" target="_blank">Oscar Multimedia</a></p>
            </div>
        </div>
    </div>
</main>


    {{-- Footer --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
