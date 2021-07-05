@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> {{session('info')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('products.create')}}"><i class="fas fa-fw fa-plus"></i> Nuevo</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">imagen</th>
                    
                    
                    
                    
                </tr>
            </thead>
            <tbody>
           
            
            @foreach($users as $usuario)
                <tr>
                    <th scope="row">{{$usuario->id}}</th>
                    
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->password}}</td>
                    <td>{{$usuario->role}}</td>
                    <td>{{$usuario->urlimage}}</td>
                    
         
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
        
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop