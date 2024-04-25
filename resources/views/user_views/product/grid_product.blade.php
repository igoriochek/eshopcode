<div class="col-xl-4 col-md-6 col-sm-6">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
        <div class="tp-product-item-2 mb-40">
            <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                <a href="{{ route('viewproduct', $product->id) }}">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('template/img/product/2/prodcut-1.jpg') }}" alt="product">
                    @endif
                </a>
                <!-- product action -->
                <div class="tp-product-action-2 tp-product-action-blackStyle">
                    <div class="tp-product-action-item-2 d-flex flex-column">
                        <button type="submit" class="tp-product-action-btn-2 tp-product-add-cart-btn" id="add_to_cart">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H4.75212H14.0265H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799ZM4.74722 12.7162C3.62777 12.7162 2.68001 11.8438 2.58906 10.728L1.81046 1.4837L0.529505 1.26308C0.181854 1.20198 -0.0501969 0.873587 0.00930333 0.526523C0.0705036 0.17946 0.406255 -0.0462578 0.746256 0.00805037L2.51426 0.313534C2.79901 0.363599 3.01576 0.5995 3.04042 0.888012L3.24017 3.26484C15.3748 3.26993 15.4139 3.27587 15.4726 3.28266C15.946 3.3514 16.3625 3.59833 16.6464 3.97849C16.9303 4.35779 17.0493 4.82535 16.9813 5.29376L16.1747 10.8586C16.0225 11.9177 15.1011 12.7162 14.0301 12.7162H14.0259H4.75402H4.74722Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6629 7.67446H10.3067C9.95394 7.67446 9.66919 7.38934 9.66919 7.03804C9.66919 6.68673 9.95394 6.40161 10.3067 6.40161H12.6629C13.0148 6.40161 13.3004 6.68673 13.3004 7.03804C13.3004 7.38934 13.0148 7.67446 12.6629 7.67446Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38171 15.0212C4.63756 15.0212 4.84411 15.2278 4.84411 15.4836C4.84411 15.7395 4.63756 15.9469 4.38171 15.9469C4.12501 15.9469 3.91846 15.7395 3.91846 15.4836C3.91846 15.2278 4.12501 15.0212 4.38171 15.0212Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38082 15.3091C4.28477 15.3091 4.20657 15.3873 4.20657 15.4833C4.20657 15.6763 4.55592 15.6763 4.55592 15.4833C4.55592 15.3873 4.47687 15.3091 4.38082 15.3091ZM4.38067 16.5815C3.77376 16.5815 3.28076 16.0884 3.28076 15.4826C3.28076 14.8767 3.77376 14.3845 4.38067 14.3845C4.98757 14.3845 5.48142 14.8767 5.48142 15.4826C5.48142 16.0884 4.98757 16.5815 4.38067 16.5815Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9701 15.0212C14.2259 15.0212 14.4333 15.2278 14.4333 15.4836C14.4333 15.7395 14.2259 15.9469 13.9701 15.9469C13.7134 15.9469 13.5068 15.7395 13.5068 15.4836C13.5068 15.2278 13.7134 15.0212 13.9701 15.0212Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9692 15.3092C13.874 15.3092 13.7958 15.3874 13.7958 15.4835C13.7966 15.6781 14.1451 15.6764 14.1443 15.4835C14.1443 15.3874 14.0652 15.3092 13.9692 15.3092ZM13.969 16.5815C13.3621 16.5815 12.8691 16.0884 12.8691 15.4826C12.8691 14.8767 13.3621 14.3845 13.969 14.3845C14.5768 14.3845 15.0706 14.8767 15.0706 15.4826C15.0706 16.0884 14.5768 16.5815 13.969 16.5815Z" fill="currentColor"></path>
                        </svg>                                          
                        <span class="tp-product-tooltip tp-product-tooltip-right">{{ __('buttons.addToCart') }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="tp-product-content-2 pt-15">
                <div class="tp-product-tag-2">
                    @forelse($product->categories as $category)
                        <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                        {{ $category->name }}
                        </a>
                        @if ($loop->first)
                            @break
                        @endif
                    @empty
                    @endforelse
                </div>
                <h3 class="tp-product-title-2">
                    <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                </h3>
                <div class="tp-product-rating-icon tp-product-rating-icon-2">
                    <div class="rating py-2">
                        <div class="d-flex">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="product-rating-star text-warning
                                        @if ($product->average >= $i) fa-solid fa-star
                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                        @else fa-regular fa-star 
                                        @endif"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="tp-product-price-wrapper-2">
                    @if ($product->discount)
                        <span class="tp-product-price-2 new-price">
                            €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                        </span>
                        <span class="tp-product-price-2 old-price">
                            €{{ number_format($product->price, 2) }}
                        </span>
                    @else
                        <span class="tp-product-price-2 new-price">
                            €{{ number_format($product->price, 2) }}
                        </span>
                    @endif
                </div>
                <div class="tp-product-details-quantity pt-2">
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
            </div>
        </div>
        <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
 </div>