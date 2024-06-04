<table class="table">
    <thead>
      <tr>
        <th>{{ __('names.removeProduct') }}</th>
        <th>{{ __('table.image') }}</th>
        <th class="tp-cart-header-product">{{ __('names.product') }}</th>
        <th class="tp-cart-header-quantity">{{ __('names.quantity') }}</th>
        <th class="tp-cart-header-price">{{ __('names.price') }}</th>
      </tr>
    </thead>
    <tbody>
     @forelse($cartItems as $item)
       <tr>
        <!-- action -->
        <td class="tp-cart-action">
             {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
              <button type="submit" class="tp-cart-action-btn" onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')" style="background: transparent; border: none; outline: none; color: inherit; padding: 0; cursor: pointer;">
                  <i class="pe-7s-trash" data-tippy="Remove" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
              </button>
            {!! Form::close() !!}
          </td>
          <!-- img -->
          <td class="tp-cart-img">
             <a href="{{ route('viewproduct', $item['product']->id) }}"> 
                 <img alt="{{ $item['product']->name }}" class="product-thumbnail-image" 
                     src="@if ($item['product']->image) {{ $item['product']->image }} @else {{ asset('template/images/product/small-size/2-1-112x112.png') }} @endif">
             </a>
         </td>
          <!-- title -->
          <td class="product-name">
             <a href="{{ route('viewproduct', $item['product']->id) }}">
                 {{ $item['product']->name }}
             </a>
         </td>
          <!-- quantity -->
          <td class="product-name">
             <span>{{ $item->count }}</span>
          </td>
          <!-- price -->
          <td class="product-subtotal">
             <span>€{{ number_format($item->price_current * $item->count, 2) }}</span>
          </td>
       </tr>
     @empty
       <tr>
           <td colspan="5" class="text-center">{{ __('names.emptyCart') }}</td>
       </tr>
     @endforelse
    </tbody>
</table>

@push('css')
    <style>
        .pe-7s-trash {
            font-size: 20px;
            color: #6c788c;
        }

        .pe-7s-trash:hover {
          color: #ee3231;
        }
    </style>
@endpush