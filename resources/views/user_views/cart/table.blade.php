<div class="table-responsive shopping-summery">
    <table class="table table-wishlist">
        <thead>
        <tr class="main-heading">
            <th scope="col" class="start" width="15%"></th>
            <th scope="col" width="30%">{{__('table.product')}}</th>
            <th scope="col" width="15%">{{__('table.price')}}</th>
            <th scope="col" width="10%" class="text-center">{{__('table.count')}}</th>
            <th scope="col" width="20%" class="text-center">{{__('table.subTotal')}}</th>
            <th scope="col"  class="end" width="10%">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr class="pt-30">
                <td class="product-thumbnail">
                    <div class="product-thumbnail-wrapper pt-40">
                        <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                            <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                                 src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                        </a>
                    </div>
                </td>
                <td class="product-name">
                    <h6 class="mb-5">
                        <a class="product-name mb-10 text-heading"
                           href="{{ route('viewproduct', $item['product']->id) }}">
                            {{ $item['product']->name }}
                        </a>
                    </h6>
                </td>
                <td class="product-price">
                    <h5 class="text-body">{{ number_format($item['product']->price,2) }} €</h5>
                </td>
                <td class="product-quantity">
                    <h5 class="text-body text-center"> {{ $item->count }}</h5>
                </td>
                <td class="product-subtotal">
                    <h5 class="text-brand text-center">
                        {{ number_format($item->price_current * $item->count,2) }} €
                    </h5>
                </td>
                <td class="action">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    <div class="btn-group">
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
