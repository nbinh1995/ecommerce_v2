<form action="{{$url}}" method="post" id="{{$idForm}}" enctype="multipart/form-data">
    @csrf
    @isset($attr)
    @method('PUT')
    <input type="hidden" name="id" value="{{$attr->id}}">
    @endisset
    <div class="form-group row">
        <label for="attr_name" class="col-md-12 col-form-label">{{ __('Name Attribute') }}</label>
        <div class="col-md-12">
            <input id="attr_name" type="text" class="form-control" name="attr_name" required
                placeholder="Name Attribute" value="{{isset($attr) ? $attr->attr_name : ''}}">
        </div>
    </div>
    <div class="form-group row">
        <hr class="col-md-12">
        <div class="input-group col-md-8">
            <input id="attr_value" type="text" class="form-control" placeholder="Value Attribute">
            <div class="input-group-append" style="cursor: pointer">
                <div class="input-group-text add-tag">
                    ADD VALUE
                </div>
            </div>
        </div>
        <hr class="col-md-12">
        <label for="attr_value" class="col-md-12 col-form-label">{{ __('Value Attribute') }}</label>
        <input type="hidden" id="attr_value_hidden" class="form-control" name="attr_value"
            value="{{isset($attr) ? $attr->toStringAttrValues() : ''}}">
        <div class="col-md-12 my-1" id="display-tag">

        </div>
    </div>
</form>