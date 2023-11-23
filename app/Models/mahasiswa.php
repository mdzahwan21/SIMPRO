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

    public function users()
    {
        return $this->belongsTo(users::class, 'nim', 'id');
    }

    public function doswen_wali()
    {
        return $this->belongsTo(dosen_wali::class, 'nip_doswal', 'nip');
    }
}