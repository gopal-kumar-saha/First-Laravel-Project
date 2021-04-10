@extends('layouts.starlight')

@section('title')
    Sub Category
@endsection


@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Sub Category</span>

      </nav>
@endsection


@section('subcategory') 
  active
@endsection


@section('content')
    <div class='container'>
        <div class="col-6 mt-3">
            <div class="card text-white bg-secondary">
                    <div class="card-header text-center">
                        <h3> Insert Sub Category</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('SubcategoryPosT') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name : </label>
                                <select class="form-control" name="category_id">
                                    
                                    <option value="">-Chosse One-</option>
                                    @foreach ($categories as $category)
                                        <option value="{{  $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                    
                                   
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Subcategory Name</label>
                                <input type="text" class="form-control"  placeholder="Enter subcategory name" name="subcategory_name">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <br>
                            
                            <br>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

@endsection