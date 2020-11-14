@extends('layouts.admin')
@section('title','HOME')
@section('header_page','Products Page')

@push('head')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('script')
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{ asset('AdminLTE/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var prefix = '/laravel-filemanager';
    var path_host = window.location.origin;
    console.log(path_host);
    var options = {
    filebrowserBrowseUrl: `${prefix}?type=Files`,
    filebrowserUploadUrl: `${prefix}/upload?type=Files&_token=`
};
CKEDITOR.replace('my-editor', options);
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('files',{ prefix: `${prefix}` });
  
    $('#categories').change(function(e){
        let categoryID = $(e.target).val();
        $.ajax({
            url: `/dashboard/categories/${categoryID}/create-attribute-values`,
            method: "GET",
            dataType: "json",
            success: function (data) {
                $('.attribute-html-form').empty();
                $('.attribute-html-form').html(data.html);
            },
        });
    });
</script>

@endpush

@section('content')

<div style="margin:0 -0.5rem">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product Info</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.products.store')}}" method="post" id="product-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Name Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" required
                                        placeholder="Name Product">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-12 col-form-label">{{ __('Meta Title Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="meta_title" required
                                        placeholder="Meta Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Slug Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="slug"
                                        placeholder="Slug Product">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-12 col-form-label">{{ __('Price Product') }}</label>
                                <div class="col-md-12">
                                    <input id="price" type="number" class="form-control" name="price" required
                                        placeholder="Price Product">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-12 col-form-label">{{ __('Description Product') }}</label>

                                <div class="col-md-12">
                                    <textarea id="my-editor" name="description" class="form-control @error('description')
                                    is-invalid @enderror"
                                        placeholder="Place some text here">{!! old('description') !!}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product Images</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <input id="thumbnail" class="form-control" type="hidden" name="product_images"
                                form="product-form">
                            <div class="mb-2">
                                <span class="input-group-btn mt-2">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-xs text-white mr-auto">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div class="img-thumbnail" id="holder" style="min-width: 100%; min-height:100px;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Publish</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{route('dashboard.products')}}" class="btn btn-secondary px-4"
                            data-dismiss="modal">Close</a>
                        <button type="submit" form="product-form" class="btn btn-primary px-4">{{__('Save')}}</button>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <select name="category_id" id="categories" class="form-control text-capitalize" required
                            form="product-form">
                            <option disabled selected>
                                --Select Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" class="text-capitalize">{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="attribute-html-form">

                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Feature</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="is_new" id="is_new"
                                form="product-form">
                            <label class="custom-control-label" for="is_new"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection