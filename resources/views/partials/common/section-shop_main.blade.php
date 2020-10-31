<section class="section-shop-main">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <section class="shop-sidebar">
                    <div class="widget">
                        <h3>CATEGORIES</h3>
                        <div class="widget__row">
                            <h5 class="category-item">Men</h5>
                            <h5 class="ml-auto">(2,220)</h5>
                        </div>
                        <div class="widget__row">
                            <h5 class="category-item">Women</h5>
                            <h5 class="ml-auto">(2,550)</h5>
                        </div>
                        <div class="widget__row">
                            <h5 class="category-item">Children</h5>
                            <h5 class="ml-auto">(2,124)</h5>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>FILTER BY PRICE</h3>
                        <div class="widget__row">
                            <input type="range" name="" id="" />
                        </div>
                        <div class="widget__row">
                            <span>$75</span> - <span>$249</span>
                        </div>
                        <h3>SIZE</h3>
                        <label for="size-small" class="widget__row">
                            <input type="checkbox" name="size-small" id="size-small" />
                            <span>Small (2,319)</span></label>
                        <label for="size-medium" class="widget__row">
                            <input type="checkbox" name="size-medium" id="size-medium" />
                            <span>Medium (1,282)</span></label>
                        <label for="size-large" class="widget__row">
                            <input type="checkbox" name="size-large" id="size-large" />
                            <span>Large (1,392)</span></label>
                        <h3>COLOR</h3>
                        <a href="#" class="widget__row"><span class="circle circle--red"></span>
                            <p>Red (2,429)</p>
                        </a>
                        <a href="#" class="widget__row"><span class="circle circle--green"></span>
                            <p>Green (2,298)</p>
                        </a>
                        <a href="#" class="widget__row"><span class="circle circle--blue"></span>
                            <p>Blue (1,075)</p>
                        </a>
                        <a href="#" class="widget__row"><span class="circle circle--purple"></span>
                            <p>Purple (1,075)</p>
                        </a>
                    </div>
                </section>
            </div>
            <div class="col-9">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="title-shop">Shop All</h3>
                        </div>
                        <div class="col-6 right">
                            <label for="lastest" class="shop-content-checkbox">
                                <input type="checkbox" id="lastest" hidden />
                                <span class="btn-default btn-default--gray">Latest <i
                                        class="fas fa-caret-down"></i></span>
                                <ul class="menu-list menu-list--child">
                                    <li class="menu-list__item">men</li>
                                    <li class="menu-list__item">women</li>
                                    <li class="menu-list__item">children</li>
                                </ul>
                            </label>

                            <label for="reference" class="shop-content-checkbox">
                                <input type="checkbox" id="reference" hidden />
                                <span class="btn-default btn-default--gray">Reference <i
                                        class="fas fa-caret-down"></i></span>
                                <input type="checkbox" id="reference" hidden />
                                <ul class="menu-list menu-list--child">
                                    <li class="menu-list__item"><a href="#">Relevance</a></li>
                                    <li class="menu-list__item">
                                        <a href="#">Name, A to Z</a>
                                    </li>
                                    <li class="menu-list__item">
                                        <a href="#">Name, Z to A</a>
                                    </li>
                                    <div class="container-fluid border-b"></div>
                                    <li class="menu-list__item">
                                        <a href="#">Price, low to high</a>
                                    </li>
                                    <li class="menu-list__item">
                                        <a href="#">Price, high to low</a>
                                    </li>
                                </ul>
                            </label>
                        </div>
                        <div class="col-12">
                            <section class="shop-content">
                                @foreach ($products as $product)
                                <div>
                                    <a
                                        href="{{route('detail',['productSlug'=>$product->slug,'categorySlug'=>$product->getProductCategory()->slug])}}">
                                        <figure class="box-product">
                                            <img src="{{$product->getProductFirstImage()->path}}" alt="" />
                                            <h3 class="text-line"><a
                                                    href="{{route('detail',['productSlug'=>$product->slug,'categorySlug'=>$product->getProductCategory()->slug])}}">{{$product->name}}</a>
                                            </h3>
                                            <p class="text-line-camp">{{$product->description}}</p>
                                            <p class="box-product__price">{{ showCurrency('VND',$product->price) }}
                                            </p>
                                        </figure>
                                    </a>
                                </div>
                                @endforeach
                            </section>
                        </div>
                        <div class="col-12 center">
                            {{$products->appends(request()->query())->render('components.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>