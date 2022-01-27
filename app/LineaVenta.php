<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaVenta extends Model
{
    //Relaciones entre entidades
    protected  $table = 'lineas_ventas';

    // Relacion One To One 
    public function ventas(){
        return $this->hasOne('App\Venta');
    }

    // Relacion One To Many
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
    
}


