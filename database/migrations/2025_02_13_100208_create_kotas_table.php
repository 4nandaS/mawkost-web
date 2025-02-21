<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotasTable extends Migration
{
    public function up(): void
    {
        Schema::create('kotas', function (Blueprint $table) {
            $table->id();
            $table->string('kota');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kotas');
    }
}
