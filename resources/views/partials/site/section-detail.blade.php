<section class="section-box section-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 padding-tb-sm">
                <a href=""><img src="{{$product->image}}" alt="" /></a>
            </div>
            <div class="col-xl-6 padding-tb-sm">
                <h3 class="section-detail__title">{{$product->name}}</h3>
                <p class="section-detail__desc">
                    {{$product->description}}
                </p>
                <span class="section-detail__price">{{$product->showPrice('VND',false)}}</span>
                <div class="section-detail__size">
                    <label for="size-small" class="size-item">
                        <input type="radio" name="size-product" id="size-small" />
                        <span>Small</span></label>
                    <label for="size-small" class="size-item">
                        <input type="radio" name="size-product" id="size-small" />
                        <span>Medium</span></label>
                    <label for="size-small" class="size-item">
                        <input type="radio" name="size-product" id="size-small" />
                        <span>Large</span></label>
                    <label for="size-small" class="size-item">
                        <input type="radio" name="size-product" id="size-small" />
                        <span>Extra Large</span></label>
                </div>
                <div>
                    <div class="input-group">
                        <span class="input-group__pre" onclick="btnMinus(this)">-</span>
                        <span class="input-group__pre input-group__pre--right" onclick="btnPlus(this)">+</span>
                        <input type="number" class="input-group__display" value="1" min="1" />
                    </div>
                </div>
                <a href="" class="btn-default">add to cart</a>
            </div>
        </div>
    </div>
</section>