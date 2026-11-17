<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->onDelete('set null');
            $table->string('nip_nuptk', 30)->nullable();
            $table->string('nama_lengkap', 255);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('pendidikan_terakhir', 50)->nullable();
            $table->string('no_telp', 25);
            $table->text('alamat')->nullable();
            $table->enum('status_tutor', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};

