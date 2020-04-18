@extends('layouts.frontendLayout')
@section('title')
    Shipping Info
@endsection

@section('content')
<link href="{{asset('customer')}}/form.css" rel="stylesheet">
<div class="container m-auto">
    <div class="form">
      <div class="wrapper">
        <form method="POST" action="{{route('storeShippingInfo')}}">
            <h2 class="title">Shipping Info</h2> <br>
                @csrf
                <div class="input-group">
                <input class="input--style-3" type="text" placeholder="Full Name" name="name" value="{{$customer->name.' '.$customer->last_name}}">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="email" placeholder="Email" name="email" value="{{$customer->email}}">
                </div>

                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Phone" name="phone" value="{{$customer->phone}}">
                </div>
                <div class="input-group">
                    <input class="input--style-3"  placeholder="Address" name="Address" cols="50" rows="3" value="{{$customer->address}}">
                </div>
                    <button class="input--style-3" type="submit">Procced Next</button>
            </form>
      </div>
    </div>
</div>
@endsection
