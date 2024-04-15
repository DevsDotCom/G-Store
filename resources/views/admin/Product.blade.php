@extends('layouts.admin')

@section('body')
    
    <div class="d-flex justify-content-between">
        <h2>Product List</h2>
        <a href="/admin/addProduct" class="btn btn-success">Add Product</a>
    </div>
  
    @if ($products->count() > 0)
        <div class="table-responsive my-2">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">In Stock</th>
                        <th scope="col">Edit Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td><img src="{{ asset('storage') }}/product_image/{{ $product->image }}" alt="" width="120px" height="120px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 80, '...') }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td><a href="/admin/editProductImage/{{ $product->id }}" class="btn btn-info">Edit Image</a></td>
                            <td><a href="/admin/editProduct/{{ $product->id }}" class="btn btn-primary">Edit</a></td>
                            <td><a href="/admin/deleteProduct/{{ $product->id }}" class="btn btn-danger"
                                    onclick="return confirm('Do you want to delete {{ $product->name }} ?')">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    @else
        <div class="alert alert-danger my-3">There is no products information.</div>
    @endif
@endsection
