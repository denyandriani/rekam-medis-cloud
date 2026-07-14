<?php

namespace Tests\Feature;

use App\Models\Pasien;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasienTest extends TestCase
{
    use RefreshDatabase;

    /** Test 1: halaman index pasien bisa diakses dan menampilkan data */
    public function test_halaman_index_pasien_bisa_diakses(): void
    {
        $response = $this->get('/pasien');

        $response->assertStatus(200);
        $response->assertSee('Data Pasien');
    }

    /** Test 2: data pasien berhasil disimpan ke database */
    public function test_data_pasien_berhasil_disimpan(): void
    {
        $data = [
            'nama' => 'Deny Setiawan',
            'usia' => 21,
            'jenis_kelamin' => 'Laki-laki',
            'diagnosis' => 'Flu',
            'tanggal_periksa' => '2026-07-14',
            'dokter_penanggung_jawab' => 'dr. Zulfikar',
        ];

        $response = $this->post('/pasien', $data);

        $response->assertRedirect('/pasien');
        $this->assertDatabaseHas('pasiens', [
            'nama' => 'Deny Setiawan',
            'diagnosis' => 'Flu',
        ]);
    }

    /** Test 3: validasi gagal jika field wajib kosong */
    public function test_validasi_gagal_jika_nama_kosong(): void
    {
        $data = [
            'nama' => '',
            'usia' => 21,
            'jenis_kelamin' => 'Laki-laki',
            'diagnosis' => 'Flu',
            'tanggal_periksa' => '2026-07-14',
            'dokter_penanggung_jawab' => 'dr. Zulfikar',
        ];

        $response = $this->post('/pasien', $data);

        $response->assertSessionHasErrors('nama');
        $this->assertDatabaseCount('pasiens', 0);
    }

    /** Test 4 (bonus): data pasien berhasil dihapus */
    public function test_data_pasien_berhasil_dihapus(): void
    {
        $pasien = Pasien::create([
            'nama' => 'Test Hapus',
            'usia' => 30,
            'jenis_kelamin' => 'Perempuan',
            'diagnosis' => 'Demam',
            'tanggal_periksa' => '2026-07-14',
            'dokter_penanggung_jawab' => 'dr. Siti',
        ]);

        $response = $this->delete('/pasien/' . $pasien->id);

        $response->assertRedirect('/pasien');
        $this->assertDatabaseMissing('pasiens', ['id' => $pasien->id]);
    }
}