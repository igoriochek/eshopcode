<div class="page-banner-area bg-1">
    <div class="container">
        <div class="page-banner-content">
            <h1>@yield('title', 'Title')</h1>
            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        {{ __('menu.home') }}
                    </a>
                </li>
                @hasSection('parentTitle')
                    <li>
                        <a href="@yield('parentUrl')">
                            @yield('parentTitle', 'Parent Title')
                        </a>
                    </li>
                @endif
                <li>@yield('title', 'Title')</li>
            </ul>
        </div>
    </div>
</div>