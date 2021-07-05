<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Image;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('colours','products.colour_id', '=', 'colours.id')
            ->join('types','products.type_id', '=', 'types.id')
            ->get(array(
                    'products.id',
                    'product',
                    'description',
                    'prize',
                    'imageurl',
                    'colour',
                    'eu',
                    'type',
                )
            );
        return view('admin.products.index',compact('products')); //->with('info','Bienvenidos a la session de productos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colours = Colour::orderBy('id', 'desc')->get();
        return view('admin.products.create', compact('colours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'product' => 'required',
            'price' => 'required',
            'imageurl' => 'required',
            'brand' => 'required'
        ]);
        $type = Type::create([
            'type' => $request->type,
            'eu' => $request->eu,
        ]);


        $carrusel = Product::create([
            'product' => $request->product,
            'description' => $request->description,
            'prize' => $request->price,
            'brand' => $request->brand,
            'imageurl' => $request->imageurl,
            'colour_id' => $request->colour_id,
            'type_id' => Type::max('id'),
        ]);
        return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function saveImage(Request $request)
    {
        try {
            $folderPath = public_path('storage/products/');

            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath . $imageName;

            file_put_contents($imageFullPath, $image_base64);

            $saveFile = new Image();
            $saveFile->imagename = $imageName;
            $saveFile->save();
            $datos = array(
                'imagename' => $imageName
            );
            //Devolvemos el array pasado a JSON como objeto

            return json_encode($datos, JSON_FORCE_OBJECT);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
