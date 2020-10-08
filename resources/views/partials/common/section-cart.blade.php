<section class="section-box section-cart">
    <div class="container">
        <div class="row">
            @if (session('carts'))
            <div class="col-12 padding-tb-sm">
                <button class="btn-default btn-default--white clear-cart">CLEAR</button>
            </div>
            <div class="col-12">
                <div class="table-box">
                    <table class="table-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="cart-tbody">
                            @foreach (session('carts')->list as $key => $cart)
                            <tr>
                                <th>{{ $key +1}}</th>
                                <td><img src="{{ $cart->product_image }}" alt="{{ $cart->product_name}}"
                                        style="width: 100px"></td>
                                <td>{{ $cart->product_name}}</td>
                                <td>{{ showCurrency('VND',$cart->product_price) }}</td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group__pre" onclick="btnMinus(this)">-</span>
                                        <span class="input-group__pre input-group__pre--right"
                                            onclick="btnPlus(this)">+</span>
                                        <input type="number" class="input-group__display qty"
                                            value="{{$cart->product_amount}}" min="1" data-id="{{$cart->product_id}}"
                                            data-size="{{ $cart->product_size_id}}" />
                                    </div>
                                </td>
                                <td>{{$cart->getNameSizeByID($sizes)}}</td>
                                <td>{{ showCurrency('VND',$cart->product_total) }}</td>
                                <td>
                                    <span class="btn-default remove-cart" data-id="{{$cart->product_id}}"
                                        data-size="{{ $cart->product_size_id}}">X</span>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @else
            <div class="col-12">
                <h1> EMPTY CART !</h1>
            </div>
            @endif
        </div>
        <div class="row padding-tb">
            <div class="col-7">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col-6 center">
                            <a href="" class="btn-default btn-default--full">Update Cart</a>
                        </div> --}}
                        <div class="col-6 center">
                            <a href="{{ route('shop.all')}}"
                                class="btn-default btn-default--full btn-default--white">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-coupon">
                            <h3>Coupon</h3>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <input type="text" class="form-group__input" placeholder="Coupon Code" />
                            </div>
                        </div>
                        <div class="col-5 right">
                            <a href="" class="btn-default">Apply Coupon</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ml-auto">
                <div class="container">
                    <div class="row padding-tb-sm">
                        <div class="col-12 right border-b">
                            <h3>CART TOTALS</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span>Total</span>
                        </div>
                        <div class="col-3">
                            <span>{{ session('carts') ? showCurrency('VND',session('carts')->total) : '0 VND' }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 center padding-tb-sm">
                            <a href="{{route('checkout')}}" class="btn-default btn-default--full">Proceed To
                                Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>