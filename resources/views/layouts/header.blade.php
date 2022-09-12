<header>

        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-6"><i class="icon-phone"></i><strong>0045 043204434</strong>
                        <span id ="opening">
                <i class=" icon-clock-1 "></i>
                {{__('footer.workHours')}}
                </span></div>
                    <div class="col-6">
                        <ul id="top_links">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @auth
                                    @if ( Auth::user()->type == 1 )

                                    @elseif( Auth::user()->type == 2 )
                                    @endif
                                @endauth
                                <li>
                                    <div class="dropdown dropdown-mini">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if( Auth::user()->type == 2 )
                                                <a class="dropdown-item" href="/user/userprofile">{{__('menu.userInfo')}}</a>
                                            @endif
                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                        {{ __('menu.logout') }}
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endguest
                            <li id="social_top" style="opacity: 1">
                                <a href="#0">
                                    <i class="icon-facebook">
                                    </i>
                                </a>
                                <a href="#0">
                                    <i class="icon-instagram">
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->

    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li class="submenu">
                            <a href="/user/rootcategories" class="show-submenu">{{__('menu.categories')}}<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li class="third-level"><a href="/user/innercategories/1">Keshawn D&#039;Amore<strong class="badge badge-danger"></strong></a>
                                    <ul>
                                        <li><a href="/user/innercategories/16">Ms. Marietta Waelchi DDS</a></li>
                                        <li><a href="/user/innercategories/19">Mrs. Corene Volkman MD</a></li>
                                    </ul>
                                </li>
                                <li class="third-level"><a hhref="/user/innercategories/2">Hazle Parker II<strong class="badge badge-danger"></strong></a>
                                    <ul>
                                        <li class="third-level"><a href="/user/innercategories/10">Velda Dibbert<strong class="badge badge-danger"></strong></a>
                                            <ul>
                                                <li><a href="/user/innercategories/15">Dr.Gianni CollinsIV</a></li>
                                                <li><a href="/user/innercategories/17">Hudson Hettinger</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/user/innercategories/11">Jermaine Lynch III</a></li>
                                        <li><a href="/user/innercategories/18">Clementine Cummerata</a></li>
                                    </ul>
                                </li>
                                <li class="third-level"><a href="/user/innercategories/3">Marc Doyle IV<strong class="badge badge-danger"></strong></a>
                                    <ul>
                                        <li><a href="/user/innercategories/8">Rae Sawayn</a></li>
                                        <li><a href="/user/innercategories/12">Marshall Reinger</a></li>
                                    </ul>
                                </li>
                                <li><a href="/user/innercategories/4">Delilah Cronin</a></li>
                                <li class="third-level"><a href="/user/innercategories/5">Santa Walker DDS<strong class="badge badge-danger"></strong></a>
                                    <ul>
                                        <li class="third-level"><a href="/user/innercategories/9">Elta Crist DVM<strong class="badge badge-danger"></strong></a>
                                            <ul>
                                                <li><a href="/user/innercategories/14">Cydney Lynch</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="/user/innercategories/21">Dr. Roscoe Legros</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="/user/promotions" class="show-submenu">{{__('menu.promotions')}}<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="/user/promotion/1">Prof.Moshe Funk</a>
                                <li><a href="/user/promotion/2">Dorian Kihn</a>
                                <li><a href="/user/promotion/3">David Zboncak</a>
                                <li><a href="/user/promotion/4">Leanne Pollich DVM</a>
                                <li><a href="/user/promotion/5">Miss Kayli Hintz DDS</a>
                                <li><a href="/user/promotion/6">Terrell Auer</a>
                                <li><a href="/user/promotion/7">Oma Thiel</a>
                                <li><a href="/user/promotion/8">Mrs.Fanny Oberbrunnner DDS</a>
                                <li><a href="/user/promotion/9">Eldred Reichel</a>
                                <li><a href="/user/promotion/10">Jacklyn Thiel</a>
                            </ul>
                        </li>
                        <li><a href="/user/products" class="show-submenu">{{__('menu.products')}}</a></li>
                        <li><a href="/user/viewcart" class="show-submenu">{{__('menu.cart')}}</a></li>
                        <li><a href="/user/rootorders" class="show-submenu">{{__('menu.orders')}}</a></li>
                        <li><a href="/user/rootoreturns" class="show-submenu">{{__('menu.returns')}}</a></li>
                        <li><a href="/user/discountCoupons" class="show-submenu">{{__('menu.discountCoupons')}}</a></li>
                        <li><a href="/user/messenger" class="show-submenu">{{__('menu.messenger')}}</a></li>
                    </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools">
                    <li>
                        <div class="dropdown dropdown-cart">
                            <a href="#" data-bs-toggle="dropdown" class="cart_bt"><i class="icon_bag_alt"></i><strong>3</strong></a>
                            <ul class="dropdown-menu" id="cart_items">
                                <li>
                                    <div class="image"><img src="img/thumb_cart_1.jpg" alt="image"></div>
                                    <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="img/thumb_cart_2.jpg" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div class="image"><img src="img/thumb_cart_3.jpg" alt="image"></div>
                                    <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                    <a href="#" class="action"><i class="icon-trash"></i></a>
                                </li>
                                <li>
                                    <div>Total: <span>$120.00</span></div>
                                    <a href="cart.html" class="button_drop">Go to cart</a>
                                    <a href="payment.html" class="button_drop outline">Check out</a>
                                </li>
                            </ul>
                        </div><!-- End dropdown-cart-->
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->

<section id="hero" class="background-image" data-background="url(img/header_bg.jpg)">
    <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.8)">
        <div class="intro_title">
            <h3 class="animated fadeInDown">Affordable Paris tours</h3>
            <p class="animated fadeInDown" style="text-align: center">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>
            <a href="#" class="animated fadeInUp button_intro">View Tours</a> <a href="#" class="animated fadeInUp button_intro outline">View Tickets</a>
        </div>
    </div>
    <!-- End opacity-mask-->
</section>
<!-- End section -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>

<script src="js/jquery.selectbox-0.2.js"></script>
<script>
    // ----------------------- SELECTBOX --------------------------- //
    // change style for select box
    $(".selectbox").selectbox();
</script>
