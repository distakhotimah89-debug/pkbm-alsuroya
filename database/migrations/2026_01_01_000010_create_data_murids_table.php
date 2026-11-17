<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_murids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->onDelete('set null');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans')->onDelete('restrict');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('set null');
            $table->string('no_pendaftaran', 50)->unique();
            $table->enum('program_paket', ['Paket A', 'Paket B', 'Paket C']);
            $table->string('nik', 16);
            $table->string('no_kk', 16);
            $table->string('nisn', 10)->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'])->default('Islam');
            $table->string('no_telp', 25);
            $table->string('pekerjaan', 100)->nullable();
            $table->text('alamat');
            $table->string('hobi', 100)->nullable();
            $table->string('cita_cita', 100)->nullable();
            $table->unsignedInteger('tinggi_badan')->nullable();
            $table->unsignedInteger('berat_badan')->nullable();
            $table->string('jarak_waktu_tempuh', 50)->nullable();
            $table->enum('pendidikan_terakhir', ['Belum/Tidak Sekolah', 'SD/MI', 'SMP/MTs', 'SMA/SMK']);
            $table->string('asal_sekolah', 150)->nullable();
            $table->enum('status_pendaftaran', ['Menunggu Verifikasi', 'Diverifikasi', 'Diterima', 'Ditolak'])->default('Menunggu Verifikasi');
            $table->enum('status_siswa', ['Calon', 'Aktif', 'Lulus', 'Keluar'])->default('Calon');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_murids');
    }
};

