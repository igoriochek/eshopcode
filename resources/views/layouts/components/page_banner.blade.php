<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>@yield('title', 'Title')</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('menu.home') }}</a></li>
                        @hasSection('parentTitle')
                        <li>@yield('parentTitle', 'Parent Title')</li>
                        @endif
                        <li>@yield('title', 'Title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="@if (request()->is('login') || request()->is('register') || request()->is('password/reset*')) d-none @endif mb-24">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a class="product-complex-button" style="color: #fff !important;" href="{{ url('/productComplex') }}">{{ __('menu.productComplexBuild') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .product-complex-button {
        padding: 20px 55px;
        background: #222;
        padding-left: 6rem;
        padding-right: 6rem;
        margin-top: 2rem;
        margin-bottom: 2rem;
        border-radius: 30px;
        width: inherit;
        font-size: 14px;
        line-height: 16px;
        font-weight: 500;
        text-transform: uppercase;
        text-align: center;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    .product-complex-button:hover {
        background: #79a206;
    }
</style>