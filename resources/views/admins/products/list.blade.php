@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Products Page')

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

<script>
    const HOST = window.location.origin; 
    const ID_DELETE_MODAL = '#remove-modal';
    const BASE_URL ="/dashboard/products";
    $('#common-table').DataTable({
                    responsive: true,
                    autoWidth: false,
                });
    $(document).on("click", ".remove", function (e) {
        let url = `${HOST}${BASE_URL}/${$(e.target).data('id')}`
        $(`${ID_DELETE_MODAL} form`).attr('action',url);
        $(ID_DELETE_MODAL).modal('show');
    });
</script>
@if (session()->has('create_status') && session()->get('create_status') )
<script>
    toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"]('Created Success!');
</script>
@endif
@if (session()->has('update_status') && session()->get('update_status') )
<script>
    toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"]('Updated Success!');
</script>
@endif
@if (session()->has('remove_status') && session()->get('remove_status') )
<script>
    toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"]('Removed Success!');
</script>
@endif
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
                    <div class="text-right mb-1">
                        <a href="{{route('dashboard.products.create')}}" class="btn btn-primary"><i
                                class="far fa-plus-square" style="pointer-events: none"></i></a>
                    </div>
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
                                <td><img src="{{ $product->getProductFirstImage()->path ?? 'https://via.placeholder.com/350x250'}}"
                                        alt="{{ $product->name }}" style="width: 100px; height:auto"></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {!!$product->toHtmlFullAttrNameValue()!!}
                                </td>
                                <td>{{ showCurrency('VND', $product->price)}}</td>
                                <td>{!! $product->toHtmlNew() !!}</td>
                                <td>
                                    <a href="{{route('dashboard.products.edit',['productSlug' => $product->slug])}}"
                                        class="btn btn-info edit"><i class="far fa-edit"
                                            style="pointer-events: none"></i></a>
                                    <button data-id="{{$product->slug}}" type="button" class="btn btn-danger remove"><i
                                            class="far fa-trash-alt" style="pointer-events: none"></i></button>
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
                                <th scope="col">Attribute Product</th>
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
<!-- Modal -->
<div class="modal fade" id="remove-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    {{__('Are You Sure?')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection