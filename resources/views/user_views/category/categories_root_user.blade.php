@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
<div class="whish-list-section pb-6rem">
    <div class="container">
        <div class="row gap-5 gap-lg-0">
            <div class="col-12">
                <div class="shop-sidebar">
                    <div class="border-bottom cbb1 mb-3rem">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                            <h2 class="title" style="border-bottom: 0px solid #e5e5e5; margin-bottom: 0px;">{{ __('names.categories') }}</h2>
                        </div>
                    </div>
                    @include('user_views.category.category_tree')
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

        &:hover,
        &:focus {
            color: #a10909;
        }
    }

    .active {
        color: #a10909;
    }
</style>
@endpush