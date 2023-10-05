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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis');
            $table->string('nisn');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('telepon');
            $table->string('telepon_ortu');
            $table->string('email');
            $table->text('alamat');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
