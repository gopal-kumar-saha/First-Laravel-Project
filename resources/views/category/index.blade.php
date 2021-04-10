@extends('layouts.starlight')

@section('title')
    Category
@endsection

@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Category</span>

      </nav>
@endsection

@section('category')
  active  
@endsection

@section('content')

<div class='container'>

    <div class="row">
        <div class="col-12">
            <div class="card text-white">
                <div class="card-header bg-success ">
                    <div class="row">
                        <div class="col-6">
                            All Category
                        </div>
                      
                       @if ($categories->count() != 0)
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-danger" id="delete_all_btn">Delete All</a>
                            </div>
                       @endif
                    </div>
                </div>

                @if (session('category_delete_status'))
                     <div class="alert alert-danger text-center">
                        {{ session('category_delete_status') }}
                    </div>
                @endif
                <div class="card-body">
                   
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Delete?</th>
                                <th scope="col">Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                            
                        
                        <tbody>
                            <form action="{{ route('check_delete') }}" method="POST">
                                @csrf

                             @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checked_all" name="check_category_id[]" value="{{ $category->id }}">
                                    </td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {{ $category->category_name }}</td>
                                    <td> {{ $category->created_at }}</td>
                                    <td> {{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('category/edit') }}/{{ $category->id}}" type="button" class="btn btn-info btn-sm">Edit</a>

                                        <a href="{{ url('category/delete') }}/{{ $category->id}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
        
                                </tr>

                             @empty 
                                <tr class="text-danger text-center">
                                    <td colspan="50"> No data is found</td>
                                </tr>
                             @endforelse

                        </tbody>

                       
                    </table>
                    <button type="button" class="btn btn-info" id="checked_all_btn">Checked All</button>
                    <button type="button" class="btn btn-secondary" id="unchecked_all_btn">Unchecked All</button>

                    <button type="submit" class="btn btn-danger" id="unchecked_all_btn">Checked Delete</button>

                    

                    </form>
                </div>
                </div>
            </div>







 <div class="col-8 mt-5">
            <div class="card text-white text-dark">
                <div class="card-header bg-warning ">
                    <div class="row">
                        <div class="col-6">
                            Deleted All Category
                        </div>
                      
                       @if ($deleted_categories->count() != 0)
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-danger" id="delete_all_btn">Delete All</a>
                            </div>
                       @endif
                    </div>
                </div>

    
                <div class="card-body">
                   
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                            
                        
                        <tbody>
                             @forelse ($deleted_categories as $deleted_category)
                                <tr>
                                
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {{ $deleted_category->category_name }}</td>
                                    <td> {{ $deleted_category->created_at }}</td>
                                    <td> {{ $deleted_category->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('category/restore') }}/{{ $deleted_category->id}}" type="button" class="btn btn-info btn-sm">Restore</a>

                                        <a href="{{ url('category/force_delete') }}/{{ $deleted_category->id}}" type="button" class="btn btn-danger btn-sm">Froce Delete</a>
                                    </td>
        
                                </tr>

                             @empty 
                                <tr class="text-danger text-center">
                                    <td colspan="50"> No data is found</td>
                                </tr>
                             @endforelse

                        </tbody>

                       
                        </table>
                </div>
                </div>
            </div>























                        <div class="col-4">
                            <div class="card text-white bg-secondary">
                                    <div class="card-header"> Insert Category</div>
                                    <div class="card-body">
                                    <form action="{{ 'category/post' }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" class="form-control"  placeholder="Enter category name" name="category_name" value="{{ old('category_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subcategory Name</label>
                                                <input type="text" class="form-control"  placeholder="Enter subcategory name" name="subcategory_name" value="{{ old('subcategory_name') }}">
                                            </div>
                                            <div>
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                            <br>
                                            
                                            <br>
                                            @if(session('category_insert_status'))
                                                <div class="alert alert-success">
                                                    {{ session('category_insert_status') }}
                                                </div>
                                            @endif

                                        </form>
                                    </div>
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

