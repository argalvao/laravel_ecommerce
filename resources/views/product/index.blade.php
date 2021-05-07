@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin page</h2>
                <a class="btn btn-primary" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a><br><br>
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
                <h2>Products</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Register a new product</a>
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
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ Storage::url($product->image) }}" height="75" width="75" alt="" /></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" enctype="multipart/form-data">
                    <a class="btn btn-primary" href="{{ route('detail.product', $product->id) }}">Details</a>
                    <a class="btn btn-success" href="{{ route('edit.products', $product->id) }}">Edit</a>
   
                    @csrf
                    @method('delete')
      
                    <button type="submit" class="btn btn-danger">Delete</button> 
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
