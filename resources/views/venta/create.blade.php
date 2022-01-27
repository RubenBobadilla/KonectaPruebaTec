@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Crear nueva Venta</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('venta.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="producto" class="col-md-3 col-form-label text-md-right">Producto</label>

                            <div class="col-md-3"> 
                                <select name="producto">
                                    <option>seleccione</option>   
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>                                
                                    @endforeach
                                </select>                                  

                                @if($errors->has('producto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('producto') }}</strong>                                    
                                    </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-3 col-form-label text-md-right">Ciudad</label>
                            <div class="col-md-7"> 
                                <input id="ciudad" type="text" name="ciudad" class="form-control" required/>  
                                
                                @if($errors->has('ciudad '))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div>  

                        <div class="form-group row">
                            <label for="direccion" class="col-md-3 col-form-label text-md-right">Direccion</label>
                            <div class="col-md-7"> 
                                <input id="direccion" type="text" name="direccion" class="form-control" required/>  
                                
                                @if($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>                                    
                                    </span>
                                @endif
                            </div>                            
                        </div> 

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-3 col-form-label text-md-right">Cantidad</label>
                            <div class="col-md-7"> 
                                <input type="number" name="cantidad" class="form-control" />
                                
                                @if($errors->has('cantidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cantidad') }}</strong>                                    
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