<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        //Relación Posts belongs to Users
        return $this -> belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentario()
    {
        //Relación Posts has many Comentarios
        return $this -> hasMany(Comentario::class);
    }

    public function like()
    {
        //Relación Posts has many Likes
        return $this ->hasMany(Like::class);
    }

    //Método para validar si un usuario ya dio like
    public function checkLike(User $user)
    {
        //Devuelve la validación si en la tabla likes ya el usuario dio like
        return $this -> like -> contains('user_id', $user -> id);

    }
}
