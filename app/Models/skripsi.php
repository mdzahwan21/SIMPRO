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
        'nilai',
        'tgl_lulus',
        'file',
        'nim',
    ];

    public $timestamps = false;

    // to make connected table pkl in database, default name table in laravel is plural form pkl -> pkls
    protected $table = 'skripsi';

    // foreign key nim
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
