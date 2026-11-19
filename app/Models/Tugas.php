<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'nama_siswa',
        'mata_pelajaran',
        'judul_tugas',
        'link_tugas',
        'status_nilai',
    ];
}
