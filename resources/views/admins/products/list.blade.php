@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Products Page')

@push('head')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css')}}">
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
<!-- Toastr -->
<script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
<!-- BootBox -->
<script src="{{ asset('AdminLTE/plugins/bootbox/bootbox.js')}}"></script>
@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datatable Product List</h3>
                </div>
                <div class="card-body">
                    <a href="{{route('dashboard.products.create')}}" class="btn btn-primary mb-2"><i
                            class="far fa-plus-square" style="pointer-events: none"></i></a>
                    <table class="table table-bordered" id="common-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image Product</th>
                                <th scope="col">Category Product</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">Attribute Product</th>
                                <th scope="col">Price Product</th>
                                <th scope="col">New Product</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                            <tr>
                                <th scope="col">{{ $index+1 }}</th>
                                <td><img src="{{ $product->image }}" alt="{{ $product->name }}"
                                        style="width: 100px; height:auto"></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td></td>
                                <td>{{ showCurrency('VND', $product->price)}}</td>
                                <td>{!! $product->toHtmlNew() !!}</td>
                                <td>
                                    <a href="{{route('dashboard.products.edit',['productSlug' => $product->id])}}"
                                        class="btn btn-info edit"><i class="far fa-edit"
                                            style="pointer-events: none"></i></a>
                                    <a href="{{route('dashboard.products.destroy',['productSlug' => $product->id])}}"
                                        class="btn btn-danger remove"><i class="far fa-trash-alt"
                                            style="pointer-events: none"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image Product</th>
                                <th scope="col">Category Product</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">Price Product</th>
                                <th scope="col">New Product</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection