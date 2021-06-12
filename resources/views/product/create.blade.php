@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12 margin-tb">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Adicionar um novo produto</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a><br>
                </div>
            </div>
        </div><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                         <div class="container mt-2">
                            <div class="row">
    
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

      
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do produto">
                   @error('nome')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <textarea class="form-control" style="height:150px" name="descricao" placeholder="Descrição do produto"></textarea>
                    @error('descricao')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Imagem:</strong>
                     <input type="file" name="imagem" class="form-control" placeholder="Imagem do produto">
                    @error('imagem')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input type="text" name="valor" class="form-control" placeholder="Preço unitário">
                   @error('valor')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Salvar</button>
        </div>
       
    </form>
</div>

@endsection
