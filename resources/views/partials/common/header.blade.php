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
                <a href="{{route('home')}}">
                    <div class="box-logo">
                        <h3 class="box-logo__text">shoppers</h3>
                    </div>
                </a>
            </div>
            <div class="col-4 right">
                @guest
                <a href="{{route('login')}}" class="btn-icon">
                    <i class="fas fa-user"></i>
                </a>
                @else
                <span>
                    {{ Auth::user()->name }}
                </span>
                <a class="btn-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>
                <a href="#" class="btn-icon">
                    <i class="far fa-heart"></i>
                </a>
                @endguest
                <a href="{{route('cart.show')}}" class="btn-icon btn-icon--badge">
                    <i class="fas fa-shopping-cart"></i>
                    <small class="badge">{{session('carts')->count ?? 0}}</small>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid border-b"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 center">
                <nav>
                    <ul class="menu-list">
                        <li class="menu-list__item @isset($item_1) active @endisset">
                            <a href="{{route('home')}}">home</a>
                        </li>
                        <li class="menu-list__item @isset($item_2) active @endisset"><a
                                href="{{route('shop.all')}}">shop</a></li>
                        <li class="menu-list__item @isset($item_3) active @endisset"><a href="">catalogue <i
                                    class="fas fa-angle-down" style="opacity: 0.5"></i></a>
                            <ul class="menu-list menu-list--child">
                                @foreach ($categories as $category)
                                <li class="menu-list__item"><a
                                        href="{{ route('shop.category',['categorySlug'=>$category->slug])}}">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-list__item @isset($item_4) active @endisset"><a href="{{route('shop.new')}}">new
                                arrivals</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>