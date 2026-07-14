<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'usia',
        'jenis_kelamin',
        'diagnosis',
        'tanggal_periksa',
        'dokter_penanggung_jawab',
    ];
}