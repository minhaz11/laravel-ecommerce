@extends('layouts.frontendLayout')
@section('title')
Home Page
@endsection

@section('content')

<!-- Slide1 -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach ($slides as $item)
            <div class="item-slick1 item1-slick1"
                style="background-image: url({{asset('uploads/product_image')}}/{{$item->products->productImage}});">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                        data-appear="fadeInDown" style="color:#ff971d; font-size:30px; font-weight:600">
                        Choose Your Desired Shoes
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp"
                        style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,0.6558998599439776) 50%, rgba(252,176,69,1) 100%); border-radius:10px">
                        With Our New arrivals
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="{{route('allProducts')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4" style="background-color: #8EC5FC;
                        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
                        ">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Categories
            </h3>
        </div>
        <div class="row ">
            @foreach ($categories as $cat)
            <div class="col-sm-12 col-md-8 col-lg-4  m-l-r-auto">

                <!-- block2 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30" style="border-radius:10px">
                    <img src="{{asset('uploads/category_image')}}/{{$cat->categoryImage}}" alt="IMG-BENNER" style="width:512px; height:288px;">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="{{route('cat_product',['id'=> $cat->id])}}"
                            class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" style="background-color: #8EC5FC;
                            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
                            " >
                            {{$cat->categoryName}}
                        </a>
                    </div>
                </div>

            </div>

            @endforeach

        </div>
    </div>
</section>

<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Featured Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach ($featured as $item)
                <div class="item-slick2 p-l-15 p-r-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <img src="{{asset('uploads/product_image')}}/{{$item->products->productImage}}"
                                alt="IMG-PRODUCT" style="height:350px">

                            <div class="block2-overlay trans-0-4">
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button -->
                                <form action="{{route('add_to_cart',['id'=>$item->products->id])}}" method="POST">
                                    @csrf
                                   <input type="hidden" name="product_quantity" value="1">
                                   <button type="submit"  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                        Add to Cart
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="{{route('productDetails',['id'=>$item->product_id])}}"
                                class="block2-name dis-block s-text3 p-b-5">
                                {{$item->products->productName}}
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                ${{$item->products->Price}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<!-- Banner2 -->

<!-- Blog -->
<section class="blog bgwhite p-t-45 p-b-50">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Our Services
            </h3>
        </div>

        <div class="row">
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="{{asset('Frontend/images')}}/del.jpg" alt="IMG-BLOG" style="width:400px;height:220px">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                Fast Delivery
                            </a>
                        </h4>
                        <p class="s-text8 p-t-16">
                            We Provide the fastest delivery as possible. Just order and stay be ralaxed. We will knock at your door as soon as possible.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="{{asset('Frontend')}}/images/money-back.png" alt="IMG-BLOG" style="width:400px;height:220px">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                30 Day's money back gurranty
                            </a>
                        </h4>
                        <p class="s-text8 p-t-16">
                            You can have confidence in how quickly we will refund your money
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                        <img src="{{asset('Frontend')}}/images/cs.jpg" alt="IMG-BLOG" style="width:400px;height:220px">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="blog-detail.html" class="m-text11">
                                24/7 Customer care service
                            </a>
                        </h4>
                        <p class="s-text8 p-t-16">
                            Our team are always here to help, 24 hours a day, 7 days a week
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram -->
<section class="instagram p-t-20">
    <div class="sec-title p-b-52 p-l-15 p-r-15">
        <h3 class="m-text5 t-center">
            @ follow us on Instagram
        </h3>
    </div>

    <div class="flex-w">
        <!-- Block4 -->
        <div class="block4 wrap-pic-w">
            <img src="{{asset('Frontend')}}/images/gallery-03.jpg" alt="IMG-INSTAGRAM">

            <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in
                        tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus
                        elit.
                    </p>

                    <span class="s-text9">
                        Photo by @nancyward
                    </span>
                </div>
            </a>
        </div>

        <!-- Block4 -->
        <div class="block4 wrap-pic-w">
            <img src="{{asset('Frontend')}}/images/gallery-07.jpg" alt="IMG-INSTAGRAM">

            <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in
                        tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus
                        elit.
                    </p>

                    <span class="s-text9">
                        Photo by @nancyward
                    </span>
                </div>
            </a>
        </div>

        <!-- Block4 -->
        <div class="block4 wrap-pic-w">
            <img src="{{asset('Frontend')}}/images/gallery-09.jpg" alt="IMG-INSTAGRAM">

            <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in
                        tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus
                        elit.
                    </p>

                    <span class="s-text9">
                        Photo by @nancyward
                    </span>
                </div>
            </a>
        </div>

        <!-- Block4 -->
        <div class="block4 wrap-pic-w">
            <img src="{{asset('Frontend')}}/images/gallery-13.jpg" alt="IMG-INSTAGRAM">

            <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in
                        tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus
                        elit.
                    </p>

                    <span class="s-text9">
                        Photo by @nancyward
                    </span>
                </div>
            </a>
        </div>

        <!-- Block4 -->
        <div class="block4 wrap-pic-w">
            <img src="{{asset('Frontend')}}/images/gallery-15.jpg" alt="IMG-INSTAGRAM">

            <a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
                <span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
                    <i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
                    <span class="p-t-2">39</span>
                </span>

                <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                    <p class="s-text10 m-b-15 h-size1 of-hidden">
                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in
                        tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget metus
                        elit.
                    </p>

                    <span class="s-text9">
                        Photo by @nancyward
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Shipping -->
{{-- <section class="shipping bgwhite p-t-62 p-b-46">
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Free Delivery Worldwide
            </h4>

            <a href="#" class="s-text11 t-center">
                Click here for more info
            </a>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                30 Days Return
            </h4>

            <span class="s-text11 t-center">
                Simply return it within 30 days for an exchange.
            </span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Store Opening
            </h4>

            <span class="s-text11 t-center">
                Shop open from Monday to Sunday
            </span>
        </div>
    </div>
</section> --}}



@endsection
