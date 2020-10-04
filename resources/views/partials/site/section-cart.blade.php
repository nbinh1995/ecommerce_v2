<section class="section-box section-cart">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span onclick="getClear()" style="cursor: pointer; color:blue;">Clear </span>
            </div>
            <div class="col-12">
                <div class="table-box">
                    @include('partials.site.cart-table')
                </div>
            </div>
        </div>
        <div class="row padding-tb">
            <div class="col-7">
                <div class="container">
                    <div class="row">
                        <div class="col-6 center">
                            <a href="" class="btn-default btn-default--full">Update Cart</a>
                        </div>
                        <div class="col-6 center">
                            <a href="" class="btn-default btn-default--full btn-default--white">Continue Shopping</a>
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
                    <div class="row">
                        <div class="col-12 right border-b">
                            <h3>CART TOTALS</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span>Subtotal</span>
                        </div>
                        <div class="col-3">
                            <span>$230.00</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <span>Total</span>
                        </div>
                        <div class="col-3">
                            <span>$230.00</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 center padding-tb-sm">
                            <a href="" class="btn-default btn-default--full">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>