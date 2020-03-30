@extends('layouts.frontendLayout')
@section('title')
    Sign Up
@endsection

@section('content')
<div class="page-wrapper  p-t-180 p-b-100 font-poppins">
<div class="wrapper wrapper--w780">
    <div class="card card-3">
        <div class="card-heading"></div>
        <div class="card-body">
            <h2 class="title">Registration Info</h2>
        <form method="POST" action="{{route('store')}}">
                @csrf
                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Name" name="name">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Last Name" name="last_name">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="email" placeholder="Email" name="email">
                </div>

                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Phone" name="phone">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="password" placeholder="Password" name="pwd">
                </div>
                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Address" name="address">
                </div>
                <div class="p-t-10">
                    <button class="btn btn--pill btn--green" type="submit">Submit</button>
                </div>
                <div class="p-t-10">
                   <a href=""><p class=""><small>Already have an account?</small></p></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
