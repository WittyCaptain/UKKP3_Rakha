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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->string('no_meja');
            $table->string('email');
            $table->string('name');
            $table->string('no_tp');
            $table->foreignId('kategori')->constrained('kategoris', 'id_kategori')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
