@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h3 class="mb-4">Dashboard</h3>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <h2>{{ $totalProduk }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <h2>{{ $totalKategori }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection