@extends('layouts.app')

@section('content')
<div class="container" style="width: 1000px">
    <div class="row">
        @foreach ($products as $product)
                    <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
                        <div class="card">
                            <img src="{{ Storage::url($product->imagem) }}" style="height: 300px; width: 300px;">
                            <div style="background-color: #808080; font-family:calibri;"><a href="{{ route('detail.product', $product->id) }}"><h1 style="text-align:center; color: black;"><b>{{ $product->nome }}</b></h1></a></div>
                            <div style="background-color: #D3D3D3">
                                <p class="price" style="text-align:center"><b>R$ {{ $product->valor }}</b></p>
                            </div>
                            <div class="card-action">
                                <form method="POST" action="{{ route('carrinho.adicionar', $product) }}">
                                    @csrf
                                    <button class="btn btn-primary" style="width: 300px;">Adicionar ao carrinho</button>  
                                </form>
                            </div>
                        </div><br>
                    </div>
                @endforeach
    </div>
</div>
@endsection


