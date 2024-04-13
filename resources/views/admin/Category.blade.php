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

        <form action="/admin/Category" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
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
                        <th scope="col">Category Name</th>
                        <th scope="col">Product Count</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
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
