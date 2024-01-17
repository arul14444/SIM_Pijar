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
        Schema::create('anak', function(Blueprint $table){
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->date('tanggal_lahir');
            $table->integer('nomorTelpon')->length(15);
            $table->string('alamat');
            $table->string('penyakit_penyerta');
            $table->boolean('kepemilikan_bpjs');
            $table->bigInteger('gangguan_id');
            $table->bigInteger('kepemilikan_abd_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
