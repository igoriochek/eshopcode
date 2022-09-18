@extends('layouts.app')

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ __('names.promotions') }}</h3>
                            <p class="p-0 m-0 showing-all-results">
                                {{ __('names.results').': '.$promotions->count() }}
                            </p>
                        </div>
                    </div>
                    <hr class="hr"/>
                    <div class="row">
                        @forelse ($promotions as $item)
                            <div class="col-lg-12">
                                <div class="col-sm-12">
                                    <h3 class="column-title">{{ $item->name }}</h3>
                                    {{--<a href="{{route("rootcategories")}}">Back to main categories</a>--}}
                                </div>
                                {{--@include('products.table')--}}
                                @if(($item->products->count()))
                                    @foreach($item->products as $prod)
                                        <div class="promotion p-4 mb-4 mb-sm-5">
                                            <h4>
                                                <a class="promotion-title" href="{{ route('viewproduct', $prod->id) }}">
                                                    {{ $prod->name }}
                                                </a>
                                            </h4>
                                            <p class="promotion-description">{{ $prod->description }}</p>
                                        </div>
                                        @if ($loop->iteration > 2)
                                            <div class="mb-5">
                                                <a class="promotion-link"
                                                   href="{{ route("promotion", ["id"=>$item->id]) }}">
                                                    {{ __("names.more_for_promotions") }}
                                                </a>
                                            </div>
                                            @break
                                        @endif
                                    @endforeach
                                @else
                                    <span class="promotions-empty">{{ __('names.noProducts') }}</span>
                                @endif
                            </div>
                            <hr class="hr"/>
                        @empty
                            <span class="promotions-empty">{{ __('names.noPromotions') }}</span>
                        @endforelse
                            <div class="pagination-area mt-20 mb-20">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{ $promotions->links() }}
                                    </ul>
                                </nav>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
