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
        Schema::create('hasil_terapi', function(Blueprint $table){
            $table->id();
            $table->bigInteger('anak_id');
            $table->date('tanggal_terapi');
            $table->string('hasil_terapi');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_terapi');
    }
};
