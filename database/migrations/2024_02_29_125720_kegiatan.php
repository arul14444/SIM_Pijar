<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan',255);
            $table->string('deskripsi_kegiatan',255);
            $table->string('lokasi',255);
            $table->string('sumber_dana',255);
            $table->string('nama_foto_kegiatan');
            $table->string('path_foto_kegiatan');
            $table->boolean('flag_aktif');
            $table->timestamps();
            $table->string('uuid',20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
        
    }
};
