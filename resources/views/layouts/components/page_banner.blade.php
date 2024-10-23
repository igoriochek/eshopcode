<nav class="breadcrumb-section bg-white pt-5 pb-6rem
    @if (request()->is('login') || request()->is('register') || request()->is('password/reset*')) d-none @endif">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title mb-4">@yield('title', 'Title')</h1>
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('menu.home') }}</a></li>
                    @hasSection('parentTitle')
                    <li class="breadcrumb-item"><a href="@yield('parentUrl')">@yield('parentTitle', 'Parent Title')</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">@yield('title', 'Title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
</nav>
