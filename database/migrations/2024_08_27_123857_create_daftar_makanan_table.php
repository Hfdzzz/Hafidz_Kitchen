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
        Schema::create('daftar_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('deskripsi_singkat')->default('0');
            $table->string('deskripsi')->default('0');
            $table->string('resep')->default('0');
            $table->string('file_path')->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_makanan');
    }
};
