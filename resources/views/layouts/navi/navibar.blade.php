<main class="main-wrapper">
<div class="header-section header-sticky">
    <div class="header-main-06">
        <div class="container custom-container position-relative">
            <div class="row align-items-center">
                <div class="col-xl-3 col-6">
                    <div class="header-logo">
                        <a href="{{ route('home') }}"><h2 class="about-content-02__main-title" data-aos="fade-up" data-aos-duration="1000">LOGO</h2></a>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                    <div class="header-navigation">
                        <nav class="menu-primary">
                            <ul class="menu-primary__container justify-content-center">
                                @include('layouts.usermenu')
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="header-inner">
                        @if (Auth::user())
                        <div class="header-action">
                            <a href="/user/viewcart" class="header-action__btn">
                                <i class="far fa-shopping-cart fs-3"></i>
                                @if (!empty($cartItemCount))
                                <span class="header-action__number">{{ $cartItemCount }}</span>
                                @endif
                            </a>
                        </div>
                        @endif
                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle">
                            <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                        </div>
                        <!-- Header Mobile Toggle End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
