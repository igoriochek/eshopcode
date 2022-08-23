@extends('layouts.app')

@section('content')
    @include('header', ['title' => $maincategory->name])
    <section class="product-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ __('names.products') }}</h3>
                            <p class="p-0 m-0 mb-sm-3 showing-all-results">
                                {{ __('Showing all ').$products->count().__(' result(s)') }}
                            </p>
                        </div>
                    </div>
                    @if(!empty($products))
                        @forelse($products as $prod)
                            <div class="category p-4 mb-4 mb-sm-5">
                                <h4>
                                    <a class="category-title" href="{{route('viewproduct', $prod->id)}}">{{$prod->name}}</a>
                                </h4>
                                <p class="category-description">{{$prod->description}}</p>
                            </div>
                        @empty
                            <span class="categories-empty text-muted">{{__('names.noProducts')}}</span>
                        @endforelse
                        {{ $products->links() }}
                    @endif
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ __('names.subcategories') }}</h3>
                            <p class="p-0 m-0 mb-sm-3 showing-all-results">
                                {{ __('Showing all ').$categories->count().__(' result(s)') }}
                            </p>
                        </div>
                    </div>
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
