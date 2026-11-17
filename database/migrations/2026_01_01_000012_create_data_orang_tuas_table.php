<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_murid_id')->unique()->constrained('data_murids')->onDelete('cascade');
            $table->string('nama_ayah', 150)->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('pendidikan_ayah', 50)->nullable();
            $table->string('pekerjaan_ayah', 100)->nullable();
            $table->string('no_telp_ayah', 25)->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('pendidikan_ibu', 50)->nullable();
            $table->string('pekerjaan_ibu', 100)->nullable();
            $table->string('no_telp_ibu', 25)->nullable();
            $table->text('alamat_ibu')->nullable();
            $table->string('nama_wali', 150)->nullable();
            $table->string('hubungan_wali', 50)->nullable();
            $table->string('pekerjaan_wali', 100)->nullable();
            $table->string('no_telp_wali', 25)->nullable();
            $table->text('alamat_wali')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_orang_tuas');
    }
};

