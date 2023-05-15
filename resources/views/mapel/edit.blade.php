@extends('mapel.master')
@section('judul')
Edit Mapel 
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('mapel.update', $mapel->id) }}"
method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')


<div class="mb-3">
<label class="form-label fw-bold">Kode Buku</label>
<input type="number" class="form-control
@error('kode_buku') is-invalid @enderror" name="kode_buku"
value="{{ old('kode_buku', $mapel->kode_buku) }}"
placeholder="Masukkan Kode Buku">
<!-- error message untuk title -->
@error('kode_buku')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>

<div class="mb-3">
<label class="form-label fw-bold">Mapel </label>
<input type="text" class="form-control
@error('mapel') is-invalid @enderror" name="mapel"
value="{{ old('mapel', $mapel->mapel) }}"
placeholder="Masukkan mapel ">
<!-- error message untuk title -->
@error('mapel')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>



    





<div class="mb-3">
    <button type="submit" class="btn btn-primary">UPDATE</button>

    <a href="{{ route('mapel.index') }}" class="btn btn-warning">KEMBALI</a>
</div>

@endsection
