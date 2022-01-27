<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Relaciones entre entidades
    protected  $table = 'productos';

    // Relacion One To One
    public function categorias(){
        return $this->hasOne('App\Categoria');
    }
}
