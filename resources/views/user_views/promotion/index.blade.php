@extends('layouts.app')

@section('content')

    <section id="hero" class="background-image" data-background=url(../img/header_bg.jpg) style="height: 470px">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h3 class="animated fadeInDown">{{ __('names.promotions') }}</h3>
            </div>
        </div>
    </section>

    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>{{ __('names.promotions') }}</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="theiaStickySidebar">
                    <div class="box_style_cat" id="faq_box">
                        <ul id="cat_nav">
                            @forelse ($promotions as $item)
                                <li><a href="#{{$item->id}}" class="active"><i class="icon_set_1_icon-95"></i>{{$item->name}}</a>
                                </li>
                            @empty
                                <li>{{__('names.noPromotions')}}</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!--End sticky -->
            </aside>
            <!--End aside -->

            <div class="col-lg-9">
                @forelse ($promotions as $item)
                    <h3 class="nomargin_top">{{$item->name}} {{__('names.promotions')}}</h3>
                    <div id="{{$item->id}}" class="accordion_styled">
                        @if(($item->products->count()))
                            @foreach( $item->products as $prod )
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <a href="{{route('viewproduct', $prod->id)}}" >{{$prod->name}}</a>
                                            <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#{{$item->id}}" href="#collapse{{$prod->id}}">
                                                <i class="indicator icon-plus float-end" style="margin-top: -20px" ></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$prod->id}}" class="collapse" data-bs-parent="#payment">
                                        <div class="card-body">
                                            <h6>{{$prod->description}}</h6>
                                            <h6 class="d-flex justify-content-end">{{$prod->price}} €</h6>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->iteration > 2)
                                    <div class="row">
                                        <div class="d-flex justify-content-center" style="margin-bottom: 20px">
                                            <a href="{{route("promotion", ["id"=>$item->id])}}" class="btn_1 outline">{{__("names.more_for_promotions")}}</a>
                                        </div>
                                </div>

                                    @break
                                @endif
                            @endforeach
                        @else
                        @endif
                </div>
                <!-- End container -->
                @empty
                @endforelse
                    <div class="d-flex justify-content-center">
                        {{$promotions->links()}}
                    </div>
            </div>
            <!-- End col lg-9-->
        </div>
        <!-- End row -->
    </div>
    <!-- End main -->


    @push('scripts')
    <script src="{{asset('js/theia-sticky-sidebar.js')}}"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });
    </script>
    <script>
        $('#faq_box a[href^="#"]').click(function() {
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
