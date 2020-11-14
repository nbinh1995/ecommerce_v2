<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Product Attribute</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        @if ($categoryAttrs === [])
        <i>No Data Product Attribute</i>
        @else
        <div class="row">
            @foreach ($categoryAttrs as $attr_name => $attr_values)
            <div class="col-12">
                <button class="btn btn-link" style="padding: 0" data-toggle="collapse" href="#{{$attr_name}}"
                    role="button" aria-expanded="true" aria-controls="{{$attr_name}}">
                    {{__($attr_name)}}
                </button>
                <div class=" collapse multi-collapse show" id="{{$attr_name}}">
                    <div class="row">
                        @foreach ($attr_values as $attr_value)
                        <label class="col-form-label col-3"><input type="checkbox" name="product_attrs_values[]"
                                value="{{$attr_value->id}}" @if($product_attrs_values !==[])
                                @if($product_attrs_values["$attr_name"]->contains($attr_value))
                            checked
                            @endif
                            @endif
                            form="product-form">{{$attr_value->attr_value}}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>