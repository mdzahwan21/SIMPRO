<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen_wali extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nip',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'nip', 'id');
    }
}

