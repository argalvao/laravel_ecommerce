@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Administrador do sistema</h2>
                <a class="btn btn-primary" href="{{ route('home') }}" enctype="multipart/form-data"> Voltar</a><br><br>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                         <div class="container mt-2">
                            <div class="row">
    
    </div>

    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Produtos</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Cadastrar um novo produto</a>
                </div>
            </div>
        </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
       
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th width="280px">Opções</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ Storage::url($product->imagem) }}" height="75" width="75" alt="" /></td>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->descricao }}</td>
                <td>{{ $product->valor }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" enctype="multipart/form-data">
                        <a class="btn btn-primary" href="{{ route('detail.product', $product->id) }}">Detalhes</a>
                        <a class="btn btn-success" href="{{ route('edit.products', $product->id) }}">Editar</a>
       
                        @csrf
                        @method('delete')
          
                        <button type="submit" class="btn btn-danger">Deletar</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
      
        {!! $products->links() !!}
                        </div>
                </div>
            </div>
        </div>
</div>
@endsection
