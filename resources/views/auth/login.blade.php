@extends('layout.auth')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form action='{{route('login')}}' method='post' class="card auth_form">
            @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Log in</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input name='email' value='@if (Cookie::has('cookie_email'))
                        {{ Cookie::get('cookie_email') }}

                    @endif' type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    @error('password')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input @if (Cookie::has('cookie_password'))
                        value='{{ Cookie::get('cookie_password') }}'
                    @endif name='password' type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="checkbox">
                    <input @if (Cookie::has('cookie_password')) checked @endif name="rememberme" id="remember_me" class='form-check-input' type="checkbox">
                    <label for="remember_me">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>
                <div class="signin_with mt-3">
                    <p class="mb-0">or Sign Up using</p>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>

                </div>
                <div class="signin_with mt-3">
                    <a class="link" href="{{url('/register')}}">Register Now</a>
                </div>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>,
            <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In"/>
        </div>
    </div>
</div>
@stop
