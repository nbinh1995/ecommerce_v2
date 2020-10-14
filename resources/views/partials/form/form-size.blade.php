<form action="{{$url}}" method="post" id="{{$idForm}}" enctype="multipart/form-data">
    @csrf
    @isset($size)
    @method('PUT')
    <input type="hidden" name="id" value="{{$size->id}}">
    @endisset
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label">{{ __('Name Size') }}</label>
        <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" required placeholder="Name Size"
                value="{{$size->name ?? ''}}">
        </div>
    </div>
</form>