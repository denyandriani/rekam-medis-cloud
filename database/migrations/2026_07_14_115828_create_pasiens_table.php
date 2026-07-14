<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('usia');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('diagnosis');
            $table->date('tanggal_periksa');
            $table->string('dokter_penanggung_jawab');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};