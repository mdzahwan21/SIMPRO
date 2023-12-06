<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosenwali extends Model
{
    use HasFactory;

    protected $table = 'dosen_wali';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_telepon',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'nip', 'id');
    }
}

