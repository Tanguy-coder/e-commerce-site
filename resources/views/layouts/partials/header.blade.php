<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block">
               <div class="container-fluid">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                                <div class="flag">
                                    <img src="assets/img/icon/header_icon.png" alt="">
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">KARA</option>
                                                <option value="">LOME</option>
                                                <option value="">SOKODE</option>
                                                <option value="">DAPAONG</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <ul class="contact-now">
                                    <li>+228 90710906</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                               <ul>
                                   <li><a href="login.html">My Account </a></li>
                                   <li><a href="product_list.html">Wish List  </a></li>
                                   <li><a href="cart.html">Shopping</a></li>
                                   <li><a href="cart.html">Cart</a></li>
                                   <li><a href="checkout.html">Checkout</a></li>
                               </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
           <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                              <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href=" {{route('store.home')}} ">Home</a></li>
                                        <li><a href="Catagori.html">Catagori</a></li>
                                        <li class="hot"><a href="#">Latest</a>
                                            <ul class="submenu">
                                                <li><a href="{{route('products.index')}}"> Product list</a></li>
                                                <li><a href=""> Product Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="cart.html">Card</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="confirmation.html">Confirmation</a></li>
                                                <li><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Product Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block">
                                    <div class="form-box f-right ">
                                        <form action=" {{route('products.search')}} " method="">
                                            <input type="text" name="search" placeholder="Search products" value=" {{request()->search ?? ''}} ">
                                            <div class="search-icon ">
                                                <button class="mb-0" type="submit"><i class="fas fa-search special-tag"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                 </li>
                                <li class=" d-none d-xl-block">
                                    <div class="favorit-items">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{route('cart.index')}}"><i class="fas fa-shopping-cart">{{Cart::count()}}</i></a>
                                    </div>
                                </li>
                               <li class="d-none d-lg-block"> <a href="#" class="btn header-btn">Sign in</a></li>
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>
