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
        Schema::create('skripsi', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->integer('smt_aktif');
            $table->integer('smt_lulus');
            $table->string('nilai');
            $table->string('file');
            $table->date('tgl_lulus');
            $table->date('tgl_persetujuan')->nullable();
            
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsi');
    }
};
