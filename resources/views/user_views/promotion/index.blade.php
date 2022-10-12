@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.promotions') ])

    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3 theiaStickySidebar" id="sidebar">
                @include('user_views.promotion.promotionsLinks')
            </aside>
            <!--End aside -->
            <div class="col-lg-9">
                @forelse($promotions as $promotion)
                    <div id="{{$promotion->id}}" class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="tour_list_desc d-flex flex-column justify-content-center p-4">
                                    <h3 class="card-title">
                                        <a href="{{route("promotion", ["id"=>$promotion->id])}}">{{ $promotion->name }} {{__('names.promotions')}}</a>
                                    </h3>
                                    <span class="mb-3">({{ count($promotion->products) }} {{__('names.products') }})</span>
                                    <span class="mb-3">{{ $promotion->description }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End strip -->
                @empty
                    {{__('names.noPromotions')}}
                @endforelse
            </div>
            <!-- End col-lg-9 -->
        </div>
        <!-- End row -->
    </div>

    @push('scripts')
    <script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });
    </script>
    <script>
        $('#promotions_box a[href^="#"]').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
                || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top -115
                    }, 800);
                    return false;
                }
            }
        });
    </script>
    @endpush

@endsection
