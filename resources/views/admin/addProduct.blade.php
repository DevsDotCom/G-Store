@extends('layouts.admin')

@section('body')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">

        <h2>Add Product</h2>

        <form action="/admin/addProduct" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="type">Category</label>
                <select class="form-control" name="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Brand</label>
                <select class="form-control" name="brand">
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="type">In Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Price">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add</button>
        </form>

    </div>
@endsection
