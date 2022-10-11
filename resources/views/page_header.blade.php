<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow">
                <i class="fi-rs-home mr-5"></i>
                {{ __('menu.home') }}
            </a>
            <span></span>
            <a href="{{ Auth::user() ? url("/user/$secondPageLink") : url("/$secondPageLink") }}">
                {{ $secondPageName ?? '' }}
            </a>
            @if ($hasThirdPage)
                <span></span>
                {{ $thirdPageName ?? '' }}
            @endif
        </div>
    </div>
</div>
