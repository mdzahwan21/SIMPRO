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
<<<<<<< HEAD
            $table->integer('smt_aktif')->nullable();
            $table->integer('nilai')->nullable();
            $table->integer('smt_lulus')->nullable();
            $table->date('tgl_lulus')->nullable();
            $table->string('file')->nullable();
=======
            $table->integer('smt_aktif');
>>>>>>> 5b8ad135e49dcacc57292049f529d9d59e328434
            
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
