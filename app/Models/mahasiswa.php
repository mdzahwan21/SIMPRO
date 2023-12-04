<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'angkatan',
        'smt_aktif',
        'status',
        'provinsi',
        'kota_kab',
        'alamat_detail',
        'nip_doswal',
        'foto',
    ];

    protected $table = 'mahasiswa';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class, 'nim', 'id');
    }

    public function doswen_wali()
    {
        return $this->belongsTo(dosen_wali::class, 'nip_doswal', 'nip');
    }

    public function irs()
    {
        return $this->hasMany(Irs::class, 'nim', 'nim');
    }

    public function pkl()
    {
        return $this->hasMany(PKL::class, 'nim', 'nim');
    }
}