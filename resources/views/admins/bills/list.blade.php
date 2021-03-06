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
<script>
    $('#common-table').DataTable({
                    responsive: true,
                    autoWidth: false,
                });
</script>
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
                                <th scope="col">Date</th>
                                <th scope="col">Amount Bills</th>
                                <th scope="col">Total Bills</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $index => $bill)
                            <tr>
                                <th scope="col">{{$index+1}}</th>
                                <td>{{$bill->date}}</td>
                                <td>{{$bill->amount_bills}}</td>
                                <td>{{ showCurrency('VND', $bill->total_bills)}}</td>
                                <td>
                                    <a href="{{route('dashboard.bills.billsOfDay',['billDate'=>$bill->date])}}"
                                        class="btn btn-info detail">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Amount Bills</th>
                                <th scope="col">Total Bills</th>
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