@isset($attrs_id_checked)
<script>
    $('#attrs').val("{{$attrs_id_checked}}".split(','));
</script>
@endisset
<form action="{{$url}}" method="post" id="{{$idForm}}" enctype="multipart/form-data">
    @csrf
    @isset($category)
    @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    @endisset
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label">{{ __('Name Category') }}<span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" required placeholder="Name Category"
                value="{{$category->name ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="slug" class="col-md-12 col-form-label">{{ __('Slug Category') }}</label>
        <div class="col-md-12">
            <input id="slug" type="text" class="form-control" name="Slug" placeholder="Slug Category"
                value="{{$category->slug ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="meta-title" class="col-md-12 col-form-label">{{ __('Meta Title Category') }}<span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input id="meta-title" type="text" class="form-control" name="meta_title" required
                placeholder="Meta Title Category" value="{{$category->meta_title ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="attributes" class="col-md-12 col-form-label">{{ __('Name Category') }}</label>
        <div class="col-md-12">
            <select name="attrs[]" id="attrs" multiple data-placeholder="Select Attribute" class="form-control select2">
                @foreach ($attributes as $attribute)
                <option value="{{$attribute->id}}">{{$attribute->attr_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>