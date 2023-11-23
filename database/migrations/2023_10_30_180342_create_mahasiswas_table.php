<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->integer('angkatan');
            $table->integer('smt_aktif');
            $table->string('nama');
            $table->string('status');
            $table->string('jalur_masuk');
            $table->string('no_telp');
            $table->string('provinsi')->nullable();
            $table->string('kota_kab')->nullable();
            $table->string('alamat_detail')->nullable();
            $table->string('nip_doswal');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('nip_doswal')->references('nip_doswal')->on('dosen_wali');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
