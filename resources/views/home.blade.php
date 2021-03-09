@extends('layouts.starlight')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        {{-- <a class="breadcrumb-item" href="index.html">Pages</a> --}}
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
@endsection

@section('dashboard')
  active  
@endsection

@section('content')
<div class="container">
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

                    <h1>Hello Database</h1>

                        <div class="alert alert-success text-center">
                           Total User : {{ $users->count() }}
                        </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created_Time</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                <th scope="row">{{ $loop->index +1 }}</th>
                                <td>{{  Str::Title($user->name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
