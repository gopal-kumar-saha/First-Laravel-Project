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
                        <form action="http://themepresss.com/tf/html/tohoney/checkout">
                            <div class="row">
                                <div class="col-12">
                                    <p>Name *</p>
                                    <input type="text" value="{{ Auth::user()->name }}" >
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Country *</p>
                                    <select>
                                        <option value="">Bangladesh</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>City *</p>
                                    <select>
                                        <option value="">Dhaka</option>
                                    </select>
                                </div>                                
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Postcode/ZIP</p>
                                    <input type="email">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Town/City *</p>
                                    <input type="text">
                                </div>                     
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                        </form>
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
                                <input id="card" type="radio" name="payment_option">
                                <label for="card">Credit Card</label>
                            </li>
                            <li>
                                <input id="delivery" type="radio" name="payment_option">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button>Place Order</button>
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