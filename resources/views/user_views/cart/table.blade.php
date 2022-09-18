<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive shopping-summery">
            <table class="table table-wishlist">
                <thead>
                <tr class="main-heading">
                    <th class="custome-checkbox start pl-20">
                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                        <label class="form-check-label" for="exampleCheckbox11"></label>
                    </th>
                    <th scope="col">{{__('table.image')}}</th>
                    <th scope="col">{{__('table.name')}}</th>
                    <th scope="col">{{__('table.price')}}</th>

                    <th scope="col">{{__('table.count')}}</th>
                    <th scope="col">{{__('table.description')}}</th>
                    <th scope="col">{{__('table.remove')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $item)
                    <tr class="text-center">
                        <td class="custome-checkbox pl-20">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3"
                                   value="">
                            <label class="form-check-label" for="exampleCheckbox3"></label>
                        </td>
                        <td class="image product-thumbnail"><img src="{{$item['product']->image}}" alt="{{ $item['product']->name }}"></td>
                        <td class="product-des product-name">
                            <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                href="shop-product-right.html">{{ $item['product']->name }}</a></h6>
                        </td>
                        <td class="product-des product-name pr-25" data-title="Price">
                            <h4 class="text-brand">{{ $item['product']->price }}</h4>
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            <div class="detail-extralink mr-15">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="{{ $item->count }}"
                                           min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item['product']->description }}</td>

                        <td class="action"
                            data-title="Remove">
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
        <div class="divider-2 mb-30"></div>
        <div class="cart-action d-flex justify-content-between">
            <a class="btn" href="{{url('/user/rootcategories')}}"><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
            @if($cartItems)
            <a href="{{route('checkout')}}" class="btn  mr-10 mb-sm-15">{{__('names.checkout')}}<i class="fi-rs-sign-out ml-15"></i></a>
            @endif
        </div>
        <div class="row mt-50">
            <div class="col-lg-5">

            </div>
        </div>
    </div>
{{--    @if($cartItems)--}}
{{--    <div class="col-lg-4">--}}
{{--        <div class="border p-md-4 cart-totals ml-30">--}}
{{--            <div class="mb-30">--}}
{{--                <h4 class="mb-10">{{__('names.applyCoupon')}}</h4>--}}
{{--                <p class="mb-30"><span class="font-lg text-muted">{{__('names.usingPromoCode')}}</span></p>--}}
{{--                <form action="#">--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <input class="font-medium mr-15 coupon" name="Coupon" placeholder="{{__('names.enterCoupon')}}">--}}
{{--                        <button class="btn"><i class="fi-rs-label mr-10"></i>{{__('names.apply')}}</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table no-border">--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td class="cart_total_label">--}}
{{--                            <h6 class="text-muted">{{__('names.total')}}</h6>--}}
{{--                        </td>--}}
{{--                        <td class="cart_total_amount">--}}
{{--                            <h4 class="text-brand text-end"></h4>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <a href="{{route('checkout')}}" class="btn mb-20 w-100">{{__('names.checkout')}}<i class="fi-rs-sign-out ml-15"></i></a>--}}
{{--        </div>--}}
    {{--    </div>--}}
    {{--    @endif--}}
</div>
