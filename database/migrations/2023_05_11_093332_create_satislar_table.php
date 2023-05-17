<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('satislar', function (Blueprint $table) {
            $table->id();
            $table->string('musteri_adi');
            $table->string('musteri_email');
            $table->string('musteri_sirket');
            $table->string('musteri_telefon');
            $table->string('fiyat');
            $table->string('tarih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satislar');
    }
};