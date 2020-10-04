@extends('layouts.app')
@section('title')
@include('partials.title',['title'=>'CHECKOUT'])
@endsection
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ Cart','page'=>'Checkout'])
@include('partials.site.section-checkout')
@endsection