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
        Schema::create('anak', function (Blueprint $table) {
            $table->id();    
            $table->string('nama_lengkap', 255);
            $table->string('nama_panggilan', 255);
            $table->date('tgl_lahir');
            $table->bigInteger('nomor_telepon')->unique()->unsigned()->length(14);
            $table->string('penyakit_penyerta',255);
            $table->bigInteger('id_user');
            $table->bigInteger('id_abd');
            $table->bigInteger('id_gangguan');
            $table->enum('bpjs', ['ya', 'tidak']);
            $table->boolean('flag_aktif');
            $table->timestamps();
            $table->string('uuid',20);
        });
    }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak');
    }
};
