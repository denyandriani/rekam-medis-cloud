@extends('layouts.app')

@section('content')
<h3>Tambah Data Pasien</h3>

<form action="{{ route('pasien.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Usia</label>
        <input type="number" name="usia" value="{{ old('usia') }}" class="form-control @error('usia') is-invalid @enderror">
        @error('usia') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Diagnosis</label>
        <input type="text" name="diagnosis" value="{{ old('diagnosis') }}" class="form-control @error('diagnosis') is-invalid @enderror">
        @error('diagnosis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Periksa</label>
        <input type="date" name="tanggal_periksa" value="{{ old('tanggal_periksa') }}" class="form-control @error('tanggal_periksa') is-invalid @enderror">
        @error('tanggal_periksa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Dokter Penanggung Jawab</label>
        <input type="text" name="dokter_penanggung_jawab" value="{{ old('dokter_penanggung_jawab') }}" class="form-control @error('dokter_penanggung_jawab') is-invalid @enderror">
        @error('dokter_penanggung_jawab') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection