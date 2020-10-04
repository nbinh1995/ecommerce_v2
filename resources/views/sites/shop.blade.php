@extends('layouts.app')
@section('title')
@php
$item_2 = "actice";
@endphp
@include('partials.title',['title'=>'SHOP'])
@endsection
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/lazyloading_shop.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ ','page'=>'Shop'])
@include('partials.site.section-shop_main')
@include('partials.site.section-collection')
@endsection