<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class MainController extends CustomController
{
    //
    /**
     * MainController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $products = Products::all();
        return view('home')->with(['products' => $products]);
    }

    public function detail($id)
    {
        $product = Products::findOrFail($id);
        $products = Products::all();
        $products->take(4);
        return view('detail')->with(['product' => $product, 'products' => $products->take(4)]);
    }
}
