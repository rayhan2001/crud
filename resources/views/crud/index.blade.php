@extends('master')
@section('title')
    Home
@endsection
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="float: left;">
                            <h2>CRUD</h2>
                        </div>
                        <div style="float: right;">
                            <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr class="text-center">
                                <th style="width: 10px;">Sl</th>
                                <th style="width: 20px;">Name</th>
                                <th style="width: 10px;">Price</th>
                                <th style="width: 40px;">Image</th>
                                <th style="width: 10px;">Status</th>
                                <th style="width: 10px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr class="text-center">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <img src="{{asset($product->image)}}" alt="" width="50">
                                </td>
                                <td>{{$product->status==1? 'Active':'Inactive'}}</td>
                                <td>
                                @if($product->status==1)
                                    <a href="{{route('product.status',['id'=>$product->id])}}" class="btn btn-primary"><i class="bi bi-hand-thumbs-up-fill"></i></a>
                                @else
                                    <a href="{{route('product.status',['id'=>$product->id])}}" class="btn btn-warning"><i class="bi bi-hand-thumbs-down-fill"></i></a>
                                @endif

                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{route('products.destroy',$product->id)}}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="bi bi-x-lg"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
