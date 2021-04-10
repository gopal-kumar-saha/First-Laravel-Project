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
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            
                            {{-- {{ App\Models\Featured_Photo::where('product_id', $product_info->id)->get() }} --}}
                            @foreach (App\Models\Featured_Photo::where('product_id', $product_info->id)->get() as $featured_photo)
                                 <div class="item">
                                    <img src="{{ asset('uploads/featured_photos') }}/{{ $featured_photo->featured_photo_name }}" alt="">
                                </div>
                            @endforeach
                           
                            
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                           @foreach (App\Models\Featured_Photo::where('product_id', $product_info->id)->get() as $featured_photo)
                                 <div class="item">
                                    <img src="{{ asset('uploads/featured_photos') }}/{{ $featured_photo->featured_photo_name }}" alt="">
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $product_info->product_name }}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{ $product_info->product_price }}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{ $product_info->product_short_description }}</p>
                            <form action="{{ route('AddToCart', $product_info->id) }}" method="POST">
                                @csrf
                                <ul class="input-style">
                                    <li class="quantity cart-plus-minus">
                                        <input type="text" value="1" name="quantity" />
                                    </li>
                                    {{-- <li><a href="cart.html">Add to Cart</a></li> --}}
                                    <button class="btn btn-danger">Add to Cart</button> 
                                </ul>
                            </form>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">{{ App\Models\Category::find($product_info->category_id)->category_name }}</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{ $product_info->product_long_description }} </p>
                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">

                                @foreach ($products as $product)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5><button data-toggle="collapse" data-target="#collapseOne{{ $product->id }}" aria-expanded="true" aria-controls="collapseOne">{{ $product->product_name }}</button> </h5>
                                        </div>
                                        <div id="collapseOne{{ $product->id }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                {{ $product->product_long_description }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets/images/comment/1.png') }}" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">GERALD BARNES</a></h3>
                                            <span>27 Jun, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets/images/comment/2.png') }}" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Olive Oil</a></h3>
                                            <span>15 may, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="{{ asset('tohoney_assets/images/comment/3.png') }}" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Nature Honey</a></h3>
                                            <span>14 janu, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>How Many Stars?</td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" placeholder="Your name here..." />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" placeholder="Your Email here..." />
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($related_products as $related_product)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="featured-product-wrap">
                        <div class="featured-product-img">
                            <img src="{{ asset('tohoney_assets/images/product/1.jpg') }}" alt="">
                        </div>


                        <div class="featured-product-content">
                            <div class="row">
                                <div class="col-7">
                                    <h3><a href="shop.html">{{ $related_product->product_name }}</a></h3>
                                    <p>${{ $related_product->product_price }}</p>
                                </div>
                                <div class="col-5 text-right">
                                    <ul>
                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="badge badge-info">
                        <h4 class="text-center">There is no related product</h4>
                    </div>
                
                @endforelse
                
              
            </div>
        </div>
    </div>
    <!-- featured-product-area end -->
    @endsection