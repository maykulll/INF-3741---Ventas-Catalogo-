@extends('layouts.app')

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
        <a class="btn btn-success" href="{{route('products.create')}}"><i class="fas fa-fw fa-plus"></i> Nuevo</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$product->product}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->type}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
        
    </div>
</div>


@endsection
@section('css')

@endsection
@section('js')
<script>
    //alert('Mensaje de muestra de producto');
</script>
@endsection