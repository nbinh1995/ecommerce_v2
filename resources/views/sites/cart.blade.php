@extends('layouts.app')
@section('title')
@include('partials.title',['title'=>'SHOPPING CART'])
@endsection
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
<script src="{{asset("js/Script/input_amount.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ ','page'=>'Cart'])
@include('partials.site.section-cart')
@endsection