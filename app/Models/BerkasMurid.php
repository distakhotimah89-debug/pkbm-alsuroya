<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasMurid extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_murid_id',
        'kartu_keluarga',
        'akte_kelahiran',
        'pas_foto',
        'ijazah_terakhir',
        'ktp',
        'status_berkas',
        'catatan',
    ];

    public function dataMurid()
    {
        return $this->belongsTo(DataMurid::class, 'data_murid_id');
    }
}

