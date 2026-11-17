<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga')->default('PKBM Al Suroya');
            $table->string('npsn', 20)->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi');
            $table->text('misi');
            $table->text('alamat');
            $table->string('no_telp', 25);
            $table->string('email');
            $table->text('link_maps')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner_hero')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_lembagas');
    }
};

