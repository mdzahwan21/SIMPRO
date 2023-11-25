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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->integer('smt_aktif');
            $table->integer('sks');
            $table->integer('sks_kum');
            $table->float('ip');
            $table->float('ipk');
            $table->string('file');
<<<<<<< HEAD
=======
            $table->string('nim');
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
        Schema::dropIfExists('khs');
    }
};
