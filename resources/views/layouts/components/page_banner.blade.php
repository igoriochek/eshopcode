<div class="axil-breadcrumb-area
    @if (request()->is('login') || request()->is('register') || request()->is('password/reset*')) d-none @endif">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item">
                            <a href="{{ route('home') }}">
                                {{ __('menu.home') }}
                            </a>
                        </li>
                        @hasSection('parentTitle')
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item" aria-current="page">
                                <a href="@yield('parentUrl')">
                                    @yield('parentTitle', 'Parent Title')
                                </a>
                            </li>
                        @endif
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">
                            @yield('title', 'Title')
                        </li>
                    </ul>
                    <h1 class="title mb-4">@yield('title', 'Title')</h1>
                </div>
            </div>
        </div>
    </div>
</div>
