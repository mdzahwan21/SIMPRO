<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'foto',
    ];
    
    public function users()
    {
        return $this->belongsTo(users::class, 'nip', 'id');
    }
}
