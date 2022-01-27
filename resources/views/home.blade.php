@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('includes.message')
                <div class="card-header">Bienvenidos a la cafetería Konecta, por favor 
                    escoja la opcion que desea realizar en el panel superior</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
