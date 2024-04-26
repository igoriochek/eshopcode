<section class="breadcrumb__area include-bg pt-100 pb-50">
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
</section>