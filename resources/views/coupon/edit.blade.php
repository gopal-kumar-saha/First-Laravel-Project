@extends('layouts.starlight')

@section('title')
    Coupon
@endsection


@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Update Coupon</span>

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
                        <h3> Update Coupon</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Name</label>
                                <input type="text" class="form-control"  value="{{ $coupon->coupon_name }}" name="coupon_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount Amount</label>
                                <input type="text" class="form-control"  value="{{ $coupon->discount_amount }}" name="discount_amount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Limit</label>
                                <input type="text" class="form-control"  value="{{ $coupon->uses_limit }}" name="uses_limit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Expired Date</label>
                                <input type="date" class="form-control" value="{{ $coupon->expired_date }}" name="expired_date">
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