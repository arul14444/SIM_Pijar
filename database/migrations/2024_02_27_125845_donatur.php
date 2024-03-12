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
        Schema::create('donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->bigInteger('nomor_telepon')->unique()->unsigned()->length(14);
            $table->string('alamat',255);
            $table->boolean('flag_aktif');
            $table->timestamps();
            $table->string('uuid',20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donatur');
        
    }
};