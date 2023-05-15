@extends('guru.master')
@section('judul')
Tambah Guru
@endsection
@section('konten')
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">
<form action="{{ route('guru.store') }}" method="POST"
enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label class="form-label fw-bold">Nama Guru</label>
    <input type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama"
    value="{{ old('nama') }}"
    placeholder="Masukkan Nama Guru">
    <!-- error message untuk title -->
    @error('nama')
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
            <label class="form-label fw-bold">Foto</label>
            <input type="file" class="form-control
            @error('image') is-invalid @enderror" name="image">
            <!-- error message untuk image -->
            @error('image')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mapel</label><br>
                <select name="mapels_id" id="" class="form-select">
                    <option disabled selected>pilih Mapel</option>
                    @foreach ($mapel as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                    @endforeach
                </select>
                <!-- error message untuk title -->
                @error('mapels_id')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-md btn-warning">KEMBALI</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('skrip')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content');
</script>
@endsection