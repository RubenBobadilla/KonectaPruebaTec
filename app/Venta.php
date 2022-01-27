<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    // Relaciones entre entidades
    protected  $table = 'ventas';

    // Relacion One To One 
    public function usuarios(){
        return $this->hasOne('App\User');
    }
}
