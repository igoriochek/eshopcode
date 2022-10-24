<div class="cart-table table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th class="product">{{__('table.product')}}</th>
            <th class="price text-center">{{__('table.price')}}</th>
            <th class="quantity text-center">{{__('table.count')}}</th>
            <th class="subtotal text-center">{{__('table.subTotal')}}</th>
            <th class="action"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td class="product">
                    <div class="cart-product">
                        <div class="cart-product__thumbnail">
                            <a href="{{ route('viewproduct', $item['product']->id) }}"
                               title="{{ $item['product']->name }}">
                                <img alt="{{ $item['product']->name }}" width="70" height="81"
                                     src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/product/product-1.png @endif">
                            </a>
                        </div>
                        <div class="cart-product__content">
                            <h3 class="cart-product__name">
                                <a href="{{ route('viewproduct', $item['product']->id) }}">
                                    {{ $item['product']->name }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </td>
                <td class="price">
                    <div class="cart-product__price text-center">
                        <span class="sale-price">{{ number_format($item['product']->price,2) }} €</span>
                    </div>
                </td>
                <td class="quantity">
                    <div class="cart-product d-flex justify-content-center">
                        <div class="product-quantity text-center">
                            <input type="text" value="{{$item->count}}" readonly
                                   style="background: none; border: none;">
                        </div>
                    </div>

                </td>
                <td class="subtotal">
                    <div class="cart-product__total-price text-center">
                        <span
                            class="sale-price discount">{{ number_format($item->price_current * $item->count,2) }} € </span>
                    </div>
                </td>

                <td class="action">
                    <div class="cart-product__remove text-center">
                        {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                        <a type="submit" class="button remove"
                           onclick="return confirm('Are you sure?'),this.parentNode.submit();">{{__('names.removeItem')}}</a>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
