@extends('layout.auth')
@section('title', 'Forget Password')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        @if (session()->has('status'))
            <div data-notify="container" class="bootstrap-notify-container alert alert-dismissible alert-success animated fadeInDown" role="alert" data-notify-position="bottom-left" style="padding-top: 14px; display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; left: 20px;">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="padding-top: 12px; position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button>
                <span data-notify="icon"></span>
                <span data-notify="title"></span>
                <span data-notify="message">{{ session()->get('status') }}</span>
                <a class='close' href="#" target="_blank" data-notify="url"></a>
            </div>
        @endif
        <form action='{{ route('password.request') }}' method="POST" class="card auth_form">
            @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Forgot Password?</h5>
                <span>Enter your e-mail address below to reset your password.</span>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SUBMIT</button>
                <div class="signin_with mt-3">
                    <a href="javascript:void(0);" class="link">Need Help?</a> <br><br>
                    <a href="{{ url('/login') }}" class="link">Login</a>
                </div>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>,
            <span>Designed by</span>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signin.svg')}}" alt="Forgot Password"/>
        </div>
    </div>
</div>
@stop
