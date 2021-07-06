@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
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
        <a class="btn btn-success" href="{{route('products.create')}}"><i class="fas fa-fw fa-plus"></i> Nuevo Stock</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio</th>
                    
                </tr>
            </thead>
            <tbody>
            
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->product}}</td>
                    <td><img src="{{ asset ('/storage/products/'.$product->imageurl)}}" width="40" class="rounded-square" alt=""></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->colour}}</td>
                    <td>{{$product->prize}}</td>
                    

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