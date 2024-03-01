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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang',255);
            $table->string('deskripsi_barang',255);
            $table->string('kode_barang',255);
            $table->string('status_barang',30);
            $table->string('nama_foto_barang');
            $table->string('path_foto_barang');
            $table->boolean('flag_aktif');
            $table->timestamps();
            $table->string('uuid',20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
