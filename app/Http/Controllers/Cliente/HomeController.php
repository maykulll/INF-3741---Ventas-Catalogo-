<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
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
}
