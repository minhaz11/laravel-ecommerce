@extends('layouts.frontendLayout')
@section('title')
    Sign Up
@endsection

@section('content')
{{-- <div class="page-wrapper  p-t-180 p-b-100 font-poppins">
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
</div> --}}
<link href="{{asset('customer')}}/form.css" rel="stylesheet">
<section>
    <div class="container">

        <div class="form sign-in-form ">
          <div class="wrapper">
          <form action="{{route('store')}}" method="POST">
              <h1>Sign up</h1>
              <p>Please, provide all the correct info to create an account</p>
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
              <button type="submit">Sign Up</button>
            </form>
          </div>
        </div>
        <div class="form sign-up-form active ">

          <div class="wrapper">
            <form action="{{route('login_customer')}}" method="POST">
                @csrf
              <h1>Sign In</h1>

              @if (session('error'))
              <div class="alert alert-danger" role="alert">
                      <small>{{session('error')}}</small>
              </div>
              @else
              <p>use your email and password to sign in</p>
              @endif

              <div class="input-group">
                <input class="input--style-3" type="email" placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <input class="input--style-3" type="password" placeholder="Password" name="pwd">
            </div>
              <button type="submit">Sign In</button>
            </form>
          </div>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-left">
              <h1>Please, Log In</h1>
              <p>or</p>
              <button id="signInButton">Create Account</button>
            </div>
            <div class="overlay-right">
              <h1>Create Account </h1>
              <p>or</p>
              <button id="signUpButton">Log In</button>
            </div>
          </div>
        </div>
      </div>





  </section>
@endsection
