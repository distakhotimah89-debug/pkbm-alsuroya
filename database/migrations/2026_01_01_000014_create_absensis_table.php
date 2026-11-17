<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade');
            $table->foreignId('data_murid_id')->constrained('data_murids')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Alpa'])->default('Hadir');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->unique(['jadwal_id', 'data_murid_id', 'tanggal'], 'uk_absensi_siswa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};

