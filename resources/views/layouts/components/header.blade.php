<header>
    <div class="tp-header-area tp-header-style-primary tp-header-height" style="height: 111px;">
       <!-- header top start  -->
       <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-md-block">
          <div class="container">
             <div class="row align-items-center">
                <div class="col-md-6">
                   <div class="tp-header-info d-flex align-items-center">
                      <div class="tp-header-info-item">
                         <a href="mailto:info@dts-solutions.lt">
                            <span>
                                <i class="fa-regular fa-envelope text-primary pt-2"></i>                                  
                            </span> info@dts-solutions.lt
                            
                         </a>
                      </div>
                      <div class="tp-header-info-item">
                         <a href="tel:+3707266145">
                            <span>
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.359 2.73916C1.59079 2.35465 2.86862 0.958795 3.7792 1.00093C4.05162 1.02426 4.29244 1.1883 4.4881 1.37943H4.48885C4.93737 1.81888 6.22423 3.47735 6.29648 3.8265C6.47483 4.68282 5.45362 5.17645 5.76593 6.03954C6.56213 7.98771 7.93402 9.35948 9.88313 10.1549C10.7455 10.4679 11.2392 9.44752 12.0956 9.62511C12.4448 9.6981 14.1042 10.9841 14.5429 11.4333V11.4333C14.7333 11.6282 14.8989 11.8698 14.9214 12.1422C14.9553 13.1016 13.4728 14.3966 13.1838 14.5621C12.502 15.0505 11.6125 15.0415 10.5281 14.5373C7.50206 13.2784 2.66618 8.53401 1.38384 5.39391C0.893174 4.31561 0.860062 3.42016 1.359 2.73916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path d="M9.84082 1.18318C12.5534 1.48434 14.6952 3.62393 15 6.3358" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  <path d="M9.84082 3.77927C11.1378 4.03207 12.1511 5.04544 12.4039 6.34239" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>                                   
                            </span> +370 7 266145
                         </a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                      <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                         <div class="tp-header-top-menu-item tp-header-lang">
                            <span class="tp-header-lang-toggle" id="tp-header-lang-toggle">
                                {{ strtoupper(config('app.locale')) }}
                            </span>
                            <ul>
                                @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a href="javascript:void(0)" onclick="changeLanguage('{{ strtoupper($locale) }}')">
                                            {{ strtoupper($locale) }}
                                        </a>
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

       <!-- header bottom start -->
       <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
          <div class="container">
             <div class="tp-mega-menu-wrapper p-relative">
                <div class="row align-items-center">
                   <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                      <div class="logo">
                         <a href="{{ url('/') }}">
                            <img src="{{ asset('images/dts_logo_black.png') }}" alt="logo">
                         </a>
                      </div>
                   </div>
                   <div class="col-xl-5 d-none d-xl-block">
                      <div class="main-menu menu-style-2">
                         <nav class="tp-main-menu-content">
                            <ul>
                                <li>
                                    <a href="{{ url('/products') }}" 
                                        class="{{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                                        {{ __('menu.products') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/rootcategories') }}" 
                                        class="{{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                                        {{ __('menu.categories') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/promotions') }}" 
                                        class="{{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                                        {{ __('menu.promotions') }}
                                    </a>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{ url('/user/discountCoupons') }}" 
                                            class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                                            {{ __('menu.discountCoupons') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/messenger') }}" 
                                            class="{{ request()->is('user/messenger*') ? 'active' : '' }}">
                                            {{ __('menu.messenger') }}
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                         </nav>
                      </div>
                   </div>
                   <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                      <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                         <div class="tp-header-action d-flex align-items-center ml-30">
                            @auth
                                <div class="tp-header-action-item d-none d-lg-block">
                                    <button class="tp-header-action-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user pt-2"></i>
                                        <span class="fs-6">{{ auth()->user()->name }}</span>
                                        <i class="fa-solid fa-angle-down" style="font-size: .8rem"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
                                            style="color: {{ request()->is('user/userprofile*') ? '#0989FF' : '' }}">
                                                {{ __('menu.profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
                                            style="color: {{ 
                                                request()->is('user/rootorders*') 
                                                || request()->is('user/vieworder*')
                                                || request()->is('user/cancelorder*')
                                                || request()->is('user/returnorder*')
                                                ? '#0989FF' : '' 
                                                }}">
                                                {{ __('menu.orders') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/user/rootoreturns') }}"
                                            style="color: {{ request()->is('user/rootoreturns*') || request()->is('user/viewreturn*') ? '#a10909' : '' }}">
                                                {{ __('menu.returns') }}
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('menu.logout') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-header-action-item">
                                <a href="{{ url('/user/viewcart') }}" class="tp-header-action-btn">
                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    <span class="tp-header-action-badge">{{ $cartItemCount ?? 0 }}</span>                          
                                </a>
                                </div>
                            @else
                                <div class="tp-header-action-item d-none d-lg-block">
                                    <button type="button" class="tp-filter-btn filter-open-btn" style="padding: 10px 15px">
                                        <a href="{{ route('login') }}" class="w-100" style="padding: 10px 15px">
                                            {{ __('auth.login') }}
                                        </a>
                                     </button>
                                </div>
                            @endauth
                            <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                               <button type="button" class="tp-offcanvas-open-btn">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                     <rect x="10" width="20" height="2" fill="currentColor"></rect>
                                     <rect x="5" y="7" width="25" height="2" fill="currentColor"></rect>
                                     <rect x="10" y="14" width="20" height="2" fill="currentColor"></rect>
                                  </svg>
                               </button>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>

<script>
    const changeLanguage = locale => {
        const currentUrl = window.location.origin;
        window.location.href = `${currentUrl}/lang/${locale.toLowerCase()}`
    }
</script>