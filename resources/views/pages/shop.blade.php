@extends('layouts.app')
@section('title')

@include('partials.common.title',['title'=>'SHOP'])

@php
$item_2 = "actice";
@endphp

@endsection

@push('top')

@endpush

@push('bottom')

<script src="{{asset("js/Script/lazyloading_shop.js")}}"></script>

@endpush

@section('content')

@include('partials.common.section-tree',['root'=>'Home \ ','page'=>'Shop'])
@include('partials.common.section-shop_main')
@include('partials.common.section-collection')

@endsection