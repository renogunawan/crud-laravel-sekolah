@extends('perpus.master')
@section('judul')
Tambah Perpus
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('perpus.store') }}" method="POST"
enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nama Penjaga</label>
    <input type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama"
    value="{{ old('nama') }}"
    placeholder="Masukkan Nama penjaga">
    <!-- error message untuk title -->
    @error('nama')
    <div class="alert alert-danger mt-2">
    {{ $message }}
    </div>
    @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Nama Peminjam</label>
        <input type="text" class="form-control
        @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam"
        value="{{ old('nama_peminjam') }}"
        placeholder="Masukkan nama peminjam">
        <!-- error message untuk title -->
        @error('nama_peminjam')
        <div class="alert alert-danger mt-2">
    {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Buku</label>
            <input type="text" class="form-control
            @error('buku') is-invalid @enderror" name="buku"
            value="{{ old('buku') }}"
            placeholder="Masukkan Nama Buku">
            <!-- error message untuk title -->
            @error('buku')
            <div class="alert alert-danger mt-2">
            {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal pinjam</label>
                <input type="date" name="tgl_pinjam" id="" class="form-control"
                    value="{{ date('d-m-Y') }}">
                <!-- error message untuk title -->
                @error('tgl_pinjam')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal kembali</label>
                <input type="date" name="tgl_kembali" id="" class="form-control"
                    value="{{ date('d-m-Y') }}">
                <!-- error message untuk title -->
                @error('tgl_kembali')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
        
        <a href="{{ route('perpus.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
        </form>
        </div>
        </div>
        </div>
        </div>
        @endsection
        @section('skrip')
        <script
        src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
        CKEDITOR.replace('content');
        </script>
        @endsection
