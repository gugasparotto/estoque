<x-layout title="Dashboards">
   
    @if(count($moved) > 0 )
        <form action="/dashboard" method="GET">
            <div class="form-group">
                <label for="data_inicio">Data inicial:</label>
                <input type="text" name="data_inicio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data final:</label>
                <input type="text" name="data_fim" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($moved as $moved)
                        <tr>
                            <th >{{$moved->id}}</th>
                            <td >{{$moved->product_name}}</td>
                            <td >{{$moved->quantity}}</td>
                            <td >{{$moved->type}}</td>
                            <td >{{ date('d/m/Y', strtotime($moved->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>        
    @else 
        <p>não tem produtos cadastrados</p>
    @endif
</x-layout>
