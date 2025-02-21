<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasKamarKostTable extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas_kamar_kost', function (Blueprint $table) {
            $table->id();
            $table->string('kost_id'); // Pastikan tipe data sama dengan id di kosts
            $table->foreign('kost_id')->references('id_kost')->on('kosts')->onDelete('cascade'); // Pastikan referensi ke kolom yang benar
            $table->string('fasilitas_kamar'); // Kolom untuk fasilitas kamar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kamar_kost');
    }
}
