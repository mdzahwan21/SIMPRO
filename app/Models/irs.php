<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    use HasFactory;
    protected $fillable = [
        'smt_aktif',
        'jumlah_sks',
        'file',
        'nim',
    ];

    public $timestamps = false;
}
