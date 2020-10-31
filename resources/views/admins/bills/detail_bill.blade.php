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
                    <h3 class="card-title">Datatable Detail List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="common-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill_details as $index => $bill_detail)
                            <tr>
                                <th scope="col">{{$index+1}}</th>
                                <td>
                                    {!!$bill_detail->product->toHtmlFullNameProduct($bill_detail->billDetailProductAttr,$attr_values)!!}
                                </td>
                                <td>{{ showCurrency('VND', $bill_detail->price)}}</td>
                                <td>{{$bill_detail->amount}}</td>
                                <td>{{ showCurrency('VND', $bill_detail->total_detail)}}</td>
                                {{-- <td></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                                {{-- <th scope="col">Action</th> --}}
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