{{-- <section class="breadcrumb__area include-bg pt-100 pb-50">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content p-relative z-index-1
               @if (request()->is('login') || request()->is('register') || request()->is('password/reset*')) d-flex align-items-center flex-column @endif
             ">
                <h3 class="breadcrumb__title">@yield('title', 'Title')</h3>
                <div class="breadcrumb__list">
                    <span><a href="{{ url('/') }}">{{ __('menu.home') }}</a></span>
                    @hasSection('parentTitle')
                        <span><a href="@yield('parentUrl')">@yield('parentTitle', 'Parent Title')</a></span>
                    @endif
                    <span>@yield('title', 'Title')</span>
                </div>
             </div>
          </div>
       </div>
    </div>
</section> --}}

<div class="breadcrumb-area breadcrumb-height"
    data-bg-image="{{ asset('template/images/breadcrumb/bg/1-1-1920x400.jpg') }}"
    style="background-image: url({{ asset('template/images/breadcrumb/bg/1-1-1920x400.jpg') }});">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="breadcrumb-item text-night-rider">
                    <h2 class="breadcrumb-heading">
                        @yield('title', 'Title')
                    </h2>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('menu.home') }} /
                            </a>
                        </li>
                        @hasSection('parentTitle')
                            <li>
                                <a href="@yield('parentUrl')">
                                    @yield('parentTitle', 'Parent Title') /
                                </a>
                            </li>
                        @endif
                        <li>
                            @yield('title', 'Title')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
