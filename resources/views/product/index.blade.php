@extends('layouts.starlight')

@section('title')
    Product
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Product</span>

      </nav>
@endsection

@section('product')
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

                             @forelse ($products as $product)
                                <tr>
                                    {{-- <td>
                                        <input type="checkbox" class="checked_all" name="check_category_id[]" value="{{ $category->id }}">
                                    </td> --}}
                                    <td>{{ $loop->index + 1 }}</td> 
                                    
                                    <td> {{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                    <td> {{ App\Models\User::find($product->user_id)->name }}</td>

                                    <td> {{ $product->product_name }}</td>
                                    <td> {{ $product->product_price }}</td>
                                    <td> {{ $product->product_quantity }}</td>
                                    <td> {{ $product->product_short_description }}</td>


                                    <td> {{ $product->product_long_description }}</td>
                                    <td> {{ $product->product_quantity_alert }}</td>

                                    <td> 
                                        <img src="{{ asset('uploads/product_photos/'.$product->product_photo) }}" alt="product photo" width="100" height="100">
                                    </td>
                                   
                                   

                                    <td>
                                        <a href="edit/product/{{ $product->id }}" type="button" class="btn btn-info btn-sm">Edit</a>
                                        <a href="delete/product/{{ $product->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>

                                </tr>

                             @empty 
                                <tr class="text-center">
                                    <td colspan="50" class="text-danger"> No data is found</td>
                                </tr>
                             @endforelse

                        </tbody>

                        </form>
                    </table>

                    
                </div>
                </div>
            </div>
    </div>












     <div class="row mt-3">
        <div class="col-12">
            <div class="card text-white">
                <div class="card-header bg-info ">
                    <div class="row">
                        <div class="col-12 text-center">
                           <h3>All Deleted Products</h3>
                        </div>
                    </div>
                </div>

               
                <div class="card-body">
                   
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Short Description</th>
                                <th scope="col">Product Long Description</th>
                                <th scope="col">Product Alert Quantity</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                            
                        
                        <tbody>
                            <form action="{{ route('check_delete') }}" method="POST">
                                @csrf

                             @forelse ($soft_deleted_products as $soft_deleted_product)
                                <tr>
                                    {{-- <td>
                                        <input type="checkbox" class="checked_all" name="check_category_id[]" value="{{ $category->id }}">
                                    </td> --}}
                                    <td>{{ $loop->index + 1 }}</td>
                                    
                                    <td> {{ App\Models\Category::find($soft_deleted_product->category_id)->category_name }}</td>

                                    <td> {{ $soft_deleted_product->product_name }}</td>
                                    <td> {{ $soft_deleted_product->product_price }}</td>
                                    <td> {{ $soft_deleted_product->product_quantity }}</td>
                                    <td> {{ $soft_deleted_product->product_short_description }}</td>


                                    <td> {{ $soft_deleted_product->product_long_description }}</td>
                                    <td> {{ $soft_deleted_product->product_quantity_alert }}</td>
                                   
                                    <td> {{ $soft_deleted_product->created_at }}</td>
                                    <td> {{ $soft_deleted_product->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('restoreProduct', $soft_deleted_product->id) }}" type="button" class="btn btn-info btn-sm">Restore</a>
                                        <a href="{{ route('forceDelete', $soft_deleted_product->id) }}" type="button" class="btn btn-danger btn-sm">Force_Delete</a>
                                    </td>

                                </tr>

                             @empty 
                                <tr class="text-center">
                                    <td colspan="50" class="text-danger"> No data is found</td>
                                </tr>
                             @endforelse

                        </tbody>

                        </form>
                    </table>

                    
                </div>
                </div>
            </div>
    </div>






<div class="col-6 mt-3">
            <div class="card text-white bg-secondary">
                    <div class="card-header text-center">
                        <h3> Insert Product</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('ProductPosT') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" class="form-control"  placeholder="Enter Product name" name="product_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Price</label>
                                <input type="text" class="form-control"  placeholder="Enter Product Price" name="product_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Quantity</label>
                                <input type="text" class="form-control"  placeholder="Enter Product Quantity" name="product_quantity">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Short Description</label>
                                <textarea cols="40" rows="3" name="product_short_description" placeholder="Enter Product Short Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Long Description</label>
                                <textarea cols="40" rows="5" name="product_long_description" placeholder="Enter Product long Description"></textarea>                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Alert Quantity</label>
                                <input type="text" class="form-control"  placeholder="Enter Product Alert Quantity" name="product_quantity_alert">
                            </div>
                            <div class="form-group">
                                <label>Product Photo</label>
                                <input type="file" class="form-control" name="product_photo">
                            </div>

                            <div class="form-group">
                                <label>Product Featured Photos</label>
                                <input type="file" class="form-control" name="product_featured_photos[]" multiple>
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

