@extends('layouts.app')
@push('top')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<style>
    .section-tree {
        margin-bottom: 0;
    }
</style>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=> 'Home \ ','page'=> 'Register'])
<form class="reg-container" action="{{ route('register') }}" method="POST">
    @csrf
    <h1>{{ __('create an account') }}</h1>
    <div class="reg-wrap">
        <div class="reg-wrap-left">
            <input type="email" name="email" placeholder="{{ __('E-Mail Address') }}l" required>
            @error('email')
            <div class="err" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <input type="password" name="password" placeholder="Password" pattern="(?=.*[a-zA-Z0-9]).{8,}"
                title="Mật khẩu có ít nhất 8 kí tự và không có kí tự đặc biệt!">
            @error('password')
            <div class="err" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                pattern="(?=.*[a-zA-Z0-9]).{8,}" required
                title="Mật khẩu có ít nhất 8 kí tự và không có kí tự đặc biệt!">
        </div>
        <div class="reg-wrap-right">
            <input type="text" name="name" placeholder="{{ __('FullName') }}" required>
            @error('name')
            <div class="err" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <input type="text" name="address" placeholder="{{__('Address')}}" required>
            @error('address')
            <div class="err" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <input type="tel" name='phone' placeholder="{{__('PhoneNumber')}}" pattern="^0[0-9]{9,10}$" required
                title="Không phải số điện thoại!">
            @error('phone')
            <div class="err" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
    </div>
    <div class="reg-container-btn">
        <input type="submit" class="btn-default" value="{{ __('Register') }}">
    </div>
</form>
<div class="section-box container-fluid border-b"></div>
@endsection