<x-layout title="Cadastrar produto">
    {{--message--}}
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times">x</i>
            </button>
            <strong>Erro!</strong> {{ session('error') }}
        </div>
    @endif
    <form action="/products" method="post">
        @csrf 
        <div class="mb-3">
            <label for="name" class="form-label"> Nome: </label>
            <input name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sku" class="form-label"> SKU: </label>
            <input name="sku" type="number" id="sku" class="form-control">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label"> Quantidade: </label>
            <input name="quantity" type="number" id="quantity" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>