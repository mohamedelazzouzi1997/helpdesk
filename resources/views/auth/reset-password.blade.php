@extends('layout.auth')
@section('title', 'Forget Password')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form action='{{ route('password.update') }}' method="POST" class="card auth_form">
            @csrf
            <input type="hidden" name="token" value='{{ $request->route('token') }}'>
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Reset your password</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="email" name='email' value='{{ $request->email }}' class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    @error('password')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input name='password' type="password" class="form-control  @error('password') is-invalid @enderror" required placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                       <input required name='password_confirmation' placeholder="Confirme-password" id="password-confirm" type="password" class="form-control "  autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Reset</button>
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
