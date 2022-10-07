@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <aside class="sidebar">
                    <h5>{{ __('names.categories')}}</h5>
                    @include('user_views.category.categoryTree')
                </aside>
            </div>
            {{--<div class="col-lg-9 ps-4">
                <div class="blog-posts">
                    @forelse( $categories as $category )
                    <article class="post">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="post-content">
                                    <h5 class="pt-4 pt-lg-0 mb-3">
                                        <a href="{{ route('innercategories', $category->id) }}">{{ $category->name }}</a>
                                        <span class="text-muted" style="font-size: .8em">
                                            ({{ count($category->products) }}
                                            {{ __('names.productsAvailable') }})
                                        </span>
                                    </h5>
                                    <p class="m-0 p-0">{{ $category->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="post-meta">
                                    <b>{{ __('messages.subcategories') }}:</b>
                                    @forelse($category->innerCategories as $c)
                                        <a href="{{ route('innercategories', $c->id) }}">
                                            @if (!$loop->last)
                                                {{ $c->name.', ' }}
                                            @else
                                                {{ $c->name }}
                                            @endif
                                        </a>
                                    @empty
                                        <span class="text-muted">{{ __('messages.subcategories') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </article>
                    @empty
                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                    @endforelse
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
@endsection
