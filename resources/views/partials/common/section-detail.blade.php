<section class="section-box section-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 padding-tb-sm">
                <a href=""><img src="{{$product->getProductFirstImage()->path}}" alt="" /></a>
            </div>
            <div class="col-xl-6 padding-tb-sm">
                <h3 class="section-detail__title">{{$product->name}}</h3>
                <p class="section-detail__desc text-line-camp" style="display: -webkit-box">
                    {{$product->description}}
                </p>
                <span class="section-detail__price">{{ showCurrency('VND',$product->price)}}</span>

                @foreach ($attrs_values as $attr => $attr_values)
                <div class="section-detail__size" style="align-items: center">
                    <h4 style="margin: 0">{{__($attr)}} :</h4>
                    @foreach ($attr_values as $index => $value)
                    <label class="size-item">
                        <input type="radio" name="{{$attr.'_id'}}" value="{{$value->id}}" @if ($index==0 ) checked
                            @endif class="attrs" />
                        <span>{{$value->attr_value}}</span></label>
                    @endforeach
                </div>
                @endforeach
                <form action="{{ route('cart.add') }}" method="post" id="add-cart">
                    @csrf
                    <div>
                        <div class="input-group">
                            <span class="input-group__pre" onclick="btnMinus(this)">-</span>
                            <span class="input-group__pre input-group__pre--right" onclick="btnPlus(this)">+</span>
                            <input type="number" name="product_amount" class="input-group__display" value="1" min="1" />
                        </div>
                    </div>
                    <input type="hidden" name="product_attrs" value="">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_image" value="{{$product->getProductFirstImage()->path}}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                    <button type="submit" class="btn-default">add to
                        cart</button>
                </form>
            </div>
        </div>
    </div>
</section>