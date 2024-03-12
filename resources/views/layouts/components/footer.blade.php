<div class="footer-area bg-dark pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-footer-widget logo-content">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/CM_logo.png') }}" alt="logo" class="bg-white p-3">
                        </a>
                    </div>
                    <ul>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <h5>{{ __('footer.address') }}:</h5>
                            <span>Žalgirio g. 93, LT-08218, VILNIUS</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <h5>{{ __('footer.email') }}:</h5>
                            <a href="mailto:info@consultusmagnus.com">info@consultusmagnus.com</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <h5>{{ __('footer.phone') }}:</h5>
                            <a href="tel:37062023126">+37062023126</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget useful-link">
                    <h3>{{ __('footer.menu') }}</h3>
                    <ul class="link-list">
                        <li>
                            <a href="{{ url('/products') }}" 
                                class="{{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                                {{ __('menu.products') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/rootcategories') }}" 
                                class="{{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                                {{ __('menu.products') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/promotions') }}" class="{{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                                {{ __('menu.categories') }}
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ url('/user/discountCoupons') }}" class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                                    {{ __('menu.discountCoupons') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/messenger') }}" class="{{ request()->is('user/messenger*') ? 'active' : '' }}">
                                    {{ __('menu.messenger') }}
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget information">
                    <h3>{{ __('footer.information') }}</h3>
                    <ul class="link-list">
                        <li>
                            <a href="{{ url('/about_us') }}" class="{{ request()->is('about_us') ? 'active' : '' }}">
                                {{ __('menu.aboutUs') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/termsofservice') }}" class="{{ request()->is('termsofservice') ? 'active' : '' }}">
                                {{ __('menu.termsofservice') }}
                            </a>
                        </li>   
                        <li>
                            <a href="{{ url('/policy') }}" class="{{ request()->is('termsofservice') ? 'active' : '' }}">
                                {{ __('menu.policy') }}
                            </a>
                        </li>   
                        <li>
                            <a href="{{ url('/eu_projects') }}" class="{{ request()->is('eu_projects') ? 'active' : '' }}">
                                {{ __('menu.euProjects') }}
                            </a>
                        </li>   
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="single-footer-widget my-account">
                    <h3>{{ __('footer.account') }}</h3>
                    <ul class="link-list">
                        @auth
                            <li>
                                <a href="{{ url('/user/viewcart') }}" 
                                    class="{{ request()->is('user/viewcart*') ? 'active' : '' }}">
                                    {{ __('menu.cart') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" 
                                    class="{{ request()->is('user/rootorders*') ? 'active' : '' }}">
                                    {{ __('menu.orders') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" 
                                    class="{{ request()->is('user/rootoreturns*') ? 'active' : '' }}">
                                    {{ __('menu.returns') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/userprofile') }}" 
                                    class="{{ request()->is('user/userprofile*') ? 'active' : '' }}">
                                    {{ __('menu.profile') }}
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" 
                                    class="{{ request()->is('login*') ? 'active' : '' }}">
                                    {{ __('buttons.login') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" 
                                    class="{{ request()->is('register*') ? 'active' : '' }}">
                                    {{ __('buttons.register') }}
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>