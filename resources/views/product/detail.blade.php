@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">

<div class="container mt-2">
    <div class="card">
        <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data"> Back</a><br><br>
            </div>
        </div>
    </div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

  <div class="row">
    <div class="container">
        <div class="row">
            
            <div class="divider"></div>
            <div class="section col s12 m6 l4">
                <div class="card small">
                    <img src="{{ Storage::url($product->image) }}" alt="" class="col s12 m12 l12 materialboxed"/>
                    <h3 class="text-center">{{ $product->title }}</h3>
                </div>
            </div>
            <div class="section col s12 m6 l6 text-center">
                {!! $product->description !!}<br><br>
            </div>
            <div class="section col s12 m6 l6">
                <h4 class="text-center"><label>Amount: {!! $product->qtd !!}</label></h4>
            </div>
            <div class="section col s12 m6 l6">
                <h4 class="left col l6"> R$ {{ $product->price }} </h4>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button class="btn btn-success col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Add to cart</button>   
                </form>
            </div>
    </div>
</div>

  </div>
</div>
</div>
</div>
</div>
</div>
@endsection