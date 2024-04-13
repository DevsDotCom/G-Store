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

        <h2>Edit Product</h2>

        <form action="/admin/updateProduct" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <input type="hidden" name="id" value={{ $product->id }}>

                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ $product->description }}">
            </div>
            <div class="form-group">
                <label for="type">Category</label>
                <select class="form-control" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id == $product->category_id)
                                selected 
                            @endif
                        >{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Brand</label>
                <select class="form-control" name="brand">
                    @foreach ($brands as $brand)
                       <option value="{{ $brand->id }}"
                            @if ($brand->id == $product->brand_id)
                                selected 
                            @endif
                        >{{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="type">In Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Price" value="{{ $product->stock }}">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

    </div>
@endsection
