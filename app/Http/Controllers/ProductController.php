<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMovement;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class ProductController extends Controller
{
    public function index(){

        $user = auth()->user()->id;

        $products = Product::where('user_id', $user)->get();
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
        return redirect('/products')->with('success', 'Produto excluído com sucesso');
       
    }

    public function show($id)
    {
        $product= Product::findOrFail($id);
        $productOwner = User::where('id', $product->user_id)->first()->toArray();     
        return view('products.show', ['product' => $product, 'productOwner' => $productOwner]);
       
    }

    public function edit($id)
    {
        $product= Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
       
    }

    public function update(Request $request)
    {
        Product::findOrFail($request->id)->update($request->all());
        return redirect('/products')->with('success', 'Produto editado com sucesso');
       
    }

    public function dashboard()
    {
        if(request('data_inicio')){
        $from = request('data_inicio');
        $to = request('data_fim');
        }
        else {   
            $to = Carbon::now();         
            $from = $to->clone()->subDays(30);
        }
        $user = auth()->user();
        $moved = DB::table('product_movements')
                ->join('products', 'product_movements.product_id', '=', 'products.id')
                ->select('product_movements.*', 'products.name as product_name')
                ->where('products.user_id', $user->id)
                ->whereBetween('product_movements.created_at', [$from, $to])
                ->get();
        return view('products.dashboard')->with('moved', $moved);
    }

    public function addProduct(Request $request, $id)
    {
        if($request->quantity<0){
            return back()->with('error', 'quantidade precisa ser positiva');
        }
        $product= Product::findOrFail($id);
        $product->addQuantidade($request->quantity);
        $product->save();

        $movedProduct = new ProductMovement();
        $movedProduct->quantity = $request->quantity;
        $movedProduct->user_id = $product->user_id;
        $movedProduct->origin = 'system';
        $movedProduct->product_id = $id;
        $movedProduct->type = 'adicionado';
        $movedProduct->save();
        return back()->with('success', 'Quantidade adicionada com sucesso');
    }

    
}
