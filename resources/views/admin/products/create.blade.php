@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

        <form class="form-horizontal" action="{{ route('products.store')}}" method="POST">
            @csrf
            <div class="row bg-light text-dark">

                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="titulo">Producto</label>
                        <input class="form-control" placeholder="Ingrese el producto" name="product" type="text" id="product" required onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    @error('product')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Descripcion breve" id="description" name="description" required></textarea>
                    </div>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" placeholder="Ingrese precio" name="price" type="text" id="price" required>
                    </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label>Marca</label>
                        <input class="form-control" placeholder="Ingrese Marca" name="brand" type="text" id="brand" required>
                    </div>
                    @error('brand')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="colour">Colores</label>
                        <select class="form-control" name="colour_id" id="colour_id" type="text">
                            <option disabled selected>-- Seleccione un Color --</option>
                            @foreach ($colours as $colour)
                            <option value="{{$colour->id}}">{{$colour->colour}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <input class="form-control" placeholder="Ingrese tipo" name="type" type="text" id="type" required>
                    </div>
                    @error('type')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label>Talla</label>
                        <input class="form-control" placeholder="Ingrese talla" name="eu" type="text" id="eu" required>
                    </div>
                    @error('eu')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="Imagen">Nombre Imagen</label>
                        <input class="form-control" placeholder="Nombre de la imagen" name="imageurl" id="image" readonly required>
                    </div>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="col-md-6 mt-2">
                    <div class="card bg-light text-dark">

                        <div class="card-header bg-light text-dark">
                            Ajustar imagen
                        </div>
                        <div class="card-body">
                            <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                            <img id="idimag" class="" height="300" width="300" src="https://images.unsplash.com/photo-1542261777448-23d2a287091c?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTR8fHxlbnwwfHx8&auto=format&fit=crop&w=500&q=60" alt="User profile picture">
                        </div>

                    </div>
                </div>
            </div>
            <div class="card bg-dark">
                <div class="container-fluid h-100 mt-2">
                    <div class="row w-100 align-items-center">
                        <div class="form-group ">
                            <div class="col text-center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required> Estoy seguro <a>de registrar</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-success ">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- Fin contenido -->
<!-- Modal imagen -->
<div id="imageModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajusta el imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br />
                        <button class="btn btn-success crop_image">Guardar Foto</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<script>
    $(document).ready(function() {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 300,
                height: 300,
                type: 'square' //circle o square
            },
            boundary: {
                width: 400,
                height: 400
            }
        });
        $('#before_crop_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#imageModal').modal('show');
        });
        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "{{url('/admin/productimage')}}",
                    type: 'POST',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'image': response
                    },
                    success: function(data) {
                        $('#imageModal').modal('hide');
                        //alert('Crop image has been uploaded');
                        var json = $.parseJSON(data); // create an object with the key of the array
                        //console.log(json.nombrefoto);
                        $('#idimag').attr("src", '/storage/products/' + json.imagename);
                        $('#image').val(json.imagename);

                    }
                })
            });
        });

    });
</script>
@stop
