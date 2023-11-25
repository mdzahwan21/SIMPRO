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
    ];

    public $timestamps = false;
    protected $table = 'pkl';
}
