<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'post_id'  //No es necesario dejarlo en el modelo por la relación creada
    ];

    public function post()
    {
        //Relación Likes has many Posts
        return $this ->hasMany(Post::class);
    }
}
