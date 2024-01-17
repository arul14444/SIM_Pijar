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
        Schema::create('kepemilikan_abd', function(Blueprint $table){
            $table->id();
            $table->bigInteger('jenis_abd_id_kiri');
            $table->bigInteger('jenis_abd_id_kanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('kepemilikan_abd');
    }
};
