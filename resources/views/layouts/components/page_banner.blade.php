<section class="section-breadcrumb margin-b-50">
    @if (request()->is('login') || request()->is('register') || request()->is('password/reset*')) d-none @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row bb-breadcrumb-inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="bb-breadcrumb-title">@yield('title', 'Title')</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="bb-breadcrumb-list">
                            <li class="bb-breadcrumb-item"><a href="{{ route('home') }}">{{ __('menu.home') }}</a></li>
                            <li><i class="ri-arrow-right-double-fill"></i></li>
                            @hasSection('parentTitle')
                            <li class="bb-breadcrumb-item"><a href="@yield('parentUrl')">@yield('parentTitle', 'Parent Title')</a></li>
                            <li><i class="ri-arrow-right-double-fill"></i></li>
                            @endif
                            <li class="bb-breadcrumb-item active">@yield('title', 'Title')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-category mb-24">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-6">
                    <a class="bb-category-box category-items-3" href="{{ url('/productComplex') }}">
                        <div class="category-sub-contact">
                            <h5>{{ __('menu.productComplexBuild') }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>