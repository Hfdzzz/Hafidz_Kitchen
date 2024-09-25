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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_makanan');
            $table->string('nama_makanan');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();



            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('id_makanan')
                  ->references('id')
                  ->on('daftar_makanan');
                  
        });

        


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
