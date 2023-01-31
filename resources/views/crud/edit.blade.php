@extends('master')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div style="float: left;">
                            <h2>CRUD</h2>
                        </div>
                        <div style="float: right;">
                            <a href="{{route('products.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="name" name="name" class="form-control" id="name" value="{{$product->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <img src="{{asset($product->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$product->status==1? 'selected':''}}>Active</option>
                                    <option value="0" {{$product->status==0? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
