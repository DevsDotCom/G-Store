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
        <h2>Edit Brand</h2>

        <form action="/admin/updateBrand" method="post">

            {{ csrf_field() }}

            <div class="form-group">
                <input type="hidden" name="id" value={{ $brand->id }}>

                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Brand Name" value="{{ $brand->name }}">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>

@endsection
