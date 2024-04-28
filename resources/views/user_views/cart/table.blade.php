<table class="table">
    <thead>
      <tr>
        <th colspan="2" class="tp-cart-header-product">{{ __('names.product') }}</th>
        <th class="tp-cart-header-price">{{ __('names.price') }}</th>
        <th class="tp-cart-header-quantity">{{ __('names.quantity') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     @forelse($cartItems as $item)
       <tr>
          <!-- img -->
          <td class="tp-cart-img">
             <a href="{{ route('viewproduct', $item['product']->id) }}"> 
                 <img alt="{{ $item['product']->name }}" class="product-thumbnail-image" 
                     src="@if ($item['product']->image) {{ $item['product']->image }} @else {{ asset('template/img/product/cart/product-cart-1.jpg') }} @endif">
             </a>
         </td>
          <!-- title -->
          <td class="tp-cart-title">
             <a href="{{ route('viewproduct', $item['product']->id) }}">
                 {{ $item['product']->name }}
             </a>
         </td>
          <!-- price -->
          <td class="tp-cart-price">
             <span>€{{ number_format($item->price_current * $item->count, 2) }}</span>
          </td>
          <!-- quantity -->
          <td class="tp-cart-quantity">
             <div class="tp-product-quantity mt-10 mb-10">
                <input class="tp-cart-input ps-0 border-0" type="text" value="{{ $item->count }}" name="quantity" style="text-align: left" readonly>
             </div>
          </td>
          <!-- action -->
          <td class="tp-cart-action">
             {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                 <button type="submit "class="tp-cart-action-btn" onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                     <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"></path>
                     </svg>
                     <span>{{ __('names.removeProduct') }}</span>
                 </button>
             {!! Form::close() !!}
          </td>
       </tr>
     @empty
       <tr>
           <td colspan="5" class="text-center">{{ __('names.emptyCart') }}</td>
       </tr>
     @endforelse
    </tbody>
</table>