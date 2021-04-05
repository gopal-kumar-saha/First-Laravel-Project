@extends('layouts.starlight')

@section('title')
    Product
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">setting</span>

      </nav>
@endsection

@section('setting')
  active  
@endsection

@section('content')

<div class="col-6 mt-3">
            <div class="card text-white bg-secondary">
                    <div class="card-header text-center">
                        <h3> Update Setting</h3>
                    </div>
                    <div class="card-body m-auto">
                    <form action="{{ route('SettingPost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control"  placeholder="Enter Product name" name="phone" value="{{ $settings->where('setting_name','phone')->first()->setting_value }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control"  placeholder="Enter Product name" name="email" value="{{ $settings->where('setting_name','email')->first()->setting_value }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                            <br>
                            
                            <br>
                            

                        </form>
                    </div>
            </div>
        </div>
</div>

@endsection
