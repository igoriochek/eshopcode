@extends('layouts.app')

@section('content')

    <section id="hero" class="background-image" data-background=url(/img/header_bg.jpg) style="height: 470px">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            <div class="intro_title">
                <h3 class="animated fadeInDown">{{$promotion->name}} {{__('names.promotions')}}  </h3>
            </div>
        </div>
    </section>

    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>
                    <a href="/user/promotions">{{__('menu.promotions')}}</a>
                </li>
                <li>{{$promotion->name}} {{__('names.promotions')}} </li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                @forelse( $products as $product )
                    @include('user_views.product.products_list')
                @empty
                    {{ __('names.noProducts') }}
                @endforelse
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
            </div>
        </div>
    </div>

@endsection
