@extends('eskul.master')
@section('judul')
Edit Eskul
@endsection
@section('konten')
<br> <br>
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('eskul.update', $eskul->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama', $eskul->nama) }}" placeholder="Masukkan Nama Siswa">
                        <!-- error message untuk title -->
                        @error('nama')
                        <div class="alert alert-danger mt-2">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                            value="{{ old('kelas', $eskul->kelas) }}" placeholder="Masukkan kelas Siswa">
                        <!-- error message untuk title -->
                        @error('kelas')
                        <div class="alert alert-danger mt-2">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">No Hp</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                            value="{{ old('no_hp', $eskul->no_hp) }}" placeholder="Masukkan nohp Siswa">
                        <!-- error message untuk title -->
                        @error('no_hp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ekstrakulikuler</label>
                        <select class="form-select @error('ekstrakulikuler') is-invalid @enderror"
                            name="ekstrakulikuler">
                            <option value="">Pilih eskul</option>
                            <option value="basket"
                                {{ old('ekstrakulikuler', $eskul->ekstrakulikuler) == 'basket' ? 'selected' : '' }}>
                                basket</option>
                            <option value="futsal"
                                {{ old('ekstrakulikuler', $eskul->ekstrakulikuler) == 'futsal ' ? 'selected' : '' }}>
                                futsal</option>
                            <option value="voli"
                                {{ old('ekstrakulikuler', $eskul->ekstrakulikuler) == 'voli' ? 'selected' : '' }}>
                                voli</option>

                        </select>
                        <!-- error message untuk mapel -->
                        @error('ekstrakulikuler')
                        <div class="alert alert-danger mt-2">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('eskul.index') }}" class="btn btn-warning">Kembali</a>
</div>
</form>
</div>
</div>
</div>
</div>
   