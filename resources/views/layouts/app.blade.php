<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SHOPPERS | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE/pulgin/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('scss/style.css')}}">
    @stack('top')
  </head>

  <body>
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
                  <a href="#"
                    >home <i class="fas fa-angle-down" style="opacity: 0.5"></i
                  ></a>
                  <ul class="menu-list menu-list--child">
                    <li class="menu-list__item"><a href="#">menu_item 1</a></li>
                    <li class="menu-list__item"><a href="#">menu_item 2</a></li>
                    <li class="menu-list__item"><a href="#">menu_item 3</a></li>
                    <li class="menu-list__item">
                      <a href="#"><span>sub menu</span></a>
                      <span class="menu-list__item__icon"
                        ><i class="fas fa-angle-right"></i
                      ></span>
                      <ul
                        class="menu-list menu-list--child menu-list--child--right"
                      >
                        <li class="menu-list__item">
                          <a href="#">menu_item 1</a>
                        </li>
                        <li class="menu-list__item">
                          <a href="#">menu_item 2</a>
                        </li>
                        <li class="menu-list__item">
                          <a href="#">menu_item 3</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-list__item">
                  <a href="#"
                    >about <i class="fas fa-angle-down" style="opacity: 0.5"></i
                  ></a>
                  <ul class="menu-list menu-list--child">
                    <li class="menu-list__item"><a href="#">menu_item 1</a></li>
                    <li class="menu-list__item"><a href="#">menu_item 2</a></li>
                    <li class="menu-list__item"><a href="#">menu_item 3</a></li>
                  </ul>
                </li>
                <li class="menu-list__item"><a href="/shop.html">shop</a></li>
                <li class="menu-list__item"><a href="#">catalogue</a></li>
                <li class="menu-list__item"><a href="#">new arrivals</a></li>
                <li class="menu-list__item"><a href="#">contact</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="section-box section-footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-6">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h3 class="section-footer__title">Navigations</h3>
                </div>
                <div class="col-4">
                  <ul>
                    <li><a href="#">Sell online</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Shopping cart</a></li>
                    <li><a href="#">Store builder</a></li>
                  </ul>
                </div>
                <div class="col-4">
                  <ul>
                    <li><a href="#">Mobile commerce</a></li>
                    <li><a href="#">Dropshipping</a></li>
                    <li><a href="#">Website development</a></li>
                  </ul>
                </div>
                <div class="col-4">
                  <ul>
                    <li><a href="#">Point of sale</a></li>
                    <li><a href="#">Hardware</a></li>
                    <li><a href="#">Software</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <h3 class="section-footer__title">Promo</h3>
                  <a href="">
                    <img src="https://via.placeholder.com/433x200" alt="" />
                    <h3>Finding Your Perfect Shoes</h3>
                    <p>Promo from nuary 15 — 25, 2019</p>
                  </a>
                </div>
                <div class="col-6">
                  <h3 class="section-footer__title">Contact Info</h3>
                  <ul>
                    <li>
                      <i class="fas fa-map-marker-alt"></i> 203 Fake St.
                      Mountain View, San Francisco, California, USA
                    </li>
                    <li>
                      <i class="fas fa-phone-alt"></i>
                      <a href="tel://23923929210">+2 392 3929 210</a>
                    </li>
                    <li>
                      <i class="fas fa-envelope"></i> emailaddress@domain.com
                    </li>
                  </ul>
                  <form action="">
                    <label for="">Subscribe</label>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-group__input"
                        placeholder="Email"
                      />
                      <div class="form-group__btn">
                        <button type="submit" class="btn-default">SEND</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <p class="copy-right padding-tb center">
              Copyright ©2020 All rights reserved | This template is made with
              by Colorlib
            </p>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{ asset('AdminLTE/pulgin/jquery/jquery.js')}}"></script>
    @stack('bottom')
  </body>
</html>

