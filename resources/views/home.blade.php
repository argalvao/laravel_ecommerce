@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Administrador do sistema</h2>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                         <div class="container mt-2">
                            <div class="row">
    
    </div><br>

    <div class="row">
            <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
                        <div class="card">
                            <img src="https://www.finaldownload.com/wp-content/uploads/2020/03/Package-Software-2.png" alt="Produtos" style="height: 300px;">
                            <h1 style="text-align:center;">Produtos</h1> 
                            <a href="{{ route('products.index') }}" type="button" class="btn btn-warning">Gerenciar</a>
                        </div>
                    </div>
            <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
                        <div class="card">
                            <img src="https://www.iconpacks.net/icons/1/free-user-group-icon-296-thumb.png" alt="Usuários" style="height: 300px;">
                            <h1 style="text-align:center;">Usuários</h1> 
                            <a href="{{ route('products.index') }}" type="button" class="btn btn-primary">Gerenciar</a>
                        </div>
                    </div>
            <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
                        <div class="card">
                            <img src="https://images.vexels.com/media/users/3/141185/isolated/preview/b2c7de1951d5d57e9305c96ca875e170-sacolas-de-compras-by-vexels.png" alt="Vendas" style="height: 300px;">
                            <h1 style="text-align:center;">Vendas</h1> 
                            <a href="{{ route('products.index') }}" type="button" class="btn btn-success">Gerenciar</a>
                        </div>
                    </div>
    </div>
</div>
@endsection


