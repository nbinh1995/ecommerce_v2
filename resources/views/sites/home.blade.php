@extends('layouts.app')
@section('title')
@php
$item_1 = "actice";
@endphp
@include('partials.title',['title'=>'HOME'])
@endsection
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/slide.js")}}"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
@endpush
@section('content')

@include('partials.site.section-banner')

@include('partials.site.section-featured')

@include('partials.site.section-collection')

@include('partials.site.section-product')

@include('partials.site.section-big_sale')

@endsection