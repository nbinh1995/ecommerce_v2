@extends('layouts.app')

@section('title')

@php
$item_1 = "actice";
@endphp
@include('partials.common.title',['title'=>'HOME'])

@endsection

@push('top')

@endpush

@push('bottom')

<script src="{{asset("js/Script/slide.js")}}"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>

@endpush

@section('content')

@include('partials.common.section-banner')
@include('partials.common.section-featured')
@include('partials.common.section-collection')
@include('partials.common.section-product')
@include('partials.common.section-big_sale')

@endsection