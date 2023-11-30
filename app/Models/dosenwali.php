<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosenwali extends Model
{
    use HasFactory;

    protected $table = 'dosenwalis';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_telepon',
        'foto',
    ];

    public function users()
    {
        return $this->belongsTo(users::class, 'nip', 'id');
    }
}

