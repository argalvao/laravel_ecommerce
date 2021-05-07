@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                        <a href="{{ route('products.index') }}" type="button" class="btn btn-warning">Products</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
