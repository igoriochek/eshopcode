@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootcategories") ,'title' => __('names.categories')])
        <div class="container py-5" >
            <div class="row mb-5" style="justify-content: center">
                <div class="col-lg-8 mb-5">
                    <div class="sidebar">
                            <h4 class="column-title" style="margin-bottom: 30px">
                                {{ __('names.categories') }}
                            </h4>
                            @include('user_views.category.category_tree')
                    </div>
                </div>
                <div class="col-lg-8 mb-5">

{{--                    @if(!empty($categories))--}}
{{--                        @forelse($categories as $category)--}}
{{--                            <div class="category p-4 mb-4 mb-sm-5">--}}
{{--                                <h4>--}}
{{--                                    <a class="category-title" href="{{ route('innercategories', $category->id) }}">--}}
{{--                                        {{ $category->name }}--}}
{{--                                        <span class="text-muted fw-normal fs-5 text-lowercase">--}}
{{--                                            ({{ count($category->products).' '.__('names.products') }})--}}
{{--                                        </span>--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                                <p class="category-description">{{ $category->description }}</p>--}}
{{--                                <div class="d-flex my-3">--}}
{{--                                    <span class="subcategories-title">{{ __('names.subcategories') }}:</span>--}}
{{--                                    @forelse($category->innerCategories as $c)--}}
{{--                                        <a class="subcategory-link" href="{{ route('innercategories', $c->id) }}">--}}
{{--                                            {{ $c->name }}--}}
{{--                                        </a>--}}
{{--                                        --}}{{-- __('names.productCount') --}}{{-- --}}{{-- count($c->products) --}}
{{--                                    @empty--}}
{{--                                        <span class="categories-empty">--}}
{{--                                                {{ __('names.noSubcategories') }}--}}
{{--                                            </span>--}}
{{--                                    @endforelse--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <span class="categories-empty">--}}
{{--                                    {{ __('names.noCategories') }}--}}
{{--                                </span>--}}
{{--                        @endforelse--}}
{{--                        {{ $categories->links() }}--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
@endsection
