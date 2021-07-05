@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Ventas</h1>
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
                    <th scope="col">Vendedor</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Ganancia</th>
                    
                    
                </tr>
            </thead>
            <tbody>
           
            
            @foreach($ventas as $venta)
                <tr>
                    <th scope="row">1</th>
                    
                    <td>{{$venta->seller_id}}</td>
                    <td>{{$venta->client_id}}</td>
                    <td>{{$venta->profits}}</td>
                    
         
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