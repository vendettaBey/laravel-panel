<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'moduls';

    protected $fillable = [
        'modul_name',
        'modul_aciklama',
        'modul_resim',
        'modul_fiyat',
    ];


}