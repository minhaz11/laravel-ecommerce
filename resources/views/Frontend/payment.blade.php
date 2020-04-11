@extends('layouts.frontendLayout')
@section('title')
    Payment Info
@endsection

@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Price</th>
                        <th class="column-4 p-l-5">Quantity</th>
                        <th class="p-r-35">Total</th>

                    </tr>
                    @foreach ($getCartContents as $item)
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="{{asset('uploads/product_image')}}/{{$item->attributes->productImage}}" alt="IMG-PRODUCT">
                            </div>
                        </td>
                    <td class="column-2">{{$item->name}}</td>
                    <td class="column-3">${{$item->price}}</td>
                    <td class="column-4">{{$item->quantity}}</td>
                    <td class="p-r-75">${{$item->price*$item->quantity}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm m-b-30">
            <div class="flex-w flex-m w-full-sm">
            <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                <a href="{{ route('payment') }}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Pay with Paypal</a>
            </div>
            <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                <a href="" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Cash On Delivery</a>
            </div>

            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <p class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4">
                    Sub total : ${{$getSubTotal}}
                </p>
            </div>
        </div>

        {{-- <div class="size15 trans-0-4 text-center">
            <!-- Button -->

        </div> --}}

    </div>
</section>
@endsection
