<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'is_aktif',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
    ];

    public function dataMurids()
    {
        return $this->hasMany(DataMurid::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}

