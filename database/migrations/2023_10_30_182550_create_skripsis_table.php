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
            $table->string('status');
            $table->integer('nilai')->nullable();
            $table->date('tgl_lulus')->nullable();
            $table->integer('smt_lulus')->nullable();
            $table->string('file')->nullable();
            $table->string('nim');
            
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
