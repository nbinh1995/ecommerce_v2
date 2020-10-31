<section class="section-box section-product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 center">
                <h2 class="section-title">Featured Products</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row--nowrap">
            @foreach ($products as $product)
            <div class="col-xl-4 col-sm-6 padding-tb-sm slide">
                <a
                    href="{{route('detail',['productSlug'=>$product->slug,'categorySlug'=>$product->getProductCategory()->slug])}}">
                    <figure class="box-product">
                        <img src="{{$product->getProductFirstImage()->path}}" alt="" />
                        <h3 class="text-line"><a
                                href="{{route('detail',['productSlug'=>$product->slug,'categorySlug'=>$product->getProductCategory()->slug])}}">{{$product->name}}</a>
                        </h3>
                        <p class="text-line-camp">{{$product->description}}</p>
                        <p class="box-product__price">{{showCurrency('VND',$product->price)}}</p>
                    </figure>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 center">
                <i class="fas fa-arrow-left section-product__icon" onclick="slideLeft()" id="product-left"></i>
                <i class="fas fa-arrow-right section-product__icon" onclick="slideRight()" id="product-right"></i>
            </div>
        </div>
    </div>
</section>