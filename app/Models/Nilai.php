<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_murid_id',
        'mata_pelajaran_id',
        'tahun_ajaran_id',
        'jenis_nilai',
        'nilai_angka',
        'nilai_huruf',
        'catatan',
    ];

    protected $casts = [
        'nilai_angka' => 'decimal:2',
    ];

    public function dataMurid()
    {
        return $this->belongsTo(DataMurid::class, 'data_murid_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}

