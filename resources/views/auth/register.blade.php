@extends('layout.auth')
@section('title', 'Register')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form action='{{ route('register')}}' method='post' class="card auth_form">
            @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Sign Up</h5>
                <span>Register a new membership</span>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <select name="role" id="role" class="form-control">
                        <option selected value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="super admin">Super admin</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    @error('name')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input value='{{ old('name') }}' name="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Username" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>

                </div>
                <div class="input-group mb-3">
                    @error('email')
                        <span style="display: block;" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input value='{{ old('email') }}' name='email' type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Email" required>
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
                    <div class="input-group-append  @error('password')@enderror">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                       <input required name='password_confirmation' placeholder="Confirme-password" id="password-confirm" type="password" class="form-control "  autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="checkbox">
                    <input id="remember_me" type="checkbox">
                    <label for="remember_me">I read and agree to the <a href="javascript:void(0);">terms of usage</a></label>
                </div>
                <button type='submit'  class="btn btn-primary btn-block waves-effect waves-light"> {{ __('SIGN UP') }}</button>
                <div class="signin_with mt-3">
                    <a class="link" href="{{url('/login')}}">You already have a membership?</a>
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
            <img src="{{asset('assets/images/signup.svg')}}" alt="Sign Up" />
        </div>
    </div>
</div>
@stop
