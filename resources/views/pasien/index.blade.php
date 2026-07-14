@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pasien</h3>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary">+ Tambah Pasien</a>
</div>

<table class="table table-bordered bg-white">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Diagnosis</th>
            <th>Tanggal Periksa</th>
            <th>Dokter</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pasiens as $i => $pasien)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->usia }}</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
            <td>{{ $pasien->diagnosis }}</td>
            <td>{{ $pasien->tanggal_periksa }}</td>
            <td>{{ $pasien->dokter_penanggung_jawab }}</td>
            <td>
                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data pasien.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection