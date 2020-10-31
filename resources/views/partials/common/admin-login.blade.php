<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home')}}"><b>SHOPPERS </b>Dashboard</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}"
                        value="{{ old('email') }}" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <div class="err" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="{{ __('Password') }}"
                        pattern="(?=.*[a-zA-Z0-9]).{6,}" required name="password"
                        title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!" value="{{ old('password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="err" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <label for="remember" class="link">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-1">
                @if (Route::has('password.request'))
                <div><a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a></div>
                @endif
            </p>
            {{-- <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p> --}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>