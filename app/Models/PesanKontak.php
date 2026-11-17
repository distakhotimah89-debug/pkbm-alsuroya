<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengirim',
        'email',
        'no_telp',
        'subjek',
        'pesan',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}

