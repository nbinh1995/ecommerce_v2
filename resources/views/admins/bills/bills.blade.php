@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Bills Page')

@push('head')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('script')
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
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
                            @foreach ($bills as $index => $bill)
                            <tr>
                                <th scope="col">{{$index+1}}</th>
                                <td>{{$bill->name}}</td>
                                <td>{{$bill->email}}</td>
                                <td>{{$bill->address}}</td>
                                <td>{{$bill->phone}}</td>
                                <td>{{$bill->note}}</td>
                                <td>{{ showCurrency('VND', $bill->total_bill)}}</td>
                                <td>{{$bill->created_at}}</td>
                                <td>{{$bill->status}}</td>
                                <td>
                                    <a href="{{route('dashboard.bills.show',['billID'=>$bill->id])}}"
                                        class="btn btn-sm m-1 btn-info">Detail</a>
                                    <details style="position: relative">
                                        <summary class="btn btn-sm m-1 btn-primary">Status</summary>
                                        <div style="position: absolute;
                                        right: 100%;
                                        top: 0;
                                        z-index: 99;
                                        padding: 10px;
                                        background-color:white;
                                        box-shadow: 0px 1px 5px 5px rgb(0,0,0,0.1);">
                                            <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill"
                                                data-id="{{$bill->id}}" style="display: block">Completed</button>
                                            <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill"
                                                data-id="{{$bill->id}}" style="display: block">Confirmed</button>
                                            <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill"
                                                data-id="{{$bill->id}}" style="display: block">Pending</button>
                                            <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill"
                                                data-id="{{$bill->id}}" style="display: block;">Cancel</button>
                                        </div>
                                    </details>
                                </td>
                            </tr>
                            @endforeach
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

@endsection