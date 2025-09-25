{{-- Memberi tahu Laravel untuk menggunakan layout 'guest' --}}
@extends('layouts.guest')

{{-- (Opsional) Mengisi judul halaman spesifik --}}
@section('title', 'Oscar Multimedia')

{{-- Mengisi bagian 'content' yang sudah kita siapkan di layout --}}
@section('content')
    @include('layouts.partials.popup')

    @include('layouts.partials.topbar-lading')

    @include('layouts.partials.highlight-product')

    @include('layouts.partials.digital-printing')

    @include('layouts.partials.desain-grafis')

    @include('layouts.partials.jasa-komputer')

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const popupOverlay = document.getElementById('infoPopupOverlay');
    const closePopupBtn = document.getElementById('closePopupBtn');

    // Cek apakah pop-up sudah pernah ditampilkan di sesi ini
    if (!sessionStorage.getItem('infoPopupShown')) {
        // Jika belum, tampilkan pop-up
        if (popupOverlay) {
            popupOverlay.style.display = 'flex';
        }

        // Tandai bahwa pop-up sudah ditampilkan
        sessionStorage.setItem('infoPopupShown', 'true');
    }

    // Fungsi untuk menutup pop-up
    function closePopup() {
        if (popupOverlay) {
            popupOverlay.style.display = 'none';
        }
    }

    // Tambahkan event listener untuk tombol close
    if (closePopupBtn) {
        closePopupBtn.addEventListener('click', closePopup);
    }

    // (Opsional) Tutup pop-up saat mengklik area overlay
    if (popupOverlay) {
        popupOverlay.addEventListener('click', function(event) {
            if (event.target === popupOverlay) {
                closePopup();
            }
        });
    }
});
</script>    