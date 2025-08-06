@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="py-2">
    <h3 class="mb-4">Pengaturan Halaman Kontak</h3>

    <form method="POST" action="{{ route('admin.kontak.save') }}">
        @csrf

        <div class="mb-3">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control">{{ old('alamat', $kontak->alamat ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $kontak->email ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Link Google Maps:</label>
            <input type="url" name="maps_link" class="form-control" value="{{ old('maps_link', $kontak->maps_link ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Link WhatsApp:</label>
            <input type="url" name="whatsapp_link" class="form-control" value="{{ old('whatsapp_link', $kontak->whatsapp_link ?? '') }}">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection