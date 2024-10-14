<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom left; margin-top: 55px;">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-12">
            <h1 class="display-5 fw-bold">@yield('title', 'Title')</h1>
            <p class="lead">
               <span><a href="{{ url('/') }}">{{ __('menu.home') }}</a></span>
               @hasSection('parentTitle')
               <span><a href="@yield('parentUrl')">@yield('parentTitle', 'Parent Title')</a></span>
               @endif
               <span>@yield('title', 'Title')</span>
            </p>
         </div>
      </div>
      <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
   </div>
</section>