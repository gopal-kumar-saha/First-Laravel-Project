@extends('layouts.tohoney')

@section('body')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('UpdateCart') }}" method="POST">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $flag=false;
                                    $Subtotal =0;
                                @endphp
                                @forelse ($carts as $cart)
                                <tr>
                                    <td class="images"><img src="{{ asset('uploads/product_photos/'.$cart->relationtoproducttable->product_photo) }}" alt=""></td>
                                    <td class="product">
                                        <a href="{{ route('ProductInfo',$cart->relationtoproducttable->id ) }}">
                                            {{ $cart->relationtoproducttable->product_name }}
                                        </a>
                                        <span class="badge badge-danger"> Available Stock: {{ $cart->relationtoproducttable->product_quantity }}</span>
                                        @if ($cart->relationtoproducttable->product_quantity<$cart->product_quantity)
                                            @php
                                                $flag=true;
                                            @endphp
                                        @endif
                                    </td>
                                   
                                    <td class="ptice">${{ $cart->relationtoproducttable->product_price }}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" value="{{ $cart->product_quantity }}" name="quantity[{{ $cart->id }}]" />
                                    </td>
                                    <td class="total">${{ $cart->relationtoproducttable->product_price * $cart->product_quantity }}</td>
                                    @php
                                        $Subtotal += $cart->relationtoproducttable->product_price * $cart->product_quantity;
                                    @endphp
                                    <td class="remove">
                                        {{-- <i class="fa fa-times"></i> --}}
                                        <a href="{{ route('CartDelete',$cart->id)}}"> <i class="fa fa-times"></i> </a>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td>
                                        <span class="badge badge-danger">No Product to show</span>    
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                                        <li><a href="shop.html">Continue Shopping</a></li>
                                    </ul>

                                    @if (session('date_error'))
                                        <div class="alert alert-danger m-auto">
                                            {{ session('date_error') }}
                                        </div>
                                    @endif

                                    @if (session('coupon_error'))
                                        <div class="alert alert-danger m-auto">
                                            {{ session('coupon_error') }}
                                        </div>
                                    @endif

                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" placeholder="Cupon Code" id="apply_coupon_input" value="{{ $coupon_name }}">
                                        <button type="button" id="apply_coupon_btn">Apply Cupon</button>
                                    </div>                                    
                                </div>                               
                            </div>

                           <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{ $Subtotal }}</li>
                                        <li><span class="pull-left">Discount </span>{{ $discount_amount }}%</li>
                                        <li><span class="pull-left">Discount(in amount) </span>${{ ($discount_amount/100)* $Subtotal}}</li>
                                        <li><span class="pull-left"> Total </span> ${{ $Subtotal - (($discount_amount/100)* $Subtotal) }}</li>
                                    </ul>
                                    @php
                                        session([
                                            'coupon_name' => $coupon_name,
                                            'subtotal' => $Subtotal,
                                            'discount' => $discount_amount,
                                            'discount_amount' => ($discount_amount/100)* $Subtotal,
                                            'total' => $Subtotal - (($discount_amount/100)* $Subtotal),
                                        ]);
                                    @endphp


                                    @if ($flag)
                                        <a href="#"> problem ase</a>
                                    @else 
                                        <a href="{{ route('Checkout') }}">Proceed to Checkout</a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection


@section('footer_scripts')
        <script>
            $(document).ready(function (){
                
                $('#apply_coupon_btn').click(function (){                   
                    var coupon_name = $('#apply_coupon_input').val();
                    var link_to_go = "{{ url('cart/details') }}/" + coupon_name;
                    window.location.href = link_to_go;
                });
            });
        </script>
@endsection


{{-- $('#apply_coupon_btn').click(function (){
                    var coupon_name = $('#apply_coupon_input').val();
                    var link_to_go = "{{ route('CartWithCoupon') }}/" + coupon_name;
                    window.location.href = link_to_go;
                }); --}}
