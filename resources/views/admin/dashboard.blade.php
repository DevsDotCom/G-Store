@extends('layouts.admin')

@section('body')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Name : </strong>{{Auth::user()->name}}</p>
                    <p><strong>Email : </strong>{{Auth::user()->email}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
