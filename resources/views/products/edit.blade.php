<x-layout title="Editar produto">
     {{--message--}}
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times">x</i>
                </button>
                <strong>Erro!</strong> {{ session('error') }}
            </div>
        @endif
    <form action="/products/update/{{$product->id}}" method="post">
        @csrf 
        @method('PUT')
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label for="name" class="form-label"> Nome: </label>
            <input name="name" id="name" class="form-control" value="{{$product['name']}}">
        </div>
        <div class="mb-3">
            <label for="sku" class="form-label"> SKU: </label>
            <input name="sku" type="number" id="sku" class="form-control" value="{{$product->sku}}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label"> Quantidade: </label>
            <input name="quantity" type="number" id="quantity" class="form-control" value="{{$product->quantity}}">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>