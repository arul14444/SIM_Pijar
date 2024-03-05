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
            $table->id();
            $table->string('nama_Dokumen',255);
            $table->string('deskripsi_Dokumen',255);
            $table->string('kode_Dokumen',255);
            $table->string('nama_foto_dokumen');
            $table->string('path_foto_dokumen');
            $table->boolean('flag_aktif');
            $table->timestamps();
            $table->string('uuid',20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
