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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->unsignedBigInteger('id_angkatan');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_program');
            $table->unsignedBigInteger('id_periode')->nullable();
            $table->foreign('id_angkatan')->references('id')->on('angkatan');
            $table->foreign('id_guru')->references('id')->on('guru');
            $table->foreign('id_program')->references('id')->on('program_keahlian');
            $table->foreign('id_periode')->references('id')->on('periode_prakerin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
