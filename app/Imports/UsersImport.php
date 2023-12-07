<?php

namespace App\Imports;

use App\Models\mahasiswa;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $mahasiswa = new mahasiswa([
            "nim" => $row['nim'],
            "nama" => $row['nama'],
            "angkatan" => $row['angkatan'],
            "status" => "aktif",
            "jalur_masuk" => $row['jalur_masuk'],
            "no_telp" => null,
            "provinsi" => $row['provinsi'],
            "kota_kab" => $row['kota_kab'],
            "alamat_detail" => $row['alamat_detail'],
            "nip_doswal" => $row['nip_doswal'],
            "foto" => "foto/" . $row['foto'] . ".jpg"
        ]);

        $mahasiswa->save();

        $users = new users([
            "id" => $row['nim'],
            "name" => $row['nama'],
            "email" => strtolower($row['nama']) . "@mahasiswa.com",
            "password" => bcrypt("12345"),
        ]);

        $users->save();

        // return $mahasiswa;
    }
}
