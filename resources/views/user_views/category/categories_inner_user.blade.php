@extends('layouts.app')

@section('content')
    @include('user_views.section', ['title' => __('names.category'), 'paragraph' => $maincategory->name])
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ url('/home') }}">{{ __('names.home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/user/rootcategories') }}">{{ __('names.categories') }}</a>
                </li>
                <li>
                    {{ $maincategory->name }}
                </li>
            </ul>
        </div>
    </div>
    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3 theiaStickySidebar" id="sidebar">
                <div class="mb-4">
                    {{ __('names.categoryList') }}
                </div>
                @include('user_views.category.categoryTree')
            </aside>
            <!--End aside -->
            <div class="col-lg-9">
                <div class="mb-4">
                    {{ __('Showing ') }}
                    @if ($products->currentPage() !== $products->lastPage())
                        {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage())}}
                    @else
                        @if ($products->total() - $products->count() === 0)
                            {{ 1 }}
                        @else
                            {{ ($products->total() - $products->count()).__('–').$products->total() }}
                        @endif
                    @endif
                    {{ __(' of ') }}
                    {{ $products->total().__(' results') }}
                </div>
                <!--/tools -->
                <div class="row">
                    @forelse ($products as $product)
                        <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            @if ($product->image)
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="/images/noimage.jpeg" alt="noimage">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="item-options clearfix">
                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="count" value="1">
                                        <button type="submit" class="btn_shop border-0">
                                            <span class="icon-basket"></span>
                                            <div class="tool-tip">
                                                {{ __('buttons.addToCart') }}
                                            </div>
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="product_description">
                                    <div class="rating flex-row justify-content-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="@if ($product->average >= $i) icon-star voted @else icon-star-empty @endif"></i>
                                        @endfor
                                    </div>
                                    <h3>
                                        <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price">
                                        @if ($product->discount)
                                            <span class="offer">
                                                    €{{ $product->price }}
                                                </span>
                                            €{{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }}
                                        @else
                                            €{{ $product->price }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Shop Item-->
                    @empty
                        {{ __('names.noProducts') }}
                    @endforelse
                </div>
                <!--End strip -->
                <div class="d-flex justify-content-center">
                    {{$products->links()}}
                </div>
                <!-- end pagination-->

            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    @push('scripts')
        <script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
        <script>
            jQuery('#sidebar').theiaStickySidebar({
                additionalMarginTop: 80
            });
        </script>
    @endpush
@endsection
