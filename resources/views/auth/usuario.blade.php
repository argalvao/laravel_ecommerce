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
                    <h2>Usuários</h2>
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
                <th>Nome</th>
                <th>Endereço</th>
                <th>Level</th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->address }}</td>
                <td>{{ $usuario->access_level }}</td>
            </tr>
            @endforeach
        </table>
                        </div>
                </div>
            </div>
        </div>
</div>
@endsection
