{{-- Memberi tahu Laravel untuk menggunakan layout 'guest' --}}
@extends('layouts.guest')

{{-- (Opsional) Mengisi judul halaman spesifik --}}
@section('title', 'Oscar Multimedia')

{{-- Mengisi bagian 'content' yang sudah kita siapkan di layout --}}
@section('content')

    @include('layouts.partials.topbar-lading')

    @include('layouts.partials.highlight-product')

    @include('layouts.partials.digital-printing')

    @include('layouts.partials.desain-grafis')

    @include('layouts.partials.jasa-komputer')

@endsection