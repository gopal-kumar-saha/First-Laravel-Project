@extends('layouts.starlight')

@section('title')
    Product
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <a class="breadcrumb-item" href="{{ url('product') }}">Product</a>

        <span class="breadcrumb-item active">Edit_Product</span>

      </nav>
@endsection

@section('product')
  active  
@endsection

@section('content')

<div class='container'>

    

    <div class="col-6 mt-3">
            <div class="card text-white bg-warning">
                    <div class="card-header text-center">
                        <h3> Edit Product</h3>
                    </div>
                    @if (session('product_update_status'))
                        <div class="alert alert-succcess bg-secondary text-center">
                            {{ session('product_update_status') }}
                        </div>
                    @endif
                    
                    <div class="card-body">
                    <form action="{{ route('ProductEditPosT') }}" method="POST">
                            @csrf


                            <div class="form-group">
                                {{-- <label for="exampleInputEmail1">Product Id</label> --}}
                                <input type="hidden" class="form-control"  value="{{ $products->id }}" name="product_id">
                            </div>




                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name : </label>
                                <select class="form-control" name="category_id">
    
                                    <option value="">-Chosse One-</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $products->category_id )
                                                <option value="{{  $category->id }}" selected>{{ $category->category_name }}</option>
                                            @else 
                                                <option value="{{  $category->id }}">{{ $category->category_name }}</option>
                                            @endif
                                            
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" class="form-control"  value="{{ $products->product_name }}" name="product_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price</label>
                                <input type="text" class="form-control"  value="{{ $products->product_price }}" name="product_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity</label>
                                <input type="text" class="form-control"  value="{{ $products->product_quantity }}" name="product_quantity">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Short Description</label>
                                <textarea cols="40" rows="3" name="product_short_description">{{ $products->product_short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Long Description</label>
                                <textarea cols="40" rows="5" name="product_long_description">{{ $products->product_long_description }}</textarea>                            
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Alert Quantity</label>
                                <input type="text" class="form-control"  value="{{ $products->product_quantity_alert }}" name="product_quantity_alert">
                            </div>
                            <div>
                                
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <br>
                            
                            <br>
                            

                        </form>
                    </div>
            </div>
        </div>






</div>







@section('delete_all')
    <script>
        $(document).ready(function(){
            $('#delete_all_btn').click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "category/all/delete";
                    }
                    })
            });

            $('#checked_all_btn').click(function(){

                $('.checked_all').attr('checked', 'checked');
            });

            $('#unchecked_all_btn').click(function(){

                $('.checked_all').removeAttr('checked', 'checked');
            });
        });

        
    </script>
@endsection

@endsection

