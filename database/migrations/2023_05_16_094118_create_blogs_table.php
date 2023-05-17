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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('slug');
            $table->longText('icerik');
            $table->string('kategori');
            $table->string('tag');
            $table->string('image');
            $table->string('seoBaslik');
            $table->string('seoImage');
            $table->longText('seoAciklama');
            $table->string('sira');
            $table->string('goruntulenme');
            $table->string('etiket');
            $table->string('durum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};