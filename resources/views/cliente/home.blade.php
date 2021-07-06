@extends('layouts.app')

@section('content')
<div class="container">
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
                                    <a href="#" class="btn btn-warning btn-block"><i class="fas fa-fw fa-shopping-cart"></i> Comprar</a>
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
@endsection
@section('css')
@endsection
@section('js')
@endsection