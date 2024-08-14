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
        Schema::create('arsip', function (Blueprint $table) {
            $table->id('id_arsip');
            $table->string('nama_arsip');
            $table->string('nomor_arsip');
            $table->enum('jenis_arsip', ['dokumen', 'gambar', 'surat']);
            $table->string('upload')->nullable();
            $table->date('tgl_arsip');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
