<form action="{{$url}}" method="post" id="{{$idForm}}" enctype="multipart/form-data">
    @csrf
    @isset($admin)
    @method('PUT')
    <input type="hidden" name="id" value="{{$admin->id}}">
    @endisset
    <div class="form-group row">
        <label class="col-md-12 col-form-label">{{ __('Full Name') }}</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" required placeholder="Full Name"
                value="{{$admin->name ?? ''}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12 col-form-label">{{ __('Email') }}</label>
        <div class="col-md-12">
            <input type="email" class="form-control" name="email" required placeholder="Email Name"
                value="{{$admin->email ?? ''}}">
        </div>
    </div>
    @if (isset($admin))
    <details>
        <summary class="btn btn-outline-secondary rounded-pill">Change Password</summary>
        <div class="form-group row">
            <div class="col-6 row">
                <label class="col-md-12 col-form-label">{{ __('New Password') }}</label>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="col-6 row">
                <label class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Password">
                </div>
            </div>
        </div>
    </details>
    @else
    <div class="form-group row">
        <div class="col-6 row">
            <label class="col-md-12 col-form-label">{{ __('Password') }}</label>
            <div class="col-md-12">
                <input type="password" class="form-control" name="password" required placeholder="Password">
            </div>
        </div>
        <div class="col-6 row">
            <label class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
            <div class="col-md-12">
                <input type="password" class="form-control" name="password_confirmation" required
                    placeholder="Confirm Password">
            </div>
        </div>
    </div>
    @endif
</form>