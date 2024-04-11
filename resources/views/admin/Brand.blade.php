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
        <h2>Add Brand</h2>

        <form action="/admin/Brand" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Brand Name">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    @if ($brands->count() > 0)
        <div class="table-responsive my-3">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->name }}</td>
                        <td><a href="/admin/editBrand/{{ $brand->id }}" class="btn btn-primary">Edit</a></td>
                        <td><a 
                            href="/admin/deleteBrand/{{ $brand->id }}" class="btn btn-danger"
                            onclick="return confirm('Do you want to delete {{ $brand->name }} ?')"
                            >Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $brands->links() }}
        </div>
    @else 
        <div class="alert alert-danger my-3">There is no brands information.</div>
    @endif
@endsection
