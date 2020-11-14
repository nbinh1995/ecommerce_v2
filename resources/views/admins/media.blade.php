@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Dashboard Page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <iframe src="/laravel-filemanager"
                style="width: 100%; height: 100vh; overflow: hidden; border: none;"></iframe>
        </div>
    </div>
</div>

@endsection