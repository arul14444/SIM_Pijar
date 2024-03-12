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
        Schema::create('user', function (Blueprint $table) {
            $table->id();    
            $table->string('nama', 255);
            $table->bigInteger('nomor_telepon')->unique()->unsigned()->length(14);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat', 255);
            $table->enum('role', ['admin', 'anggota']);
            $table->boolean('flag_aktif');
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
};
