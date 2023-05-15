@extends('perpus.master')
@section('judul')
Edit perpus 
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('perpus.update', $perpu->id) }}"
method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="mb-3">
<label class="form-label fw-bold">Nama</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $perpu->nama) }}"
placeholder="Masukkan Nama penjaga">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
<label class="form-label fw-bold">Nama peminjam</label>
<input type="text" class="form-control
@error('nama_peminjam') is-invalid @enderror" name="nama_peminjam"
value="{{ old('nama_peminjam', $perpu->nama_peminjam) }}"
placeholder="Masukkan Nama Peminjam">
<!-- error message untuk title -->
@error('nama_peminjam')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Buku </label>
    <input type="text" class="form-control
    @error('buku') is-invalid @enderror" name="buku"
    value="{{ old('buku', $perpu->buku) }}"
    placeholder="Masukkan Buku Dipinjam">
    <!-- error message untuk title -->
    @error('buku')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Tgl Pinjam </label>
        <input type="date" class="form-control
        @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam"
        value="{{ date('Y-m-d', strtotime($perpu->tgl_pinjam)) }}">
        <!-- error message untuk title -->
        @error('tgl_pinjam')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tgl Kembali </label>
            <input type="date" class="form-control
            @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali"
            value="{{ date('Y-m-d', strtotime($perpu->tgl_kembali)) }}">
            <!-- error message untuk title -->
            @error('tgl_kembali')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            </div>






            <div class="mb-3">
    <button type="submit" class="btn btn-primary">UPDATE</button>

    <a href="{{ route('perpus.index') }}" class="btn btn-warning">KEMBALI</a>
</div>

@endsection
