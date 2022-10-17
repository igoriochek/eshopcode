<!-- Page Banner Section Start -->
<div class="page-banner bg-color-05">
    <div class="container">

        <!-- Page Breadcrumb Start -->
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ Auth::user() ? url("/user/$secondPageLink") : url("/$secondPageLink") }}">
                        {{ $secondPageName ?? '' }}
                    </a>
                </li>
                @if ($hasThirdPage)
                    <li class="breadcrumb-item active">{{ $thirdPageName ?? '' }}</li>
                @endif
            </ul>
        </div>
        <!-- Page Breadcrumb End -->

        <!-- Page Banner Caption Start -->
        <div class="page-banner__caption text-center">
            <h2 class="page-banner__main-title">
                @if ($hasThirdPage)
                    {{ $thirdPageName ?? '' }}
                @else
                    {{ $secondPageName ?? '' }}
                @endif
            </h2>
        </div>
        <!-- Page Banner Caption End -->

    </div>
</div>
<!-- Page Banner Section End -->
