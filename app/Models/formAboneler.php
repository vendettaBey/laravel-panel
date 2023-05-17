<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formAboneler extends Model
{
    use HasFactory;

    protected $table = 'formAboneler';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company'
    ];

}