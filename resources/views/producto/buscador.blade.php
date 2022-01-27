@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="{{ route('producto.buscar') }}" id="buscador">
                <div class="row">
                    <div class="form-group col">
                        <input type='text' id='search' class="form-control" />
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" value="Buscar" class="btn btn-success" />
                    </div>
                </div>
            </form>
            <hr>
            <h1>Resultado de la busqueda</h1>
            <hr>

            @foreach($productos as $producto)
            <div class="card pub_image">
                <div class="card-header">

                    <div class="data-user">
                        <a href="">
                            {{ $producto->nombre.' | Ref: '.$producto->	referencia }}                            
                        </a>

                        <a href="{{ route('producto.edit', ['id' =>$producto->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="{{ route('producto.delete', ['id' =>$producto->id]) }}" class="btn btn-sm btn-primary">Eliminar</a>

                    </div>

                </div>

            </div>
            @endforeach

            <!-- PAGINACION -->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection