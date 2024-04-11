@extends('layouts.admin')

@section('body')
  <a href="/admin/addProduct" class="btn btn-success">Add Product</a>
  
    @if ($products->count() > 0)
        <div class="table-responsive my-3">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
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
