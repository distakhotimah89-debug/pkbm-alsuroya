<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prestasi', 200);
            $table->string('peraih', 150);
            $table->enum('tingkat', ['Kecamatan', 'Kota', 'Provinsi', 'Nasional'])->default('Kota');
            $table->year('tahun');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};

