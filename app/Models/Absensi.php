<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'data_murid_id',
        'tanggal',
        'status_kehadiran',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function dataMurid()
    {
        return $this->belongsTo(DataMurid::class, 'data_murid_id');
    }
}

