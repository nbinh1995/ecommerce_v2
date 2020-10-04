<section class="section-box section-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 padding-tb-sm">
                <a href=""><img src="{{$product->image}}" alt="" /></a>
            </div>
            <div class="col-xl-6 padding-tb-sm">
                <form action="{{ route('cart.add') }}" method="post" id="detail-form">
                    @csrf
                    <h3 class="section-detail__title">{{$product->name}}</h3>
                    <p class="section-detail__desc">
                        {{$product->description}}
                    </p>
                    <span class="section-detail__price">{{$product->showPrice('VND',false)}}</span>
                    <div class="section-detail__size">
                        @foreach ($sizes as $item)
                        <label class="size-item">
                            <input type="radio" name="size-product" value="{{$item->id}}" />
                            <span>{{$item->name}}</span></label>
                        @endforeach
                    </div>
                    <div>
                        <div class="input-group">
                            <span class="input-group__pre" onclick="btnMinus(this)">-</span>
                            <span class="input-group__pre input-group__pre--right" onclick="btnPlus(this)">+</span>
                            <input type="number" name="product_amount" class="input-group__display" value="1" min="1" />
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_img" value="{{ $product->image }}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                    <button type="submit" class="btn-default">add to
                        cart</button>
                </form>
            </div>
        </div>
    </div>
</section>