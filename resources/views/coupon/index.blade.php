@extends('layouts.starlight')

@section('title')
    Coupon
@endsection


@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Coupon</span>

      </nav>
@endsection


@section('coupon') 
  active
@endsection


@section('content')
    <div class='container'>
        <div class="col-6 mt-3 m-auto">
            <div class="card text-white bg-secondary">
                    <div class="card-header text-center">
                        <h3> Add Coupon</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Name</label>
                                <input type="text" class="form-control"  placeholder="Enter Coupon name" name="coupon_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount Amount</label>
                                <input type="text" class="form-control"  placeholder="Enter Discount Amount" name="discount_amount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Limit</label>
                                <input type="text" class="form-control"  placeholder="Enter User Limit" name="uses_limit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Expired Date</label>
                                <input type="date" class="form-control"  placeholder="Enter Expired Date" name="expired_date">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <br>
                            
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-9 mt-3">
            <div class="card text-white text-dark">
                <div class="card-header bg-warning ">
                    <div class="row">
                        <div class="col-9 m-auto">
                             All Coupon
                        </div>
                      
                       {{-- @if ($deleted_categories->count() != 0)
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-danger" id="delete_all_btn">Delete All</a>
                            </div>
                       @endif --}}
                    </div>
                </div>

    
                <div class="card-body">
                   
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Coupon Name</th>
                                <th scope="col">Discount Amount</th>
                                <th scope="col">User Limit</th>
                                <th scope="col">Expired Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                            
                        
                        <tbody>
                             @forelse ($coupons as $coupon)
                                <tr>
                                
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {{ $coupon->coupon_name }}</td>
                                    <td> {{ $coupon->discount_amount }}</td>
                                    <td> {{ $coupon->uses_limit }}</td>
                                    <td> {{ $coupon->expired_date }}</td>
                                    <td> 
                                        <a href="{{ route('coupon.edit',$coupon->id) }}" class="btn btn-info">Edit</a>

                                        <form action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
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
        </div>

    
    </div>

@endsection