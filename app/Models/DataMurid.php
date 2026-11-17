<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMurid extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tahun_ajaran_id',
        'kelas_id',
        'no_pendaftaran',
        'program_paket',
        'nik',
        'no_kk',
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_telp',
        'pekerjaan',
        'alamat',
        'hobi',
        'cita_cita',
        'tinggi_badan',
        'berat_badan',
        'jarak_waktu_tempuh',
        'pendidikan_terakhir',
        'asal_sekolah',
        'status_pendaftaran',
        'status_siswa',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function berkas()
    {
        return $this->hasOne(BerkasMurid::class, 'data_murid_id');
    }

    public function orangTua()
    {
        return $this->hasOne(DataOrangTua::class, 'data_murid_id');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'data_murid_id');
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'data_murid_id');
    }
}

