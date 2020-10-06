@extends('layouts.app')

@section('title')

@include('partials.common.title',['title'=>'CHECKOUT'])

@endsection

@push('top')

@endpush

@push('bottom')
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
@endpush

@section('content')

@include('partials.common.section-tree',['root'=>'Home \ Cart','page'=>'Checkout'])
@include('partials.common.section-checkout')

@endsection