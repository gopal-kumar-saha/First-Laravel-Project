@extends('layouts.tohoney')

@section('body')

        <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->


<!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane active">
                    <ul class="row">
                        @foreach ($products as $product)
                           @include('little_parts.product_list')
                        @endforeach
                                               
                        <li class="col-12 text-center">
                            <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- product-area end -->

@endsection