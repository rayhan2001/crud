@extends('master')
@section('title')
    Add Product
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
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid @enderror">Image:</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
