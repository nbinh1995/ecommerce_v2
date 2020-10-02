<header class="section-header">
    <div class="container">
        <div class="row padding-tb">
            <div class="col-4 left">
                <div class="box-input">
                    <input type="text" class="box-input__text" placeholder="Search" />
                    <div class="box-input__icon">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="col-4 center">
                <a href="#">
                    <div class="box-logo">
                        <h3 class="box-logo__text">shoppers</h3>
                    </div>
                </a>
            </div>
            <div class="col-4 right">
                <div class="btn-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="btn-icon">
                    <i class="far fa-heart"></i>
                </div>
                <div class="btn-icon btn-icon--badge">
                    <i class="fas fa-shopping-cart"></i>
                    <small>2</small>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid border-b"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 center">
                <nav>
                    <ul class="menu-list">
                        <li class="menu-list__item active">
                            <a href="{{route('home')}}">home</a>
                        </li>
                        <li class="menu-list__item"><a href="{{route('shop')}}">shop</a></li>
                        <li class="menu-list__item"><a href="">catalogue <i class="fas fa-angle-down"
                                    style="opacity: 0.5"></i></a>
                            <ul class="menu-list menu-list--child">
                                @php
                                $new = $categories[0];
                                $categories = $categories->slice(1);
                                @endphp
                                @foreach ($categories as $item)
                                <li class="menu-list__item"><a
                                        href="{{ route('shop.category',['category'=>$item])}}">{{$item->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-list__item"><a href="{{route('shop.category',['category'=>$new])}}">new
                                arrivals</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>