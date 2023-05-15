@extends('siswa.master')
@section('judul')
Tambah Siswa
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('siswa.store') }}" method="POST"
enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nama siswa</label>
    <input type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama"
    value="{{ old('nama') }}"
    placeholder="Masukkan Nama Siswa">
    <!-- error message untuk title -->
    @error('nama')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Nisn</label>
        <input type="text" class="form-control" name="nisn"
        value="{{ old('nisn') }}"
        placeholder="Masukkan nisn siswa">
        <!-- error message untuk NAMA -->
        @error('nisn')
        <div class="alert alert-danger mt-2">
       {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Jenis Kelamin</label><br>
            <input type="radio" value="laki-laki" name="jenis_kelamin">laki-laki
            <input type="radio" value="perempuan" name="jenis_kelamin">perempuan
            <!-- error message untuk satuan -->
            @error('jenis_kelamin')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Agama</label>
                <div class="mb-3">
                <select name="agama" class="form-select">
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="islam">islam</option>
                    <option value="kristen">kristen</option>
                    <option value="budha">budha</option>
                    <option value="hindu">hindu</option>
                </select>
                <!-- error message untuk stok -->
                @error('agama')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            
            <a href="{{ route('siswa.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
    