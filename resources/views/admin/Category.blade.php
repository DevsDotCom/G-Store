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
        <h2>Add Category</h2>

        <form action="/admin/Category" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    @if ($categories->count() > 0)
        <div class="table-responsive my-3">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Product Count</th>
                        <th scope="col">Edit Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td><img src="{{ asset('storage') }}/category_image/{{ $category->image }}" alt="" width="150px" height="150px"></td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td><a href="/admin/editCategoryImage/{{ $category->id }}" class="btn btn-info">Edit Image</a></td>
                        <td><a href="/admin/editCategory/{{ $category->id }}" class="btn btn-primary">Edit</a></td>
                        <td><a 
                            href="/admin/deleteCategory/{{ $category->id }}" class="btn btn-danger"
                            onclick="return confirm('Do you want to delete {{ $category->name }} ?')"
                            >Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    @endif
@endsection
