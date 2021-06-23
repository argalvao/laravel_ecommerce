@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <h3>Produtos no carrinho</h3>
        <hr/>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">
                <strong>{{ Session::get('mensagem-falha') }}</strong>
            </div>
        @endif
        @forelse ($pedidos as $pedido)
            <div class="container">
                <div class="row">
                    <h5 class="col l6 s12 m6"> Pedido: {{ $pedido->id }} </h5>
                    <h5 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                </div>
             
            </div>
            <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Qtd</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_produtos as $pedido_produto)

                    <tr>
                        <td>
                            <img width="100" height="100" src="{{ Storage::url($pedido_produto->produto->imagem) }}">
                        </td>

                        <td> {{ $pedido_produto->produto->nome }} </td>
                        <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                        @php
                            $total_produto = $pedido_produto->valores;
                            $total_pedido += $total_produto;
                        @endphp
                        <td>
                            <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>
                        </td>
                        <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                        <td class="center-align">
                            <form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover', $pedido_produto) }}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="pedido_id" value="{{$pedido->id}}">
                            <input type="hidden" name="produto_id" value="{{$pedido_produto->produto->id}}">
                            <input type="hidden" name="item" value="{{$pedido_produto->produto->nome}}">
                            <button type="submit" class="btn btn-danger" data-position="top" data-delay="50">Retirar produto
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br><br>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <a class="btn btn-primary col l4 s4 m4 offset-l2 offset-s2 offset-m2" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('welcome') }}">Continuar comprando</a>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('carrinho.concluir') }}">
                    @csrf
                        <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                        <button type="submit" class="btn btn-success col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                            Concluir compra
                    </button>   
                </form>
                </div>
                
            </div>
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse
    </div>
</div>



@push('scripts')
    <script type="text/javascript" src="/js/carrinho.js"></script>
@endpush

@endsection