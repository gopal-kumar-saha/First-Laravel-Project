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


@section('Sub Category')
  active
@endsection


@section('content')
      <div class='container'>

    <div class="row">
        <div class="col-12">
            <div class="card text-white">
                <div class="card-header bg-success ">
                    <div class="row">
                        <div class="col-12 text-center">
                           <h3>All Products</h3>
                        </div>
                    </div>
                </div>

               
                <div class="card-body">
                   
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Short Description</th>
                                <th scope="col">Product Long Description</th>
                                <th scope="col">Product Alert Quantity</th>
                                <th scope="col">Product Photo</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                            
                        
                        <tbody>
                            <form action="{{ route('check_delete') }}" method="POST">
                                @csrf

                            
                            </form>
                        </tbody>

                        </form>
                    </table>

                    
                </div>
                </div>
            </div>
    </div>

@endsection