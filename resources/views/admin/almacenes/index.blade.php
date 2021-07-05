@extends('adminlte::page')

@section('title', 'Almacen')

@section('content_header')
    <h1>Almacenes</h1>
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
                    <th scope="col">Producto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    
                </tr>
            </thead>
            <tbody>
            <div>LISTA DE PRODUCTOS (INVENTARIO)</div>
            
            @foreach($products as $product)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$product->product}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->colour}}</td>
                    <td>{{$product->prize}}</td>
                    <td>{{$product->quantity}}</td>
         
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