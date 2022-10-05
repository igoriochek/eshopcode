@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootcategories") ,'title' => __('names.categories')])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container">
                                <h4 class="widget-title mb-5">
                                    {{ __('names.categories') }}
                                </h4>
                            </div>
                            @include('user_views.category.category_tree')
                        </div>
                    </div>
                </div>
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
                                        <span class="text-muted fw-normal fs-5 text-lowercase">
                                            ({{ count($category->products).' '.__('names.products') }})
                                        </span>
                                    </a>
                                </h4>
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
            </div>
        </div>
    </section>
@endsection
