@extends('layouts.frontendLayout')
@section('title')
   confirm shipping
@endsection

@section('content')
<div class="container align-item-center" style="margin:150px 50px 150px 90px">
    {{-- <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <div class="size10 trans-0-4 m-t-10 m-b-10">
              <a href="#" class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4">Go somewhere</a></div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <div class="size10 trans-0-4 m-t-10 m-b-10">
              <a href="#" class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4">Go somewhere</a> </div>
            </div>
          </div>
        </div>
      </div> --}}
<div class="row">
    <div class="col-sm-6">
      <div class="card" style="width: 25em; margin-left:90px">
      <img class="card-img-top" src="{{asset('Frontend/images/cart.png')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Add More Product</h5>
          <p class="card-text">Missed something? Don't worry just click the below button and add more product as you desire.</p>
          <div class="size10 trans-0-4 m-t-10 m-b-10">
          <a href="{{route('index')}}" class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4">Add more</a> </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card" style="width: 25rem; margin-left:60px">
        <img class="card-img-top" src="{{asset('Frontend/images/Deliver.webp')}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text">Looks like you added all your desired product. Congratulation!! Just provide your shipping address and we are ready to deliver to your door.</p>
          <div class="size10 trans-0-4 m-t-10 m-b-10">
          <a href="{{route('shippingInfo')}}" class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4">Procced Shipping</a> </div>
        </div>
      </div>
    </div>
</div>
</div>


@endsection
