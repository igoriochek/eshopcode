<header class="main-header position-absolute w-100">
    <nav class="navbar navbar-expand-xl navbar-light sticky-header z-10 affix">
        <div class="container d-flex align-items-center justify-content-lg-between position-relative">
            <a href="index.html" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                <img src="assets/img/logo-white.png" alt="logo" class="img-fluid logo-white" />
            </a>
            <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                    data-bs-toggle="offcanvas" role="button"></i>
            </a>
            <div class="clearfix"></div>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                    <li>
                        <a href="{{ url('/products') }}"
                            class="nav-link {{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                            {{ __('menu.products') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/rootcategories') }}"
                            class="nav-link {{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                            {{ __('menu.categories') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/promotions') }}"
                            class="nav-link {{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                            {{ __('menu.promotions') }}
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="{{ url('/user/discountCoupons') }}"
                            class="nav-link {{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                            {{ __('menu.discountCoupons') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user/messenger') }}"
                            class="nav-link {{ request()->is('user/messenger*') ? 'active' : '' }}">
                            {{ __('menu.messenger') }}
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
            <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block" style="display: flex !important; justify-content: space-between;">
                @auth

                <div class="tp-header-action-item" style="margin-right: 20px;">
                    <a href="{{ url('/user/viewcart') }}" class="nav-link">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="tp-header-action-badge">{{ $cartItemCount ?? 0 }}</span>
                    </a>
                </div>



                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-user pt-2"></i>
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white" style="left: 93% !important">
                    <div class="dropdown-grid rounded-custom width-full" style="grid-template-columns: none !important; width: 100%">
                        <div class="dropdown-grid-item bg-white radius-left-side" style="border-bottom-left-radius: none !important; border-top-right-radius: 1rem;">

                            <a class="dropdown-link px-0" href="{{ url('/user/userprofile') }}"
                                style="color: {{ request()->is('user/userprofile*') ? '#0989FF' : '' }}">
                                <div class="drop-title">{{ __('menu.profile') }}</div>
                            </a>

                            <a class="dropdown-link px-0" href="{{ url('/user/rootorders') }}"
                                style="color: {{
                                                request()->is('user/rootorders*')
                                                || request()->is('user/vieworder*')
                                                || request()->is('user/cancelorder*')
                                                || request()->is('user/returnorder*')
                                                ? '#0989FF' : ''
                                                }}">
                                <div class="drop-title">{{ __('menu.orders') }}</div>
                            </a>

                            <a class="dropdown-link px-0" href="{{ url('/user/rootoreturns') }}"
                                style="color: {{ request()->is('user/rootoreturns*') || request()->is('user/viewreturn*') ? '#a10909' : '' }}">
                                <div class="drop-title">{{ __('menu.returns') }}</div>
                            </a>
                        </div>
                        <div class="dropdown-grid-item radius-right-side bg-light-subtle" style="border-top-right-radius: none !important; border-bottom-left-radius: 1rem;">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="drop-title">{{ __('menu.logout') }}</div>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-link text-decoration-none me-2" style="padding: 10px 15px">
                    {{ __('auth.login') }}
                </a>
                @endauth


                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left: 20px; display: flex; align-items: center;">
                    {{ strtoupper(config('app.locale')) }}
                </a>
                <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white" style="left: 93% !important">
                    <div class="dropdown-grid rounded-custom width-full" style="grid-template-columns: none !important; width: 100%">
                        <div class="dropdown-grid-item bg-white radius-left-side" style="border-bottom-left-radius: none !important; border-top-right-radius: 1rem; border-bottom-right-radius: 1rem;">
                            @foreach (config('translatable.locales') as $locale)
                                <a class="dropdown-link px-0" href="javascript:void(0)" onclick="changeLanguage('{{ strtoupper($locale) }}')">
                                    <div class="drop-title">{{ strtoupper($locale) }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </nav>
</header>



<script>
    const changeLanguage = locale => {
        const currentUrl = window.location.origin;
        window.location.href = `${currentUrl}/lang/${locale.toLowerCase()}`
    }
</script>