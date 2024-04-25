@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
    <section class="tp-product-details-area">
        <div class="tp-product-details-top pb-115">
           <div class="container">
              <div class="row">
                <div class="col-12">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                 <div class="col-xl-6 col-lg-6">
                    <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex me-0">
                       <div class="tab-content m-img" id="productDetailsNavContent">
                          <div class="tab-pane fade active show" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                             <div class="tp-product-details-nav-main-thumb">
                                @if ($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('template/img/product/details/main/product-details-main-1.jpg') }}" alt="{{ $product->name }}">
                                @endif
                             </div>
                          </div>
                        </div>
                    </div>
                 </div> <!-- col end -->
                 <div class="col-xl-6 col-lg-6">
                    <div class="tp-product-details-wrapper">
                       <div class="tp-product-details-category">
                          <span>
                            @forelse($product->categories as $category)
                                <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                                {{ $category->name }}
                                </a>
                                @if ($loop->first)
                                    @break
                                @endif
                            @empty
                            @endforelse
                          </span>
                       </div>
                       <h3 class="tp-product-details-title">{{ $product->name }}</h3>

                       <!-- inventory details -->
                       <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                          @if ($product->count > 0)
                            <div class="tp-product-details-stock mb-10">
                                <span>In Stock</span>
                            </div>
                          @endif
                          <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                             <div class="tp-product-details-rating">
                                <ul class="ratings list-unstyled">
                                    <li>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="product-rating-star text-warning
                                                @if ($average >= $i) fa-solid fa-star
                                                @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                @else fa-regular fa-star 
                                                @endif"></i>
                                        @endfor
                                    </li>
                                </ul>
                             </div>
                             <div class="tp-product-details-reviews">
                                <span>{{ '('.$rateCount.' '.__('names.reviews').')' }}</span>
                             </div>
                          </div>
                       </div>

                       <!-- price -->
                       <div class="tp-product-details-price-wrapper mb-20">
                            @if ($product->discount)
                                <span class="tp-product-details-price new-price">
                                    €{{ number_format($product->price - (round(($product->price * $product->discount->proc / 100), 2)), 2) }}
                                </span>
                                <span class="tp-product-details-price old-price">
                                    €{{ number_format($product->price, 2) }}
                                </span>
                            @else
                                <span class="tp-product-details-price new-price">
                                    €{{ number_format($product->price, 2) }}
                                </span>
                            @endif
                       </div>

                       <!-- actions -->
                       <div class="tp-product-details-action-wrapper">
                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                            <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">
                                    <span class="tp-cart-minus">
                                        <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>                                                            
                                    </span>
                                    {!! Form::text('count', "1", [
                                            'class' => 'tp-cart-input', 
                                            "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                                        "]) !!}
                                    <span class="tp-cart-plus">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                                <div class="tp-product-details-add-to-cart mb-15 w-100">
                                    <button type="submit" class="tp-product-details-buy-now-btn">
                                        {{ __('buttons.addToCart') }}
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                            </div>
                          {!! Form::close() !!}
                       </div>
                       {{-- <div class="tp-product-details-query">
                          <div class="tp-product-details-query-item d-flex align-items-center">
                             <span>{{ __('names.categories') }}:  </span>
                             @forelse ($product->categories as $category)
                                <a href="{{ url("/innercategories/$category->id") }}" class="link-secondary">
                                    {{ $category->name }}@if (!$loop->last),@endif
                                </a>
                             @empty
                                <span class="text-muted">{{ __('names.noCategories') }}</span>
                             @endforelse
                          </div>
                       </div> --}}
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="tp-product-details-bottom pb-140">
           <div class="container">
              <div class="row">
                 <div class="col-xl-12">
                    @include('user_views.product.product_tabs')
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

        .products-details-content .btns li .input-counter span.minus-button {
            bottom: 5px;
        }

        .products-details-content .btns li .input-counter span.plus-button {
            top: 5px;
        }

        .products-details-content .btns li .input-counter span {
            position: absolute;
            font-size: 13px;
            right: 15px;
            color: #111;
            cursor: pointer;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $('#product-reviews-add-review-submit').click(() => {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();

            const seconds = 1;
            
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") {
                        $('#review-product').html("<p class='pt-1'>{{ __('names.reviewProduct') }}</p>");
                        $('#product-reviews-add-review-submit').prop("disabled", true);
                        
                        setInterval(() => window.location.reload(), 1000 * seconds);
                    }
                }
            )
        });
    </script>
@endpush