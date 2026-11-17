<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_murid_id',
        'nama_ayah',
        'tgl_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'no_telp_ayah',
        'alamat_ayah',
        'nama_ibu',
        'tgl_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'no_telp_ibu',
        'alamat_ibu',
        'nama_wali',
        'hubungan_wali',
        'pekerjaan_wali',
        'no_telp_wali',
        'alamat_wali',
    ];

    protected $casts = [
        'tgl_lahir_ayah' => 'date',
        'tgl_lahir_ibu' => 'date',
    ];

    public function dataMurid()
    {
        return $this->belongsTo(DataMurid::class, 'data_murid_id');
    }
}

