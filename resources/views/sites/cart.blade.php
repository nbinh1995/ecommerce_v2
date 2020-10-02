@extends('layouts.app')
@section('title','SHOPPING CART')
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
<script src="{{asset("Script/input_amount.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ ','page'=>'Cart'])
@include('partials.site.section-cart')
@endsection