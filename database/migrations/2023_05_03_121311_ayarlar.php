<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use App\Nodels\Ayarlar;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('ayarlar', function (Blueprint $table) {
            $table->id();
            $table->string('resimYok');
            $table->string('tema');
            $table->string('calismaSaati');
            $table->string('siteTel');
            $table->string('siteMail');
            $table->string('siteLogo');
            $table->string('siteFooterLogo');
            $table->string('siteAdres');
            $table->string('firmaAdres');
            $table->string('footerAciklama');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('btnUrl');
            $table->string('btnName');
            $table->string('preloader');
        });

        if (Schema::hasTable('ayarlar')) {
            DB::table('ayarlar')->insert([
                'resimYok' => '',
                'tema' => 1,
                "calismaSaati" => "09:00 - 18:00",
                "siteTel" => "08504804452",
                "siteMail" => "bilgi@e-very.com.tr",
                "siteLogo" => "img/anasayfa/every.png",
                "siteFooterLogo" => "img/anasayfa/every-beyaz.png",
                "siteAdres" => "https://e-very.com.tr/",
                "firmaAdres" => "Üniversite Mah. Civan Sk. No.1 Allure Tower Kat:2 Daire:33 Avcılar / İSTANBUL",
                "footerAciklama" => "",
                "instagram" => "",
                "facebook" => "",
                "twitter" => "",
                "btnUrl" => "",
                "btnName" => "",
                "preloader" => "1",
            ]);
        }



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayarlar');
    }
};