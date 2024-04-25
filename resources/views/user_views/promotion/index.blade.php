@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
    <section class="tp-postbox-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-xl-9 col-lg-8">
                 <div class="tp-postbox-wrapper pr-50">
                    <p class="fs-6">
                        {{ __('names.showing') }}
                        @if ($promotions->currentPage() !== $promotions->lastPage())
                            {{ ($promotions->count() * $promotions->currentPage() - $promotions->count() + 1).__('–').($promotions->count() * $promotions->currentPage()) }}
                        @else
                            @if ($promotions->total() - $promotions->count() === 0)
                                {{ $promotions->count() }}
                            @else
                                {{ ($promotions->total() - $promotions->count()).__('–').$promotions->total() }}
                            @endif
                        @endif
                        {{ __('names.of') }}
                        {{ $promotions->total().' '.__('names.entries') }}
                    </p>
                    @forelse ($promotions as $promotion)
                        <article class="tp-postbox-item format-image mb-50 transition-3">
                            <div class="tp-postbox-content">
                                <h5 class="tp-postbox-title pb-2">
                                    {{ $promotion->name }}
                                </h5>
                                <div class="row">
                                    @forelse ($promotion->products as $product)
                                        @include('user_views.product.grid_product')
                                        @if ($loop->iteration > 2)
                                            <div class="tp-category-main-result text-center mb-35">
                                                <p>{{ __('names.showing') }} {{ $loop->iteration }} {{ __('names.of') }} {{ count($promotion->products) }} {{ __('names.entries') }}</p>
                                                <div class="tp-category-main-result-bar">
                                                <span data-width="40%" style="width: 40%;"></span>
                                                </div>
                                            </div>
                                            <div class="tp-category-main-more text-center mb-35">
                                                <a href="{{ route("promotion", ["id" => $promotion->id]) }}" class="tp-load-more-btn">
                                                    {{ __("names.more_for_promotions") }} 
                                                </a>
                                            </div>
                                            @break
                                        @endif
                                    @empty
                                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                                    @endforelse
                                 </div>
                            </div>
                        </article>
                    @empty
                        <span class="text-muted">{{ __('names.noPromotions') }}</span>
                    @endforelse
                    <div class="tp-blog-pagination mt-50">
                       <div class="tp-pagination">
                            {{ $promotions->onEachSide(1)->links() }}
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-3 col-lg-4">
                 <div class="tp-sidebar-wrapper tp-sidebar-ml--24">

                    <!-- categories start -->
                    <div class="tp-sidebar-widget widget_categories mb-35">
                       <h3 class="tp-sidebar-widget-title">{{ __('names.promotions') }}</h3>
                       <div class="tp-sidebar-widget-content">
                            @include('user_views.promotion.promotion_tree')
                       </div>
                    </div>
                    <!-- categories end -->

                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection