@extends('layouts.app')
@section('title','DETAIL')
@push('top')

@endpush
@push('bottom')
<script src="Public/Script/input_amount.js"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
@endpush
@section('content')
@include('partials.site.section-tree',['root'=>'Home \ ','page'=>'Detail'])
@include('partials.site.section-detail')
@include('partials.site.section-product')
@endsection