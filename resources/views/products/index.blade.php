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

    <table class="table table-dark">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">SKU</th>
            <th scope="col">Quantidade</th>
            <th></th>
            <th></th>
            
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td><a href="/products/{{$product->id}}" class="text-decoration-none" >{{$product->name}}</a></td>
                <td>{{$product->sku}}</td>
                <td>{{$product->quantity}}</td>
                <td class="text-right" style="width: 80px">
                    <a class="btn btn-info-crud-up btn-xs" href="/products/edit/{{$product->id}}"  style="color:rgb(246, 240, 240); padding: 2px">
                        Editar
                    </a>
                </td>
                <td class="text-right" style="width: 80px">
                    <a class="btn btn-warning" onclick="return confirm('Deseja excluir esse item?')" href="/products/delete/{{$product->id}}" style="color:rgb(0, 0, 0); padding: 2px">
                        excluir
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->links()}}
    </div>
    
</x-layout>


