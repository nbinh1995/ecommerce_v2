@extends('layouts.app')

@section('title')

@include('partials.common.title',['title'=>'DETAIL'])

@endsection

@push('top')
<link rel="stylesheet" href="{{asset("AdminLTE/plugins/toastr/toastr.min.css")}}">
@endpush

@push('bottom')

<script src="{{asset("AdminLTE/plugins/toastr/toastr.min.js")}}"></script>
<script src="{{asset("js/Script/input_amount.js")}}"></script>
<script src="{{asset("js/Script/lazyloading_home.js")}}"></script>
<script src="{{asset("js/Script/slide.js")}}"></script>
<script src="{{asset("js/cart.js")}}"></script>

@endpush

@section('content')

@include('partials.common.section-tree',['root'=>'Home \ ','page'=>'Detail'])
@include('partials.common.section-detail')
@include('partials.common.section-product')

@endsection