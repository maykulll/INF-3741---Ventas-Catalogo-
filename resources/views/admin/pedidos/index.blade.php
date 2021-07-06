@extends('adminlte::page')

@section('title', 'pedidos')

@section('content_header')
    <h1>Pedidos</h1>
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
        
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">estado</th>
                    <th scope="col">Cliente</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
           
            
            @foreach($orders as $pedido)
                <tr>
                    <th scope="row">{{$pedido->id}}</th>
                    
                    <td>{{$pedido->address}}</td>
                    <td>{{$pedido->state}}</td>
                    <td>{{$pedido->name}}</td>
                    
                    
         
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