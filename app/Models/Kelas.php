<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'tahun_ajaran_id',
        'tutor_id',
        'nama_kelas',
        'program_paket',
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function dataMurids()
    {
        return $this->hasMany(DataMurid::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}

