<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductMovementController extends Controller
{
    public function store(Request $request)
    {
        $product= Product::findOrFail($request->user_id);
        $product->addQuantidade($request->quantity);
        $product->save();
        return redirect('/products');
    }
}
