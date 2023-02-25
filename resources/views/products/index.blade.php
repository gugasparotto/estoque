<x-layout title="Produtos">
    <a href="/products/create" class="btn btn-dark"> Cadastrar produto </a>

    <ul class="list-group">
        @foreach ($products as $product)
        <li class="list-group-item">{{$product->name}} <a href="/products/delete/{{$product->id}}">deletar</a> </li>
        @endforeach    
    </ul>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    
</x-layout>