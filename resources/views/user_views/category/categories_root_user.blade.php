@extends('layouts.app')

@section('content')
    <section>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <h1>{{__('names.categories')}}</h1>
                            @if(!empty($categories))
                                <p>We found <strong
                                        class="text-brand">{{$categories->count()}}</strong> {{__('names.categories')}}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="row product-grid">
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
                                                <b>{{__('messages.noinnercategories')}}</b>--}}
                                            </span>
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                                <span class="categories-empty">
                                   {{__('names.noCategories')}}--}}
                                </span>
                            @endforelse
                            <div class="pagination-area mt-20 mb-20">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{ $categories->links() }}
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-10">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container">
                                <h4 class="widget-title">
                                    {{ __('names.categoryTree') }}
                                </h4>
                            </div>
                            <div class="category-tree-widget-content">
                                @foreach($categoryTree as $category)
                                    <li class="mb-3 d-block">
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
