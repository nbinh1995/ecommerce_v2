@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Products Page')

@push('head')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
    .image-container {
        position: relative;
        overflow: hidden;
        width: 150px;
        height: 150px;
    }

    .image-container:hover .middle {
        opacity: 1;
    }

    .middle {
        transition: 0.5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
@endpush

@push('script')
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{ asset('AdminLTE/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@include('components.modal',['idModal'=>'common-modal']);


@endsection