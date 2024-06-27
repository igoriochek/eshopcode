@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
    <div class="axil-single-product-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-12">
                    <div class="shop-sidebar">
                        <div class="single-shop-sidebar-widget color-and-item pb-1">
                            <h4 class="title">{{ __('names.categories') }}</h4>
                            @include('user_views.category.category_tree')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .title {
            margin-bottom: 16px;
        }

        a {
            color: #666666;

            &:hover, &:focus {
                color: #a10909;
            }
        }

        .active {
            color: #a10909;
        }
    </style>
@endpush