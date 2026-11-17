<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLembaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lembaga',
        'npsn',
        'sejarah',
        'visi',
        'misi',
        'alamat',
        'no_telp',
        'email',
        'link_maps',
        'logo',
        'banner_hero',
    ];
}

