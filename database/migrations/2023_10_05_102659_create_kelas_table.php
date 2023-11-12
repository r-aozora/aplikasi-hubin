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
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_program');
            $table->unsignedBigInteger('id_angkatan');
            $table->foreign('id_guru')
                ->references('id')
                ->on('guru')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_program')
                ->references('id')
                ->on('program_keahlian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_angkatan')
                ->references('id')
                ->on('angkatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
