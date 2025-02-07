<div class="modal fade" id="modal_box_{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="{{ route('viewproduct', $product->id) }}">
                                                @if ($product->image)
                                                <img src="{{ $product->image }}" alt="">
                                                @else
                                                <img src="{{ asset('template/img/product/productbig1.jpg') }}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>{{ $product->name }}</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    @if ($product->discount)
                                    <span class="new_price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                                    <span class="old_price">€{{ number_format($product->price, 2) }}</span>
                                    @else
                                    <span class="new_price">€{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                <div class="modal_description mb-15">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="variants_selects">
                                    <div class="modal_add_to_cart d-flex">
                                        <input class="modal_add_to_cart_input" min="1" max="{{ $product->count }}" step="1" value="1" type="number" name="count">
                                        <button class="modal_add_to_cart_button" type="submit">{{ __('buttons.addToCart') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

<style>
    .modal_add_to_cart_input {
        width: 95px;
        border: 1px solid #e1e1e1;
        background: none;
        padding: 0 10px;
        height: 45px;
        transition: all 0.3s ease 0s;
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    @media only screen and (max-width: 767px) {
        .modal_add_to_cart_input {
            width: 75px;
        }
    }

    .modal_add_to_cart_button {
        border-radius: 0;
        border: 1px solid #222222;
        margin-left: 10px;
        font-size: 12px;
        font-weight: 700;
        height: 45px;
        width: 230px;
        line-height: 18px;
        padding: 10px 15px;
        text-transform: uppercase;
        background: #222222;
        color: #ffffff;
        transition: 0.3s;
        font-family: inherit;
    }

    @media only screen and (max-width: 767px) {
        .modal_add_to_cart_button {
            width: 130px;
        }
    }

    .modal_add_to_cart_button:hover {
        background: #79a206;
        color: #ffffff;
        border-color: #79a206;
    }
</style>