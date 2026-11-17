<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berkas_murids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_murid_id')->unique()->constrained('data_murids')->onDelete('cascade');
            $table->string('kartu_keluarga');
            $table->string('akte_kelahiran');
            $table->string('pas_foto');
            $table->string('ijazah_terakhir')->nullable();
            $table->string('ktp')->nullable();
            $table->enum('status_berkas', ['Menunggu Verifikasi', 'Valid', 'Tidak Valid'])->default('Menunggu Verifikasi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas_murids');
    }
};

