<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->get();
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer|min:0|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'diagnosis' => 'required|string|max:255',
            'tanggal_periksa' => 'required|date',
            'dokter_penanggung_jawab' => 'required|string|max:255',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer|min:0|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'diagnosis' => 'required|string|max:255',
            'tanggal_periksa' => 'required|date',
            'dokter_penanggung_jawab' => 'required|string|max:255',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}