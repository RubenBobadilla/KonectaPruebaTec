<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Categoria;
use App\Producto;


class ProductoController extends Controller
{

    // Buscar producto por nombre o referencia
    public function index($search = null)
    {

        if (!empty($search)) {
            $productos = Producto::where('nombre', 'LIKE', '%' . $search . '%')
                ->orWhere('referencia', 'LIKE', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate(15);
        } else {
            $productos = Producto::orderBy('id', 'desc')->paginate(5);
        }

        return view('producto.buscador', [
            'productos' => $productos
        ]);
    }

    // Direcciona a la vista que solicita datos para la creacion de un producto
    public function crear()
    {
        $categorias = Categoria::all();
        /*echo $categorias;    
        die();*/
        return view('producto.create', [
            'categorias' => $categorias
        ]);
    }


    // Guarda los datos que recibe del formulario de creación
    public function save(Request $request)
    {
        // Capturar datos
        $categoria_id = $request->input('categoria');
        $nombre = $request->input('nombre');
        $referencia = $request->input('referencia');
        $precio = $request->input('precio');
        $peso = $request->input('peso');
        $stock = $request->input('stock');
        $Fecha = $request->input('fecha');

        //  Asignar valores -> nuevo objeto
        //$user = \Auth::user();  // traemos el id del modelo user
        $producto = new Producto();   // instanciamos el objeto que usamos arriba de app
        $producto->categoria_id = $categoria_id;
        $producto->nombre = $nombre;
        $producto->referencia = $referencia;
        $producto->precio = $precio;
        $producto->peso = $peso;
        $producto->stock = $stock;
        $producto->Fecha = $Fecha;

        // Guardar en la db
        $producto->save();

        return redirect()->route('home')->with([
            'message' => 'El producto se ha creado correctamente!!'
        ]);
    }

    // Elimina el registro del producto
    public function delete($id)
    {
        $user = \Auth::user();
        $producto = Producto::find($id);

        // Eliminar registro de la img
        $producto->delete();

        $message = array('message' => 'El producto se ha borrado correctamente.!!');
        return redirect()->route('home')->with($message);
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $producto = Producto::find($id);

        return view('producto.edit', [
            'producto' => $producto
        ]);
    }

    public function update(Request $request)
    {
        // Capturar datos
        $categoria_id = 1;
        $nombre = $request->input('nombre');
        $referencia = $request->input('referencia');
        $precio = $request->input('precio');
        $peso = $request->input('peso');
        $stock = $request->input('stock');
        $Fecha = $request->input('fecha');
        $idProduct = $request->input('idProduct');        

        $producto = Producto::find($idProduct);

        //  Asignar valores -> nuevo objeto
        $producto->categoria_id = $categoria_id;
        $producto->nombre = $nombre;
        $producto->referencia = $referencia;
        $producto->precio = $precio;
        $producto->peso = $peso;
        $producto->stock = $stock;
        $producto->Fecha = $Fecha;

        // Guardar en la db
        $producto->update();

        return redirect()->route('home')->with([
            'message' => 'El producto se ha actualizado correctamente!!'
        ]);
    }
}
