@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Bills Page')

@push('head')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/toastr/toastr.min.css')}}">
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
<!-- jquery-validation -->
<script src="{{ asset('AdminLTE/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
{{-- <script src="{{asset('js/libs/crud.js')}}"></script> --}}
{{-- <script src="{{asset('js/admin/bills.js')}}"></script> --}}

@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datatable Bill List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="common-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Note</th>
                                <th scope="col">Total Bill</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Note</th>
                                <th scope="col">Total Bill</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.modal',['idModal'=>'common-modal']);

@endsection