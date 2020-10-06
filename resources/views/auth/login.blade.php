@extends('layouts.app')
@push('top')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<style>
    .section-tree {
        margin-bottom: 0;
    }
</style>
@endpush
@section('content')
@include('partials.common.section-tree',['root'=>'Home \ ','page'=>'Login'])
<div class="login-wrap">
    <div class="login-wrap-left">
        <h1>NEW CUSTOMERS</h1>
        <h3>REGISTER ACCOUNT</h3>
        <p>
            Creating an account is easy. Enter your email address and fill in the form on the next page and enjoy the
            benefits of having an account.
            <br> - Simple overview of your personal information
            <br> - Faster checkout
            <br> - A single global login to interact with adidas products and services
            <br> - Exclusive offers and promotions
            <br> - Latest products arrivals
            <br> - New season and limited collections
            <br> - Upcoming events
        </p>
        <a href="{{route('register')}}" class="btn-default">{{ __('Register') }}</a>
    </div>
    <form class="login-wrap-right" action="{{ route('login') }}" method="post">
        @csrf
        <h1>{{ __('LOGIN ACCOUNT') }}</h1>
        <input type="email" name="email" placeholder="{{ __('E-Mail Address') }}" required value="{{ old('email') }}">
        @error('email')
        <div class="err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <input type="password" name="password" placeholder="{{ __('Password') }}" pattern="(?=.*[a-zA-Z0-9]).{6,}"
            required title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!" autocomplete="current-password">
        @error('password')
        <div class="err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

        <div class="login-container-btn">
            <div>
                <div>
                    <label for="remember" class="link">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                <div><a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a></div>
                @endif
            </div>
            <input type="submit" value=" {{ __('Login') }}" class="btn-default">
        </div>
    </form>
</div>
<div class="section-box container-fluid border-b"></div>
@endsection