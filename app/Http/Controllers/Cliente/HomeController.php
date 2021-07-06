<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = DB::table('warehouses')
            ->join('products','warehouses.product_id', '=', 'products.id')
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
                    'quantity'
                )
            );
        return view('cliente.home',compact('products'));
    }
    public function realizarPedido(Request $request){
        $pedido = Order::create([
            'address' => $request->address,
            'state' => 'pendiente',
            'client_id' =>auth()->user()->id,                        
        ]);
        $productorder = new ProductsOrder();
        $productorder->quantity = $request->quantity;
        $productorder->product_id = $request->product_id;
        $productorder->order_id = Order::max('id');
        $productorder->save();
        return back()->with('info','Compra Exitosa!!!');

    }
}
