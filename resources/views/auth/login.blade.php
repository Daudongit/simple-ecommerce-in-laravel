@extends('layout')
@section('title','Login Page')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            @include('pertial.flash')
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form  action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="email" placeholder="Email" 
                                name="email" value="{{ old('email') }}" required autofocus/>
                            <input type="password" placeholder="password" name="password" required/>
                            <span>
                                <input type="checkbox" class="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                    Keep me signed in
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </span>
                            <div class="login-btn">
                                <button type="submit" class="btn btn-default">
                                    Login
                                </button>
                                <a  class="btn btn-primary" href="{{route('guestCheckout.index')}}">Check Out As Guest</a>
                            </div>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus/>
                            <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required/> 
                            <input type="password" placeholder="Password" name="password" required/>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" required/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection