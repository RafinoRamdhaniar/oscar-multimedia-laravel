@extends('layouts.app')

@section('content')
<div class="py-2">
    <h3 class="mb-4">Data Produk Oscar Multimedia</h3>

    {{-- Tombol Tambah --}}
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Tambah Produk
    </button>

    {{-- Tabel Produk --}}
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($produk->foto)
                            <img src="{{ asset('storage/' . $produk->foto) }}" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            <span class="text-muted fst-italic">Belum ada foto</span>
                        @endif

                    </td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->deskripsi }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $produk->id }}">Edit</button>

                        <!-- Form Hapus -->
                        <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('produk.update', $produk) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control"
                                            value="{{ $produk->nama_produk }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-select" required>
                                            @foreach (['Desain', 'Digital Printing', 'Computer'] as $kategori)
                                                <option value="{{ $kategori }}" {{ $produk->kategori == $kategori ? 'selected' : '' }}>
                                                    {{ $kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control"
                                            value="{{ $produk->harga }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label>Ganti Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option disabled selected>-- Pilih Kategori --</option>
                            <option>Desain</option>
                            <option>Digital Printing</option>
                            <option>Computer</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection