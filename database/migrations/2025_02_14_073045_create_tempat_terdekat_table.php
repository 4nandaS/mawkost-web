<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatTerdekatTable extends Migration
{
    public function up(): void
    {
        Schema::create('tempat_terdekat', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('nama_tempat'); // Nama tempat terdekat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tempat_terdekat'); // Menghapus tabel jika migrasi dibatalkan
    }
}
