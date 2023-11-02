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
    ];

    public $timestamps = false;
}
