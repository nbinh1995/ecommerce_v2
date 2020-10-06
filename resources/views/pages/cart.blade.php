@extends('layouts.app')

@section('title')

@include('partials.common.title',['title'=>'SHOPPING CART'])

@endsection

@push('top')

<link rel="stylesheet" href="{{asset("AdminLTE/plugins/toastr/toastr.min.css")}}">
<style>
    .section-tree {
        margin-bottom: 0;
    }
</style>

@endpush

@push('bottom')

<script src="{{asset("AdminLTE/plugins/toastr/toastr.min.js")}}"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
<script src="{{asset("js/Script/input_amount.js")}}"></script>
<script src="{{asset("js/cart.js")}}"></script>

@endpush

@section('content')

@include('partials.common.section-tree',['root'=>'Home \ ','page'=>'Cart'])
<div class="cart-container">
    @include('partials.common.section-cart')
</div>


@endsection