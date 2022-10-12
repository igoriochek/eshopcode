@extends('layouts.app')

@section('content')
    @include('user_views.section', ['title' => __('names.categories') ])

    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-12">
                <aside class="sidebar">
                    <h5 class="text-uppercase">{{__('names.categories')}}</h5>
                    @include('user_views.category.categoryTree')
                </aside>
            </div>
            <!--End aside -->
{{--            <div class="col-lg-9">--}}
{{--                <div class="mb-4">--}}
{{--                    {{ __('Showing ') }}--}}
{{--                    @if ($categories->currentPage() !== $categories->lastPage())--}}
{{--                        {{ ($categories->count() * $categories->currentPage() - $categories->count() + 1).__('–').($categories->count() * $categories->currentPage()) }}--}}
{{--                    @else--}}
{{--                        @if ($categories->total() - $categories->count() === 0)--}}
{{--                            {{ 1 }}--}}
{{--                        @else--}}
{{--                            {{ ($categories->total() - $categories->count()).__('–').$categories->total() }}--}}
{{--                        @endif--}}
{{--                    @endif--}}
{{--                    {{ __(' of ') }}--}}
{{--                    {{ $categories->total().__(' results') }}--}}
{{--                </div>--}}
{{--                <!--/tools -->--}}
{{--                @forelse($categories as $category)--}}
{{--                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="tour_list_desc d-flex flex-column justify-content-center p-4">--}}
{{--                                    <h3 class="card-title">--}}
{{--                                        <a href="{{ route('innercategories', $category->id) }}">{{ $category->name }}</a>--}}
{{--                                    </h3>--}}
{{--                                    <span class="mb-3">({{ count($category->products) }} {{ __('names.products') }})</span>--}}
{{--                                    <span class="mb-3">{{ $category->description }}</span>--}}
{{--                                    <ul class="add_info">--}}
{{--                                        <strong>{{ __('names.subcategories') }}:</strong>--}}
{{--                                        @forelse($category->innerCategories as $c)--}}
{{--                                            <a href="{{route('innercategories', $c->id)}}">--}}
{{--                                                {{$c->name}}--}}
{{--                                            </a>--}}
{{--                                            @if (!$loop->last) , @endif--}}
{{--                                        @empty--}}
{{--                                            <span class="text-muted">{{ __('names.noSubcategories') }}</span>--}}
{{--                                        @endforelse--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    {{__('names.noCategories')}}--}}
{{--                @endforelse--}}
{{--                <!--End strip -->--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    {{$categories->links()}}--}}
{{--                </div>--}}
{{--                <!-- end pagination-->--}}
{{--            </div>--}}
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
