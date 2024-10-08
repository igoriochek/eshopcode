<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
    <div class="offcanvas-header d-flex align-items-center mt-4">
        <a href="index.html" class="d-flex align-items-center mb-md-0 text-decoration-none">
            <img src="assets/img/logo-color.png" alt="logo" class="img-fluid ps-2" />
        </a>
        <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="flaticon-cancel"></i>
        </button>
    </div>
    <div class="offcanvas-body z-10">
        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
            <li>
                <a href="{{ url('/products') }}" class="nav-link">{{ __('menu.products') }}</a>
            </li>
            <li>
                <a href="{{ url('/rootcategories') }}" class="nav-link">{{ __('menu.categories') }}</a>
            </li>
            <li>
                <a href="{{ url('/promotions') }}" class="nav-link">{{ __('menu.promotions') }}</a>
            </li>
            @auth
            <li>
                <a href="{{ url('/user/discountCoupons') }}" class="nav-link">{{ __('menu.discountCoupons') }}</a>
            </li>
            <li>
                <a href="{{ url('/user/messenger') }}" class="nav-link">{{ __('menu.messenger') }}</a>
            </li>
            @endauth
        </ul>
    </div>
</div>