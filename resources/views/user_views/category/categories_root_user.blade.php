@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
<section class="section-terms padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">{{ __('names.categories') }}</h2>
                    </div>
                </div>
            </div>
            <div class="desc">
                <div class="row mb-minus-24">
                    <div class="col-lg-12 col-md-12 mb-24">
                        <div class="terms-detail" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="block">
                                @include('user_views.category.category_tree')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection