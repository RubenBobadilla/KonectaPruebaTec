<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Venta;
use App\LineaVenta;
use App\Categoria;
use App\Producto;


class VentaController extends Controller
{   

    // Direcciona a la vista que solicita datos para la creacion de un producto
    public function crear()
    {
        $productos = Producto::all();       
        return view('venta.create', [
            'productos' => $productos
        ]);
    }


    // Guarda los datos que recibe del formulario de creación
    public function save(Request $request)
    {
        // Capturar datos
        $producto_id = $request->input('producto');
        $cantidad = $request->input('cantidad');
        
        $ciudad = $request->input('ciudad');
        $direccion = $request->input('direccion');        
        $Fecha = $request->input('fecha');

        $user = \Auth::user();
        $user_id = $user->id;

        // Consulta stock actual
        $produc = Producto::find($producto_id);
        $producStock = $produc->stock;
        $costeTot = $produc->precio*$cantidad; // mas la utilidad


        //  Validar la cantidad, No supere la existencia
        if($producStock >= $cantidad){
            
            // Asignar valores -> nuevo objeto Venta
            $venta = new Venta();
            $venta->usuario_id = $user_id;
            $venta->ciudad = $ciudad;
            $venta->direccion = $direccion;
            $venta->coste = $costeTot;
            $venta->fecha = $Fecha;

            // Guardar en la db
            $venta->save();

            // Asignar valores -> nuevo objeto Line-Venta
            $lineVenta = new LineaVenta();
            $lineVenta->venta_id = $venta->id;
            $lineVenta->producto_id = $producto_id;
            $lineVenta->cantidad = $cantidad;

            // Guardar en la db
            $lineVenta->save();

            // Actualizar la cantidad del Producto
            $stockActual = $producStock-$cantidad;
            $produc->stock = $stockActual;

            // Actualizar en la db
            $produc->update();

            return redirect()->route('home')->with([
                'message' => 'La venta se ha creado correctamente!!'
            ]);

        }else{

            return redirect()->route('home')->with([
                'message' => '¡¡Aviso Importante!! No tiene stock suficente para realizar esta venta!! | Stock Actual'.$producStock
            ]);

        }
        

    }   

   
}
