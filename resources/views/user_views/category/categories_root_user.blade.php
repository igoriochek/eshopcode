@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-12">
                    <div class="shop-sidebar">
                        <div class="single-shop-sidebar-widget color-and-item">
                            <h3>{{ __('names.categories') }}</h3>
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