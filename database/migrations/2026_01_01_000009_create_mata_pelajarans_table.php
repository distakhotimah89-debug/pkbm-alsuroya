<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mapel', 25)->unique();
            $table->string('nama_mapel', 150);
            $table->enum('program_paket', ['Paket A', 'Paket B', 'Paket C', 'Semua']);
            $table->decimal('kkm', 5, 2)->default(70.00);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_pelajarans');
    }
};

