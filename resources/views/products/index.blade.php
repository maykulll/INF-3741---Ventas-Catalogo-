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
<a href=""></a>
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

