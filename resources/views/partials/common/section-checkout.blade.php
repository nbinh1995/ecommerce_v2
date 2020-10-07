<section class="section-box section-checkout">
    <div class="container">
        @guest
        <div class="row">
            <div class="col-12">
                <div class="widget">
                    <p>Login to checkout! <a href="{{route('login')}}" style="color: #4f45e3">Click here</a> to login
                    </p>
                </div>
            </div>
        </div>
        @endguest
        @auth
        <div class="row">
            <div class="col-6">
                <h2>Billing Details</h2>
                <div class="widget p-5">
                    <div class="row">
                        <div class="col-12">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" class="form-group__input" name="Full Name" value="{{$user->name}}" />
                            </div>
                        </div>
                    </div>
                    <label>Address <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <input type="text" class="form-group__input" placeholder="Address" name="address"
                            value="{{$user->address}}" />
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" class="form-group__input" name="email address"
                                    value="{{$user->email}}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" class="form-group__input" placeholder="Phone Number" name="phone"
                                    value="{{$user->phone}}" />
                            </div>
                        </div>
                    </div>
                    <label for="order-note">Order Notes</label>
                    <div class="row center">
                        <textarea name="" id="order-note" rows="10" class="col-12" name="note"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h2>Coupon Code</h2>
                        <div class="widget p-5">
                            <form action="">
                                <p>Enter your coupon code if you have one</p>
                                <div class="form-group">
                                    <input type="text" class="form-group__input" placeholder="Coupon Code" />
                                    <div class="form-group__btn">
                                        <button type="submit" class="btn-default">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2>Your Order</h2>
                        <div class="widget p-5">
                            <div class="widget__row">
                                <h5 class="text-bold">Product</h5>
                                <h5 class="text-bold ml-auto">Total</h5>
                            </div>
                            <hr />
                            @if (session('carts'))
                            @foreach (session('carts')->list as $cart)
                            <div class="widget__row">
                                <h5 class="">{{ $cart->product_name}} x {{$cart->product_amount}}</h5>
                                <h5 class="ml-auto">{{ showCurrency('VND',$cart->product_price) }}</h5>
                            </div>
                            <hr />
                            @endforeach
                            @endif
                            <div class="widget__row">
                                <h5 class="text-bold">Cart Subtotal</h5>
                                <h5 class="ml-auto">
                                    {{ session('carts') ? showCurrency('VND',session('carts')->total) : '0 VND' }}</h5>
                            </div>
                            <hr />
                            <div class="widget__row">
                                <h5 class="text-bold">Delivery</h5>
                                <h5 class="ml-auto">
                                    {{ session('carts') ? showCurrency('VND',session('carts')->total) : '0 VND' }}</h5>
                            </div>
                            <hr />
                            <div class="widget__row">
                                <h5 class="text-bold">Order Total</h5>
                                <h5 class="text-bold ml-auto">
                                    {{ session('carts') ? showCurrency('VND',session('carts')->total) : '0 VND' }}</h5>
                            </div>
                            {{-- <div class="widget p-5">
                                <span class="category-item">Direct Bank Transfer</span>
                            </div>
                            <div class="widget p-5">
                                <span class="category-item">Cheque Payment</span>
                            </div>
                            <div class="widget p-5">
                                <span class="category-item">Paypal</span>
                            </div> --}}
                            <a href="#" class="btn-default btn-default--full center">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
</section>