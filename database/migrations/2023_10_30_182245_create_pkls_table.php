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
        Schema::create('pkl', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->integer('smt_aktif');
            $table->string('nilai')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('pkl');
    }
};
