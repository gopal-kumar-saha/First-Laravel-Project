@extends('layouts.starlight')

@section('title')
    {{ $category_info->category_name }}/Edit
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
       <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

       <a class="breadcrumb-item" href="{{ url('category') }}">Category</a>

        <span class="breadcrumb-item active">{{ $category_info->category_name }}</span>
      </nav>
@endsection

@section('content')

    

        <div class="col-6 m-auto">
            <div class="card text-white bg-info">


                    <div class="card-header"> Edit Category</div>
                    <div class="card-body">
                       <form action="{{ url('category/post/edit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <input type="hidden" class="form-control"  value={{ $category_info->id }} name="category_id">

                                <input type="text" class="form-control"  value={{ $category_info->category_name }} name="category_name">
                            </div>


                            <div>
                                @if($errors->all())
                                    @foreach ($errors->all() as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach.
                                @endif
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>
                    </div>
            </div>
        </div>


@endsection