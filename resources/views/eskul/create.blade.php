@extends('eskul.master')
@section('judul')
Tambah eskul Siswa
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('eskul.store') }}" method="POST"
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
        <label class="form-label fw-bold">kelas</label>
        <input type="text" class="form-control
        @error('kelas') is-invalid @enderror" name="kelas"
        value="{{ old('kelas') }}"
        placeholder="Masukkan kelas Siswa">
        <!-- error message untuk title -->
        @error('kelas')
        <div class="alert alert-danger mt-2">
        {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">No Hp</label>
            <input type="text" class="form-control
            @error('no_hp') is-invalid @enderror" name="no_hp"
            value="{{ old('no_hp') }}"
            placeholder="Masukkan no hp siswa">
            <!-- error message untuk NAMA -->
            @error('no_hp')
            <div class="alert alert-danger mt-2">
           {{$message}}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ekstrakulikuler</label>
                <div class="mb-3">
                <select name="ekstrakulikuler" class="form-select">
                    <option value="" disabled selected>Pilih Eskul</option>
                    <option value="basket">basket</option>
                    <option value="futsal">futsal</option>
                    <option value="voli">voli</option>
                </select>
                <!-- error message untuk stok -->
                @error('ekstrakulikuler')
                <div class="alert alert-danger mt-2">
                {{ $message }}
                </div>
                @enderror
                </div>

            </div>
            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            
            <a href="{{ route('eskul.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
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
    