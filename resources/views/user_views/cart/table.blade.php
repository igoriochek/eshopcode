<div class="cart-section">
    <table class="table table-striped cart-list shopping-cart">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.count')}}</th>
            <th>{{__('table.pricePerItem')}}</th>
            <th>{{__('table.subTotal')}}</th>
            <th>{{__('names.removeProduct')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td>
                    <strong>{{ $item['product']->name }}</strong>
                </td>
                <td>
                    <strong>{{ $item->count }}</strong>
                </td>
                <td>
                    <strong>{{ number_format($item->price_current, 2) }} €</strong>
                </td>
                <td>
                    <strong>{{ number_format($item->price_current  * $item->count, 2) }} €</strong>
                </td>

                <td class="options">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="column col-lg-4 col-md-6">
            <ul class="totals-table">
                <li class="clearfix total"><span class="col">{{__('names.total')}}</span><span class="col">{{number_format($cart->sum,2) }} €</span></li>
            </ul>
            <a href="{{route('checkout')}}" class="btn_full">{{__('names.checkoutPreview')}}<i class="icon-left"></i></a>
        </div>
    </div>
</div>
