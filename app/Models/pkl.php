<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pkl extends Model
{
    use HasFactory;
    protected $fillable = [
        'smt_aktif',
        'nilai',
        'file',
        'nim',        
        'tgl_persetujuan',
    ];

    public $timestamps = false;

    // to make connected table pkl in database, default name table in laravel is plural form pkl -> pkls
    protected $table = 'pkl';

    // foreign key nim
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
