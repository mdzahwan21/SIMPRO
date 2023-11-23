<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'smt_aktif',
        'status',
        'jalur_masuk',
        'no_telp',
        'provinsi',
        'kota_kab',
        'alamat_detail',
        'nip_doswal',
        'foto',
        'id_user'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function dosenWali() {
        return $this->belongsTo(DosenWali::class, 'nip_doswal');
    }
}
