<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_murid_id')->constrained('data_murids')->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajarans')->onDelete('cascade');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans')->onDelete('cascade');
            $table->enum('jenis_nilai', ['Tugas/Modul', 'UTS', 'UAS', 'Ujian Modul'])->default('Tugas/Modul');
            $table->decimal('nilai_angka', 5, 2)->default(0.00);
            $table->string('nilai_huruf', 2)->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->unique(['data_murid_id', 'mata_pelajaran_id', 'tahun_ajaran_id', 'jenis_nilai'], 'uk_penilaian_siswa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};

