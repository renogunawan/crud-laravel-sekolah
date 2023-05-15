@extends('guru.master')
@section('judul')
Edit Guru - 
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('guru.update', $guru->id) }}"
method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="mb-3">
<label class="form-label fw-bold">Nama</label>
<input type="text" class="form-control
@error('nama') is-invalid @enderror" name="nama"
value="{{ old('nama', $guru->nama) }}"
placeholder="Masukkan Nama Guru">
<!-- error message untuk title -->
@error('nama')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="form-group mb-3">
    <label class="form-label fw-bold">Jenis Kelamin</label>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" @if(old('jenis_kelamin', $guru->jenis_kelamin) == 'laki-laki') checked @endif>
            <label class="form-check-label" for="laki-laki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" @if(old('jenis_kelamin', $guru->jenis_kelamin) == 'perempuan') checked @endif>
            <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
    </div>
    @error('jenis_kelamin')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>




<div class="mb-3">
    <label class="form-label fw-bold">Foto</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
    <!-- error message untuk Gambar -->
    @error('image')
    <div class="alert alert-danger mt-2">
        {{ $message }}
    </div>
    @enderror
    @if ($guru->image)
        <div class="mt-2">
            <img src="{{ asset('storage/guru/' . $guru->image) }}" alt="{{ $guru->image }}" style="max-height: 100px;"/>
        </div>
    @endif
</div>

<div class="mb-3">
    <label class="form-label fw-bold">Mapel</label>
    <select class="form-select @error('mapel') is-invalid @enderror" name="mapel" readonly>
        @foreach($mapel as $mapel)
            <option value="{{ $mapel->mapel }}" {{ ($guru->mapel == $mapel->mapel) ? 'selected' : '' }}>
                {{ $mapel->mapel }}
            </option>
        @endforeach
    </select>

    @error('mapel')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>


{{-- <div class="mb-3">
<label class="form-label fw-bold">Mapel
</label>
<input type="text" class="form-control
@error('mapel') is-invalid @enderror" name="mapel"
value="{{ old('mapel', $guru->mapel) }}"
placeholder="Masukkan mapel">
<!-- error message untuk stok -->
@error('mapel')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div> --}}


<div class="mb-3">
    <button type="submit" class="btn btn-primary">UPDATE</button>

    <a href="{{ route('guru.index') }}" class="btn btn-warning">KEMBALI</a>
</div>

@endsection
