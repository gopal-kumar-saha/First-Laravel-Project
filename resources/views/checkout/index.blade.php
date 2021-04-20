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
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <form action="http://themepresss.com/tf/html/tohoney/checkout">
                            <div class="row">
                                <div class="col-12">
                                    <p>Name *</p>
                                    <input type="text">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email">
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
                            <li>Pure Nature Honey <span class="pull-right">$139.00</span></li>
                            <li>Your Product Name <span class="pull-right">$100.00</span></li>
                            <li>Pure Nature Honey <span class="pull-right">$141.00</span></li>
                            <li>Subtotal <span class="pull-right"><strong>$380.00</strong></span></li>
                            <li>Shipping <span class="pull-right">Free</span></li>
                            <li>Total<span class="pull-right">$380.00</span></li>
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

@endsection