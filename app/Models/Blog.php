<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public static function getBlogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return $blogs;
    }
}