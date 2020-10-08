<form action="{{$url}}" method="post" id="{{$idForm}}" enctype="multipart/form-data">
    @csrf
    @isset($product)
    <script>
        $('#categories').val({{$product->category_id}});
        $("input[value='"+{{$product->is_new}}+"']").prop('checked',true);
        $("#description").val("{{$product->description}}");
    </script>
    @method('PATCH')
    <input type="hidden" name="id" value="{{$product->id}}">
    @endisset
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label">{{ __('Name Product') }}</label>
        <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" required placeholder="Name Product"
                value="{{$product->name ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-md-12 col-form-label">{{ __('Price Product') }}</label>
        <div class="col-md-12">
            <input id="price" type="number" class="form-control" name="price" required placeholder="Price Product"
                value="{{$product->price ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-9 row">
            <label for="categories" class="col-md-12 col-form-label">{{ __('Category Product') }}</label>
            <div class="col-md-12">
                <select name="category_id" id="categories" class="form-control" required>
                    <option disable @isset($product) selected @endisset>--Select Category--</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" class="text-capitalize">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3 row">
            <label class="col-md-12 col-form-label">{{ __('New Product') }}</label>
            <div class="col-md-12">
                <label class="pr-3"><input type="radio" name="is_new" value="1"> New</label>
                <label><input type="radio" name="is_new" value="0">Not New</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-12 col-form-label">{{ __('Description Product') }}</label>

        <div class="col-md-12">
            <textarea class="textarea form-control  @error('description') is-invalid @enderror"
                placeholder="Place some text here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                name="description" id="description"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row justify-content-center">
        <div class="image-container">
            <img src="{{$product->image ?? 'http://placehold.it/150x150'}}" alt="" id="image-preview"
                class="img-thumbnail">
            <div class="middle">
                <label for="image-btn" style="cursor: pointer"><span class="btn btn-secondary"><i
                            class="fas fa-camera"></i></span></label>
                <input type="file" name="image" id="image-btn" hidden>
            </div>
        </div>
    </div>
</form>