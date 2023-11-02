<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skripsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'smt_aktif',
        'smt_lulus',
        'status',
        'nilai',
        'tgl_lulus',
        'file',
        'nim',
    ];

    public $timestamps = false;
    protected $table = 'skripsi';
}
