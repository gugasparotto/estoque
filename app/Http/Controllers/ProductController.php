<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('name', 'desc')->paginate(5);
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        
        return view('products.create');
    }

    public function store(Request $request){
        
        $name= $request -> input('name');
        $sku= $request -> input('sku');
        $quantity = $request->input('quantity');
        $product = new Product();
        $product -> sku = $sku;
        $product -> name = $name;
        $product -> quantity = $quantity;
        $product -> created_by = "system";
        $product->save();
        return redirect('/products');
    }
}
