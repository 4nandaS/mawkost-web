<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasBersamaTable extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas_bersama', function (Blueprint $table) {
            $table->id();
            $table->string('fasilitas_bersama');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas_bersama');
    }
}
