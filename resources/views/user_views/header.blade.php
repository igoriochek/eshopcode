<header class="products-header-banner">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 position-relative">
                <div class="header-inner-title">
                    <div class="d-flex align-items-center mb-1" style="gap: 20px">
                        <i class="fa-regular fa-paper-plane fs-4 text-light"></i>
                        <span class="header-span"></span>
                        <ul class="d-flex flex-wrap align-items-center p-0 m-0 list-unstyled">
                            <li>
                                <a class="header-subtitle-home" href="{{ url('/home') }}">
                                    {{ __('names.home') }}
                                </a>
                            </li>
                            <li class="header-subtitle-route">
                                {{ $title }}
                            </li>
                        </ul>
                    </div>
                    <h1 class="header-title">
                        {{ $title }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom"></div>
</header>
