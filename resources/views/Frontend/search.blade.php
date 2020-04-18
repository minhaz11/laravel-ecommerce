
@extends('layouts.frontendLayout')
@section('title')
  Search Results
@endsection

@section('content')


<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image:url('{{asset('Frontend')}}/images/4.jpg');" >
    <h2 class="l-text2 t-center text-dark">
        Search Results
    </h2>
    <p class="m-text13 t-center">
    </p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categories
                    </h4>

                    <ul class="p-b-54">
                        @foreach ($categories as $item)
                        <li class="p-t-4">
                            <a href="{{route('cat_product',['id'=> $item->id])}}" class="s-text13 active1">
                                {{$item->categoryName}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                <div class="flex-sb-m flex-w p-b-35">
                    <span class="s-text8 p-t-5 p-b-5">
                        Showing results of searched products....
                    </span>
                <div class="search-product pos-relative bo4 of-hidden">
                    <form action="{{route('searchProduct')}}" method="POST">
                        @csrf
                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                        <button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                </div>

                <!-- Product -->
                <div class="row">
                    @foreach ($product as $pd)
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="{{asset('uploads/product_image')}}/{{$pd->productImage}}" alt="IMG-PRODUCT" >

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                    <form action="{{route('add_to_cart',['id'=>$pd->id])}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_quantity" value="1">
                                        <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{{route('productDetails', ['id'=>$pd->id])}}" class="block2-name dis-block s-text3 p-b-5" style="text-transform:uppercase">
                                    {{$pd->productName}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    ${{$pd->Price}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26">
                    {{-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a> --}}
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

 @endsection



<!-- Title Page -->

