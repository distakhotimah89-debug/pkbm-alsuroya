<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans')->onDelete('cascade');
            $table->foreignId('tutor_id')->nullable()->constrained('tutors')->onDelete('set null');
            $table->string('nama_kelas', 100);
            $table->enum('program_paket', ['Paket A', 'Paket B', 'Paket C']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};

