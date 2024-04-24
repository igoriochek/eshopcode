<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
       <div class="offcanvas__close">
          <button class="offcanvas__close-btn offcanvas-close-btn">
             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
       </div>
       <div class="offcanvas__content">
          <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
             <div class="offcanvas__logo logo">
                <a href="{{ url('/') }}">
                   <img src="{{ asset('images/dts_logo_black.png') }}" alt="logo">
                </a>
             </div>
          </div>
          <div class="tp-main-menu-mobile fix mb-40">
            <nav class="tp-main-menu-content">
                            <ul>
                                <li>
                                    <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                                    </li>
                                    <li class="has-dropdown">
                                            <a href="{{ url('/user/userprofile') }}">
                                                {{ __('menu.profile') }}
                                            </a>
                                            <ul class="tp-submenu">
                                                <li>
                                                    <a href="{{ url('/user/rootorders') }}">{{ __('menu.orders') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/user/rootoreturns') }}">{{ __('menu.returns') }}</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="py-1">
                                                        <form class="m-0 p-0" id="logout-form" action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                            <a class="fs-6 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                {{ __('menu.logout') }}
                                                            </a>
                                                        </form>
                                                    </a>
                                                </li>
                                            </ul>
                                    </li>
                               @endauth
                            </ul>
            </nav>
          </div>
          @guest
            <div class="offcanvas__btn">
                <a href="{{ route('login') }}" class="tp-btn-2 tp-btn-border-2">
                    {{ __('auth.login') }}
                </a>
            </div>
          @endguest
       </div>
       <div class="offcanvas__bottom">
          <div class="offcanvas__footer d-flex align-items-center justify-content-between">
             <div class="offcanvas__select language">
                <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                   <div class="offcanvas__lang-wrapper">
                      <span class="offcanvas__lang-selected-lang tp-lang-toggle" id="tp-offcanvas-lang-toggle">
                        {{ strtoupper(config('app.locale')) }}
                      </span>
                      <ul class="offcanvas__lang-list tp-lang-list">
                        @foreach (config('translatable.locales') as $locale)
                            <li onclick="changeLanguage('{{ strtoupper($locale) }}')">
                                {{ strtoupper($locale) }}
                            </li>
                        @endforeach
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>