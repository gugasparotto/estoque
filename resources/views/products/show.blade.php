<x-layout title="Produto">
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
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Erro!</strong> {{ session('error') }}
            </div>
        @endif
    <h1>{{$product['name']}}</h1>
    <h2>{{$productOwner['name']}}</h2>
    <h2>Quantidade: {{$product['quantity']}}</h2>
    <form action="/products/add/{{$product['id']}}" method="post" >
        @csrf
        <label for="quantity">Adicionar </label>
        <input type="number" id="quantity" name="quantity">
        <button type="submit"> salvar</button>
    </form>

</x-layout>