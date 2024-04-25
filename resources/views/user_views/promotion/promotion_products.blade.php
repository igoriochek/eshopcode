@extends('layouts.app')

@section('title', $promotion->name ?? __('names.promotion'))
@section('parentTitle', __('menu.promotions'))
@section('parentUrl', url('/promotions'))

@section('content')
    {{-- <div class="shop-area ptb-70">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-lg-9">
                    <div class="shop-top-shorting-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-left-content">
                                    <ul>
                                        <li>
                                            <h5 class="mb-1">{{ $promotion->name }}</h5>
                                            <p>
                                                {{ __('names.showing') }}
                                                @if ($products->currentPage() !== $products->lastPage())
                                                    {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                                @else
                                                    @if ($products->total() - $products->count() === 0)
                                                        {{ $products->count() }}
                                                    @else
                                                        {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                                    @endif
                                                @endif
                                                {{ __('names.of') }}
                                                {{ $products->total().' '.__('names.entries') }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-right-content">
                                    <ul>
                                        <li>
                                            <a href="{{ route("promotions") }}" class="default-btn style5">
                                                {{ __('buttons.backToAllPromotions') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="products-collections-filter" class="row justify-content-center">
                        @forelse ($products as $product)
                            @include('user_views.product.product')
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                    </div>
                    <div class="default-pagination mt-20">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="single-shop-sidebar-widget color-and-item">
                            <h3>{{ __('names.promotions') }}</h3>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="tp-shop-area pb-120">
        <div class="container">
           <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
              <div class="col-xl-9 col-lg-8">
                 <div class="tp-shop-main-wrapper">
                    
                    <div class="tp-shop-top mb-45">
                       <div class="row">
                          <div class="col-xl-6">
                             <div class="tp-shop-top-left d-flex align-items-center ">
                                <div class="tp-shop-top-tab tp-tab">
                                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                                       <li class="nav-item" role="presentation">
                                         <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" aria-controls="grid-tab-pane" aria-selected="true">
                                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             </svg>
                                         </button>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                         <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" aria-controls="list-tab-pane" aria-selected="false">
                                             <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 1H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                             </svg>
                                         </button>
                                       </li>
                                     </ul>
                                 </div>
                                <div class="tp-shop-top-result">
                                   <p>
                                        {{ __('names.showing') }}
                                        @if ($products->currentPage() !== $products->lastPage())
                                            {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                        @else
                                            @if ($products->total() - $products->count() === 0)
                                                {{ $products->count() }}
                                            @else
                                                {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                            @endif
                                        @endif
                                        {{ __('names.of') }}
                                        {{ $products->total().' '.__('names.entries') }}
                                   </p>
                                </div>
                             </div>
                          </div>
                          {{-- <div class="col-xl-6">
                            <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                               <div class="tp-shop-top-select">
                                    <a href="{{ route("promotions") }}" class="tp-load-more-btn">
                                        {{ __('buttons.backToAllPromotions') }}
                                    </a>
                               </div>
                            </div>
                         </div> --}}
                       </div>
                    </div>
                    <div class="tp-shop-items-wrapper tp-shop-item-primary">
                       <div class="tab-content" id="productTabContent">
                          <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                             <div class="row">
                                @forelse ($products as $product)
                                    @include('user_views.product.grid_product')
                                @empty
                                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                                @endforelse
                             </div>
                          </div>
                          <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="0">
                            <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
                               <div class="row">
                                  <div class="col-xl-12">
                                       @forelse ($products as $product)
                                           @include('user_views.product.list_product')
                                       @empty
                                           <span class="text-muted">{{ __('names.noProducts') }}</span>
                                       @endforelse
                                  </div>
                               </div>
                            </div>
                         </div>
                        </div>                            
                    </div>
                    <div class="tp-shop-pagination mt-20">
                       <div class="tp-pagination">
                           {{ $products->onEachSide(1)->links() }}
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xl-3 col-lg-4">
                <div class="tp-sidebar-wrapper">
                    <h3 class="tp-sidebar-widget-title">{{ __('names.promotions') }}</h3>

                    <!-- categories start -->
                    <div class="tp-sidebar-widget widget_categories mb-35">
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

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush