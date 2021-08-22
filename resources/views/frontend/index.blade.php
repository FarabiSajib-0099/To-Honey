@extends('layouts.frontend_app')
@section('frontend_content')
    
  <!-- slider-area start -->
  <div class="slider-area slider-area3">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner slide-inner4">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-12">
                                <div class="slider-content slider-content3">
                                    <h2>Amazing Pure Nature Hohey</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner7">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-12">
                                <div class="slider-content slider-content3">
                                    <h2>Pure Nature Coconut Oil</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner8">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-9 col-12">
                                <div class="slider-content slider-content3">
                                    <h2>Amazing Pure Nut Oil</h2>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
<div class="featured-area featured-sub">
    <div class="container">
        <div class="row grid ">
            @foreach ($active_categories as $active_category)

            <div class="col-lg-4 items col-md-6 col-sm-6 col-12">
              
                <div class="featured-wrap">
                    <div class="featured-img">
                        <img src="{{asset('uploads/categroypic/')}}/{{$active_category->category_photo}}" alt="">
                        <div class="featured-content">
                            <a href="shop.html">{{$active_category->cat_name}}</a>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach 

          
        </div>
       
    </div>
</div>
</div>
<!-- featured-area end -->
<!-- start count-down-section -->
<div class="count-down-area count-down-area-sub">
    <section class="count-down-section section-padding parallax" data-speed="7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
</div>
<!-- end count-down-section -->
<!-- product-area start -->
<div class="product-area product-area-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller</h2>
                    <img src="{{asset('frontend_assets')}}/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
      
         @for ($i = 0; $i < 4; $i++)
         <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="product-wrap">
                <div class="product-img">
                    <img src="{{asset('frontend_assets')}}/images/product/1.jpg" alt="">
                    <div class="product-icon flex-style">
                        <ul>
                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <h3><a href="single-product.html">Nature Honey</a></h3>
                    <p class="pull-left">$125
                        <del>$156</del>
                    </p>
                    <ul class="pull-right d-flex">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                    </ul>
                </div>
            </div>
        </li>  
         @endfor
            
        </ul>
    </div>
</div>
<!-- product-area end -->
<!-- banner-area start -->
<div class="banner-area bg-img-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 col-md-8 offset-md-4">
                <div class="banner-wrap">
                    <p>Woman Headband Collection</p>
                    <h2>upto<span>50%</span> Off</h2>
                    <a href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area end -->
<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="{{asset('frontend_assets')}}/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
           @foreach ($active_products as $active_product)
           <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
            <div class="product-wrap">
                <div class="product-img">
                    <span>New</span>
                    <img src="{{asset('uploads/productphotos')}}/{{$active_product->product_thumbnail_photo}}" alt="">
                    <div class="product-icon flex-style">
                        <ul>
                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <h3><a href="{{url('product/details')}}/{{$active_product->slug}}">{{$active_product->product_name}}</a></h3>
                    <p class="pull-left">${{$active_product->product_price}}
                        <del>$156</del>
                    </p>
                    <ul class="pull-right d-flex">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                    </ul>
                </div>
            </div>
        </li>
           @endforeach
          

            <li class="col-12 text-center">
                <a class="loadmore-btn" href="javascript:void(0);">View All Items</a>
            </li>
        </ul>
    </div>
</div>
<!-- product-area end -->
{{-- <!-- testmonial-area start -->
<div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h2>What Our client Says</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="testmonial-active owl-carousel">
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{asset('frontend_assets')}}/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{asset('frontend_assets')}}/images/test/1.png" alt="">
                        </div>
                    </div>
                    <div class="test-items test-items2">
                        <div class="test-content">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                            <h2>Elizabeth Ayna</h2>
                            <p>CEO of Woman Fedaration</p>
                        </div>
                        <div class="test-img2">
                            <img src="{{asset('frontend_assets')}}/images/test/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testmonial-area end -->
<!-- start social-newsletter-section -->
<section class="social-newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter text-center">
                    <h3>Subscribe  Newsletter</h3>
                    <div class="newsletter-form">
                        <form>
                            <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- end social-newsletter-section --> --}}

@endsection
  