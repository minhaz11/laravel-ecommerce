@extends('layouts.frontendLayout')
@section('title')
    Oreder Confirmed
@endsection

@section('content')
<div class="container align-item-center" style="margin:150px 50px 150px 90px">
<div class="card">
    <div class="card-body">
    <img class="card-img-top" src="{{asset('Frontend/images/order.jpg')}}" alt="Card image cap">
      <h5 class="card-title"> </h5>
      {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
      <div class="size10 trans-0-4 m-t-10 m-b-10 m-auto ">
      <a class="flex-c-m sizefull bg1  hov1 s-text1 trans-0-4" href="{{route('index')}}">Home</a>
      </div>
    </div>
  </div>
</div>
  @endsection
