@extends('layouts.app')

@section('title', $promotion->name ?? __('names.promotion'))
@section('parentTitle', __('menu.promotions'))
@section('parentUrl', url('/promotions'))

@section('content')
<section class="shop-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            <div class="col-xl-3 col-lg-4 order-lg-1 order-2 pt-10 pt-lg-0">
               <div class="sidebar-area style-2">
                  <div class="widgets-area mb-9">
                     <h2 class="widgets-title mb-5">{{ __('names.promotions') }}</h2>
                     @include('user_views.promotion.promotion_tree')
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
               <h5 class="tp-postbox-title pb-4">
                  {{ $promotion->name }}
               </h5>
               <div class="product-topbar">
                    <ul>
                        <li class="page-count">
                            {{ __('names.showing') }}
                            <span>
                                @if ($products->currentPage() !== $products->lastPage())
                                {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                @else
                                @if ($products->total() - $products->count() === 0)
                                {{ $products->count() }}
                                @else
                                {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                @endif
                                @endif
                            </span>
                            {{ __('names.of') }}
                            <span>{{ $products->total() }}</span>
                            {{ __('names.entries') }}
                        </li>
                        <li class="short">
                           <a href="{{ route("promotions") }}" class="tp-load-more-btn">
                                        {{ __('buttons.backToAllPromotions') }}
                                    </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content text-charcoal">
                    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                        <div class="product-grid-view row">
                            @forelse ($products as $product)
                            @include('user_views.product.grid_product')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="pagination-area pt-10">
                    <nav aria-label="Page navigation example">
                        <div class="pagination justify-content-end">
                            {{ $products->onEachSide(1)->links() }}
                            </div>
                    </nav>
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