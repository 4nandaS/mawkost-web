<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostsTable extends Migration
{
    public function up(): void
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->string('id_kost')->primary(); // Kolom primary key
            $table->string('nama_kost'); // Nama kost
            $table->string('alamat_kost'); // Alamat kost
            $table->string('kota'); // Kota
            $table->json('tempat_terdekat'); // Tempat terdekat
            $table->integer('harga_kost'); // Harga kost
            $table->json('fasilitas_kamar'); // Fasilitas kamar dalam format JSON
            $table->json('fasilitas_bersama'); // Fasilitas bersama dalam format JSON
            $table->string('gender'); // Gender (Laki-laki/Perempuan)
            $table->string('no_hp'); // Nomor HP
            $table->json('foto'); // Menyimpan nama file foto dalam format JSON
            $table->text('informasi_tambahan'); // Informasi tambahan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kosts'); // Menghapus tabel jika migrasi dibatalkan
    }
}
