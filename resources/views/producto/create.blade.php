@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Crear nuevo Producto</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('producto.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-3 col-form-label text-md-right">Categoría</label>

                            <div class="col-md-3"> 
                                <select name="categoria">
                                    <option>seleccione</option>   
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>                                
                                    @endforeach
                                </select>                                  

                                @if($errors->has('categoria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoria') }}</strong>                                    
                                    </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-7"> 
                                <input id="nombre" type="text" name="nombre" class="form-control" required/>  
                                
                                @if($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>  

                        <div class="form-group row">
                            <label for="referencia" class="col-md-3 col-form-label text-md-right">Referencia</label>
                            <div class="col-md-7"> 
                                <input id="referencia" type="text" name="referencia" class="form-control" required/>  
                                
                                @if($errors->has('referencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('referencia') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div> 

                        <div class="form-group row">
                            <label for="precio" class="col-md-3 col-form-label text-md-right">Precio</label>
                            <div class="col-md-7"> 
                                <input type="number" name="precio" class="form-control" />
                                
                                @if($errors->has('precio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>  

                        <div class="form-group row">
                            <label for="peso" class="col-md-3 col-form-label text-md-right">Peso(kg)</label>
                            <div class="col-md-7"> 
                                <input type="number" name="peso" class="form-control" />
                                
                                @if($errors->has('peso'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('peso') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>    

                        <div class="form-group row">
                            <label for="stock" class="col-md-3 col-form-label text-md-right">Stock</label>
                            <div class="col-md-7"> 
                                <input type="number" name="stock" class="form-control" />
                                
                                @if($errors->has('stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stock') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div> 
                                             

                        <div class="form-group row">
                            <label for="fecha" class="col-md-3 col-form-label text-md-right">Fecha</label>
                            <div class="col-md-7"> 
                                <input type="date" name="fecha" class="form-control" />
                                
                                @if($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Guardar" />
                            </div>                           
                        </div>

                    </form>  
                </div>

            </div>            


        </div>
    </div>
</div>

@endsection