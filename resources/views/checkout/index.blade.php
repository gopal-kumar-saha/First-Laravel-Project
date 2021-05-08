@extends('layouts.tohoney')

@section('body')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

@auth
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>
                            Billing Details. ( You are logged as:{{ Auth::user()->name }} )
                        </h3>
                        <form id="main_form" action="{{ url('checkout/post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <p>Name *</p>
                                    <input type="text" value="{{ Auth::user()->name }}" name="customer_name" >
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" value="{{ Auth::user()->email }}" name="customer_email">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="customer_phone">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Country *</p>
                                    <select id="country_list" name="customer_country_id">
                                        <option value="">--Select One--</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>City *</p>
                                    <select id="city_list" name="customer_city_id">
                                        <option value="">--Select One --</option>
                                    </select>
                                </div>
                                <br>                                
                                <br>                                
                                <br>                                
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="customer_address">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Postcode/ZIP</p>
                                    <input type="text" name="customer_postal_code">
                                </div>
                                                    
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
    
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                        <ul class="total-cost"> 
                            <li>Coupon Name <span class="pull-right">{{ (session('coupon_name')) ? session('coupon_name'):"Not Applicable" }}</span></li>
                            <li>Subtotal <span class="pull-right"><strong>${{ session('subtotal') }}</strong></span></li>
                            <li>Discount <span class="pull-right"><strong>{{ session('discount') }}%</strong></span></li>
                            <li>Discount Amount <span class="pull-right"><strong>${{ session('discount_amount') }}</strong></span></li>
                            <li>Shipping <span class="pull-right">Free</span></li>
                            <li>Total<span class="pull-right">${{ session('total') }}</span></li>
                        </ul>
                        <ul class="payment-method">                            
                            <li>
                                <input type="radio" name="payment_option" value="1" checked>
                                <label for="card">Credit Card</label>
                            </li>
                            <li>
                                <input type="radio" name="payment_option" value="2">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button type="button" id="form_submit">Place Order</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area End --> 
@else
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <div class="alert alert-danger">
                            You are not logged in.
                            <br>
                            if you have an already account.please <a href="{{ url('customer/login') }}">log in...</a>
                            <br>
                            if you have not an account.please <a href="{{ url('customer/register') }}">Register...</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endauth
    
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('#country_list').select2();
            $('#city_list').select2();

            $('#country_list').change(function(){
                var country_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url : 'get/city/list',
                    data : {country_id:country_id},
                    success : function(data){
                        $('#city_list').html(data)
                    }
                });
            });
            $('#form_submit').click(function(){
                
                var input_value = $("input[name='payment_option']:checked").val();
            
                if(input_value == 1){
                    $('#main_form').attr('action','http://127.0.0.1:8000/pay');
                    
                }
                else{
                    $('#main_form').attr('action','http://127.0.0.1:8000/checkout/post');
                   
                }
                $('#main_form').submit();
            });
        });
    </script>
@endsection