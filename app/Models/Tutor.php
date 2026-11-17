<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip_nuptk',
        'nama_lengkap',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'no_telp',
        'alamat',
        'status_tutor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelasWali()
    {
        return $this->hasMany(Kelas::class, 'tutor_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}

