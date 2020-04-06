@extends('layouts.frontendLayout')
@section('title')
    Shipping Info
@endsection

@section('content')
<div class="page-wrapper  p-t-180 p-b-100 font-poppins">
<div class="wrapper wrapper--w780">
    <div class="card card-3">
        <div class="card-heading"></div>
        <div class="card-body">
            <h2 class="title">Shipping Info</h2>
        <form method="POST" action="{{route('storeShippingInfo')}}">
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
                    <textarea class="input--style-3 form-control"  placeholder="Address" name="Address" cols="50" rows="3">{{$customer->address}}</textarea>
                </div>
                <div class="p-t-10">
                    <button class="btn btn--pill btn--green" type="submit">Procced Next</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
