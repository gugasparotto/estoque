<x-layout title="Produtos">
    <a href="/products/create" class="btn btn-dark"> Cadastrar produto </a>
    {{-- Message --}}
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Successo!</strong> {{ session('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Erro!</strong> {{ session('error') }}
        </div>
    @endif
    <ul class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">{{$product->name}} - sku:{{$product->sku}} <a href="/products/delete/{{$product->id}}" class="btn btn-warning">deletar</a> </li>
        @endforeach    
    </ul>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    
</x-layout>