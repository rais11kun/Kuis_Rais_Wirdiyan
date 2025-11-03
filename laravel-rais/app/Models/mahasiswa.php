<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'mahasiswa_id';
    protected $fillable   = [
        'nama_mahasiswa',
        'nim',
        'email',
        'jurusan',
        'alamat',
    ];
}
