@extends('mapel.master')
@section('judul')
Tambah mapel
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('mapel.store') }}" method="POST"
enctype="multipart/form-data">
@csrf

<form action="{{route('mapel.store')}}" method="post">
    <div class="mb-3">
        <label class="form-label fw-bold">Kode Buku</label>
        <input type="text" class="form-control
        @error('kode_buku') is-invalid @enderror" name="kode_buku"
        value="{{ old('kode_buku') }}"
        placeholder="Masukkan kode_buku">
        <!-- error message untuk NAMA -->
        @error('kode_buku')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Mapel</label>
            <input type="text" class="form-control
            @error('mapel') is-invalid @enderror" name="mapel"
            value="{{ old('mapel') }}"
            placeholder="Masukkan mapel">
            <!-- error message untuk title -->
            @error('mapel')
            <div class="alert alert-danger mt-2">
            {{ $message }}
            </div>
            @enderror
            </div>
               
            <div class="mb-3">
        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
        
        <a href="{{ route('mapel.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
        