@extends('siswa.master')
@section('judul')
Edit siswa 
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('siswa.update', $siswa->id) }}"
method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="mb-3">
<label class="form-label fw-bold">Nama</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $siswa->nama) }}"
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
<input type="text" class="form-control
@error('nisn') is-invalid @enderror" name="nisn"
value="{{ old('nisn', $siswa->nisn) }}"
placeholder="Masukkan Nisn Siswa">
<!-- error message untuk title -->
@error('nisn')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="form-group mb-3">
    <label class="form-label fw-bold">Jenis Kelamin</label>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" @if(old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki') checked @endif>
            <label class="form-check-label" for="laki-laki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" @if(old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan') checked @endif>
            <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
    </div>
    @error('jenis_kelamin')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label fw-bold">Agama</label>
    <select class="form-select @error('agama') is-invalid @enderror" name="agama">
        <option value="">Pilih Agama</option>
        <option value="islam" {{ old('agama', $siswa->agama) == 'islam' ? 'selected' : '' }}>islam</option>
        <option value="kristen" {{ old('agama', $siswa->agama) == 'kristen ' ? 'selected' : '' }}> kristen</option>
        <option value="budha" {{ old('agama', $siswa->agama) == 'budha' ? 'selected' : '' }}>budha</option>
        <option value="hindu" {{ old('agama', $siswa->agama) == 'hindu' ? 'selected' : '' }}>hindu</option>
    </select>
    <!-- error message untuk mapel -->
    @error('agama')
    <div class="alert alert-danger mt-2">
     {{ $message }}
    </div>
    @enderror
</div>






<div class="mb-3">
    <button type="submit" class="btn btn-primary">UPDATE</button>

    <a href="{{ route('siswa.index') }}" class="btn btn-warning">KEMBALI</a>
</div>

@endsection
