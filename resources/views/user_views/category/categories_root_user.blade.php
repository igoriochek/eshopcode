@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact_message content">
                    <h3>{{ __('names.categories') }}</h3>
                    @include('user_views.category.category_tree')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .contact_message ul li {
        padding: 3px 0 !important;
        border-top: 0px !important;
    }
</style>