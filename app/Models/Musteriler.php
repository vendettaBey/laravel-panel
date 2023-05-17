<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteriler extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function roles()
    {
        return $this->hasOne(Role::class, 'model_id', 'id');
    }

}