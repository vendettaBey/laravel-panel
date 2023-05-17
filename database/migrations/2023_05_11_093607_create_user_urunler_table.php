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
        Schema::create('userUrunlerim', function (Blueprint $table) {
            $table->id();
            $table->string('urun');
            $table->string('user');
            $table->string('tarih');
            $table->string('sonTarih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_urunlerim');
    }
};