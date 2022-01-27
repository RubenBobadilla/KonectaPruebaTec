<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Relaciones entre entidades

    protected  $table = 'categorias';

    // Relacion One To Many
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
