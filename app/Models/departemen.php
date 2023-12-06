<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';

    protected $table = 'departemen';

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
