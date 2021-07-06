@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> {{session('info')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger d-flex justify-content-center">
                    <h1> CATALOGO</h1>
                </div>
                <div class="card-body bg-dark text-dark">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-4 mt-3">
                            <div class="card">
                                <img src="{{ asset ('/storage/products/'.$product->imageurl)}}" class="card-img-top" alt="{{ asset ('/storage/products/'.$product->imageurl)}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->product}} <span class="text-secondary"> BS {{$product->prize}}</span> </h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <button class="btn btn-warning btn-block" onclick="producto('{{$product->id}}')" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-shopping-cart"></i> Comprar</button>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pedir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('cliente.realizarpedido')}}" method="POST">
                    @csrf
                    <div class="row bg-light text-dark">

                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="Direccion">Dirección</label>
                                <input class="form-control" placeholder="Ingrese la dirección" name="address" type="text" id="address" required>
                            </div>
                            <div class="form-group">
                                <label for="Cantidad">Cantidad</label>
                                <input class="form-control" value="1" name="quantity" type="number" id="cantidad" required>
                            </div>
                            <input type="text" name="product_id" id="producto_id">
                            <div class="form-group ">
                                <div class="">
                                    <button type="submit" class="btn btn-primary ">Realizar pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
@endsection
@section('js')
<script>
    function producto(id) {
        //alert(id);
        $('#producto_id').val(id);
    }
</script>
@endsection