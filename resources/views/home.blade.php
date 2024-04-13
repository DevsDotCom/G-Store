@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Name : </strong>{{Auth::user()->name}}</p>
                    <p><strong>Email : </strong>{{Auth::user()->email}}</p>
                    @if (Auth::user()->checkIsAdmin())
                        <a href="/" class="btn btn-success">{{ config('app.name', 'Laravel') }}</a>
                        <a href="/admin" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="/" class="btn btn-success">{{ config('app.name', 'Laravel') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
