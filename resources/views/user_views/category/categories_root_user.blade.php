@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('names.categories')])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <p class="p-0 m-0 showing-all-results">
                                {{ __('names.results').': '.$categories->count() }}
                            </p>
                        </div>
                    </div>
                    <hr class="hr"/>
                        @if(!empty($categories))
                            @forelse($categories as $category)
                                <div class="category p-4 mb-4 mb-sm-5">
                                    <h4>
                                        <a class="category-title" href="{{ route('innercategories', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                    <h6 class="category-product-count">
                                        {{__('names.productCount')}}: {{ count($category->products) }}
                                    </h6>
                                    <p class="category-description">{{ $category->description }}</p>
                                    <div class="d-flex my-3">
                                        <span class="subcategories-title">{{ __('names.subcategories') }}:</span>
                                        @forelse($category->innerCategories as $c)
                                            <a class="subcategory-link" href="{{ route('innercategories', $c->id) }}">
                                                {{ $c->name }}
                                            </a>
                                            {{-- __('names.productCount') --}} {{-- count($c->products) --}}
                                        @empty
                                            <span class="categories-empty">
                                                {{ __('names.noSubcategories') }}
                                            </span>
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                                <span class="categories-empty">
                                    {{ __('names.noCategories') }}
                                </span>
                            @endforelse
                            {{ $categories->links() }}
                        @endif
                </div>
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container">
                                <h4 class="widget-title">
                                    {{ __('names.categoryTree') }}
                                </h4>
                            </div>
                            <div class="category-tree-widget-content">
                                @foreach($categoryTree as $category)
                                    <li class="mb-3">
                                        <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                                            {{ $category->name }}
                                        </a>
                                        <span>({{ count($category->products) }})</span>
                                        @if(count($category->innerCategories))
                                            {{--{{dd($category->innerCategories)}}--}}
                                            <i class="fa-solid fa-caret-down text-muted"></i>
                                            @include('user_views.category.manageChild', ['childs' => $category->innerCategories])
                                        @endif
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
