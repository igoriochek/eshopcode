@extends('layouts.app')

@section('content')
    <section class="product-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ __('names.products') }}</h3>
                            <p class="p-0 m-0 showing-all-results">
                                {{ __('names.results').': '.$products->count() }}
                            </p>
                        </div>
                    </div>
                    <hr class="hr"/>
                    @if(!empty($products))
                        @forelse($products as $prod)
                            <div class="category p-4 mb-4 mb-sm-5">
                                <h4>
                                    <a class="category-title"
                                       href="{{route('viewproduct', $prod->id)}}">{{$prod->name}}</a>
                                </h4>
                                <p class="category-description">{{$prod->description}}</p>
                            </div>
                        @empty
                            <span class="categories-empty text-muted">{{__('names.noProducts')}}</span>
                        @endforelse
                        <div class="pagination-area mt-20 mb-20">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ __('names.subcategories') }}</h3>
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
                                    <a class="category-title" href="{{route('innercategories', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </h4>
                                <p class="category-description">{{$category->description}}</p>
                                <div class="d-flex my-3">
                                    <span class="subcategories-title">{{ __('names.subcategories') }}:</span>
                                    @forelse($category->innerCategories as $c)
                                        <a href="{{ route('innercategories', $c->id) }}" class="subcategory-link">
                                            {{$c->name}}
                                        </a>
                                    @empty
                                        <span class="categories-empty">{{ __('names.noSubcategories') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <span class="categories-empty text-muted">{{ __('names.noSubcategories') }}</span>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
