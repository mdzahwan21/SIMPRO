<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khs extends Model
{
    use HasFactory;
    protected $fillable = [
        'smt_aktif',
        'sks',
        'sks_kum',
        'ip',
        'ipk',
        'file',
        'nim',
        'tgl_persetujuan',
    ];

    public $timestamps = false;

    // foreign key nim
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
