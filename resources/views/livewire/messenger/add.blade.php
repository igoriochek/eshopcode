<div>
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.messenger') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('names.new') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 shop-col-width-lg-4">
                    <div class="shop__sidebar--widget widget__area d-block mb-5 mb-lg-0" style="top: 100px">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3 d-flex align-items-center justify-content-between">
                                {{ __('names.messages') }}
                            </h2>
                            @include('livewire.messenger.users')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 shop-col-width-lg-8">
                    <div class="shop__right--sidebar">
                        <div class="shop__product--wrapper">
                            <div class="shop__header d-flex align-items-center justify-content-between">
                                <div class="product__view--mode d-flex align-items-center">
                                    <div class="product__view--mode__list product__short--by justify-content-center d-flex flex-column">
                                        <h2 class="h2">{{ __('menu.messenger') }}</h2>
                                    </div>
                                </div>
                                <p class="product__showing--count">
                                    {{ __('names.showing') }}
                                    @if (count($addUsers) > 0)
                                        @if ($addUsers->currentPage() !== $addUsers->lastPage())
                                            {{ ($addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1).__('–').($addUsers->count() * $addUsers->currentPage()) }}
                                        @else
                                            @if ($addUsers->total() - $addUsers->count() === 0)
                                                {{ $addUsers->count() }}
                                            @else
                                                {{ ($addUsers->total() - $addUsers->count()).__('–').$addUsers->total() }}
                                            @endif
                                        @endif
                                        {{ __('names.of') }}
                                        {{ $addUsers->total().' '.__('names.entries') }}
                                    @else
                                        {{ '0 '.__('names.entries') }}
                                    @endif
                                </p>
                            </div>
                            <div class="tab_content mb-5 mt-5">
                                @include('livewire.messenger.add_users')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
