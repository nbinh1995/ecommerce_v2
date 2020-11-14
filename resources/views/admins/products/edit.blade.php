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
<!-- jquery-validation -->
<script src="{{ asset('AdminLTE/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
<!-- BootBox -->
<script src="{{ asset('AdminLTE/plugins/bootbox/bootbox.js')}}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{ asset('js/admin/product_image.js')}}"></script>
<script>
    var prefix = '/laravel-filemanager';
    var product_slug ="{{$product->slug}}";
    console.log(product_slug);
    var options = {
    filebrowserBrowseUrl: `${prefix}?type=Files`,
    filebrowserUploadUrl: `${prefix}/upload?type=Files&_token=`
};
CKEDITOR.replace('my-editor', options);
</script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    $('#lfm').filemanager('files',{ prefix: `${prefix}` });
</script>
<script>
    CKEDITOR.instances['my-editor'].setData("{!!$product->description!!}");
    $('#categories').change(function(e){
        let categoryID = $(e.target).val();
        let productID = $(e.target).data('product');
        $.ajax({
            url: `/dashboard/categories/${categoryID}/create-attribute-values?productID=${productID}`,
            method: "GET",
            dataType: "json",
            success: function (data) {
                $('.attribute-html-form').empty();
                $('.attribute-html-form').html(data.html);
            },
        });
    });
    $('#categories').val({{$product->category_id}});
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
                        <form action="{{route('dashboard.products.update',['productSlug'=>$product->slug])}}"
                            method="post" id="product-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Name Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" required
                                        placeholder="Name Product" value="{{$product->name ?? ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-12 col-form-label">{{ __('Meta Title Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="meta_title" required
                                        placeholder="Meta Title" value="{{$product->meta_title ?? ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Slug Product') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="slug"
                                        placeholder="Slug Product" value="{{$product->slug ?? ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-12 col-form-label">{{ __('Price Product') }}</label>
                                <div class="col-md-12">
                                    <input id="price" type="number" class="form-control" name="price" required
                                        placeholder="Price Product" value="{{$product->price ?? ''}}">
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
                        <div class="row">
                            <div class="col-12 mb-1 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#create-image-modal">
                                    <i class="far fa-plus-square" style="pointer-events: none"></i>
                                </button>
                            </div>
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered" id="image-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
                            form="product-form" data-product="{{$product->id}}">
                            <option disabled>--Select Category--</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" data-slug="{{$category->slug}}" class="text-capitalize">
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="attribute-html-form">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Attribute</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($categoryAttrs as $attr_name => $attr_values)
                                <div class="col-12">
                                    <button class="btn btn-link" style="padding: 0" data-toggle="collapse"
                                        href="#{{$attr_name}}" role="button" aria-expanded="true"
                                        aria-controls="{{$attr_name}}">
                                        {{__($attr_name)}}
                                    </button>
                                    <div class=" collapse multi-collapse show" id="{{$attr_name}}">
                                        <div class="row">
                                            @foreach ($attr_values as $attr_value)
                                            <label class="col-form-label col-3"><input type="checkbox"
                                                    name="product_attrs_values[]" value="{{$attr_value->id}}"
                                                    @if($product_attrs_values["$attr_name"]->contains($attr_value))
                                                checked @endif form="product-form">{{$attr_value->attr_value}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
                                form="product-form" @if ($product->is_new === 1)
                            checked
                            @endif>
                            <label class="custom-control-label" for="is_new"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="create-image-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Image Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.products.createImage',['productID' => $product->id]) }}" method="post"
                id="create-image-form">
                @csrf
                <div class="modal-body">
                    <input id="thumbnail" class="form-control" type="hidden" name="product_images">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Image</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection