<x-layout title="Dashboards">
   
    @if(count($products) > 0 )
        @foreach($products as $product)
            {{$product->name}} <br>
        @endforeach
    @else 
        <p>não tem produtos cadastrados</p>
    @endif
</x-layout>
