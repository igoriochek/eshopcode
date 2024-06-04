<div class="col-12 pt-8">
   {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
   <div class="product-list-item">
      <div class="product-list-img img-zoom-effect">
         <a href="{{ route('viewproduct', $product->id) }}">
            @if ($product->image)
            <img class="img-full" src="{{ $product->image }}" alt="{{ $product->name }}">
            @else
            <img class="img-full" src="{{ asset('template/images/product/medium-size/shop/1-1-290x350.jpg') }}" alt="product">
            @endif
         </a>
      </div>
      <div class="product-list-content">
         <a class="product-name pb-2" href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
         <div class="price-box pb-1">
            @if ($product->discount)
            <span class="new-price">
               €{{ number_format($product->price - (round(($product->price * $product->discount->proc / 100), 2)), 2) }}
            </span>
            <span class="old-price">
               €{{ number_format($product->price, 2) }}
            </span>
            @else
            <span class="new-price">
               €{{ number_format($product->price, 2) }}
            </span>
            @endif
         </div>
         <div class="rating-box pb-2">
            <ul>
               @for($i = 1; $i <= 5; $i++) <li>
                  <i class="
                        @if ($product->average >= $i) fa fa-star
                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                        @else fa-regular fa-star-o
                        @endif"></i>
                  </li>
               @endfor
            </ul>
         </div>
         <p class="short-desc mb-0">{!! $product->description !!}</p>
         <div class="product-add-action" style="flex-direction: row; ">
            <ul>
               <li>
                  <button type="submit" class="tp-product-action" style="width: 45px; height: 45px;" id="add_to_cart" data-tippy="{{ __('buttons.addToCart') }}" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                     <i class="pe-7s-cart"></i>
                  </button>
               </li>
            </ul>
            <div class="quantity">
               <div class="cart-plus-minus">
                  {!! Form::text('count', "1", [
                  'class' => 'cart-plus-minus-box tp-cart-input',
                  "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                  "]) !!}
               </div>
            </div>
         </div>
      </div>
   </div>
   <input type="hidden" name="id" value="{{ $product->id }}">
   {!! Form::close() !!}
</div>
