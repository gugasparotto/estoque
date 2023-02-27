<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\QueryException;


class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('name', 'asc')->paginate(10);
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
        $name= $request -> input('name');
        $sku= $request -> input('sku');
        $quantity = $request->input('quantity');
        $user = auth()->user();
        $product = new Product();
        $product -> sku = $sku;
        $product -> name = $name;
        $product -> quantity = $quantity;
        $product -> created_by = "system";
        $product->user_id = $user->id;
        $product->save();
        return redirect('/products')->with('success', 'Produto cadastrado com sucesso');
        } catch (\Illuminate\Database\QueryException $ex){
            // Se ocorrer um erro de chave única, redirecione o usuário para uma página de erro ou exiba uma mensagem de erro personalizada
            if ($ex->errorInfo[1] == 1062) {
                return back()->with('error', 'O SKU já está sendo usado. Por favor, escolha outro.');
            } else {
                return redirect('/products')->with('error', QueryException::class);
            }
        }
    }

    public function delete($id)
    {
        $product=new Product();
        $product->destroy($id);
        return redirect('/products');
       
    }

    public function show($id)
    {
        $product= Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
       
    }

    public function edit($id)
    {
        $product= Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
       
    }
}
