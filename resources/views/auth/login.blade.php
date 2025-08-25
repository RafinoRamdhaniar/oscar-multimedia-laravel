<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Oscar Multimedia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Style kustom untuk layout */
        html, body {
            height: 100%; /* Membuat body memenuhi tinggi layar */
        }

        body {
            display: flex; /* Menggunakan Flexbox untuk centering */
            align-items: center; /* Menengahkan secara vertikal */
            justify-content: center; /* Menengahkan secara horizontal */
            background-color: #f8f9fa; /* Warna latar belakang abu-abu muda */
        }

        /* Kustomisasi kartu login */
        .login-card {
            width: 100%;
            max-width: 500px;
            /* Gunakan kode warna ini untuk abu-abu yang lebih terang */
            border: 1px solid #ced4da; /* Abu-abu terang, warna border default Bootstrap */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="card login-card p-4">
        <div class="card-body">
            
            <div class="text-center mb-4">
                {{-- Ganti 'path/ke/logo.png' dengan path logo Anda --}}
                <img src="{{ asset('logo_oscar_old.png') }}" alt="Oscar Multimedia Logo" style="width: 150px;">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>