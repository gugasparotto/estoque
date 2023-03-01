<x-layout title="Produto">
    <h1>{{$product['name']}}</h1>
    <h2>{{$productOwner['name']}}</h2>
    <h2>Quantidade: {{$product['quantity']}}</h2>
    <form action="/products/add/{{$product['id']}}" method="post" >
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{$product->user_id}}">
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <label for="quantity">Adicionar </label>
        <input type="number" id="quantity" name="quantity">
        <button type="submit"> salvar</button>
    </form>

</x-layout>