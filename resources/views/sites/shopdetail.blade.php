@extends('layouts.app')
@section('title')
@include('partials.title',['title'=>'DETAIL'])
@endsection
@push('top')

@endpush
@push('bottom')
<script src="{{asset("js/Script/input_amount.js")}}"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
<script src="{{asset("js/Script/slide.js")}}"></script>
<script src="{{asset("js/cart.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ ','page'=>'Detail'])
@include('partials.site.section-detail')
@include('partials.site.section-product')
@endsection