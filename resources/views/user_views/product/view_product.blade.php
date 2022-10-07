@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/home" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="/user/products">{{__('names.products')}}</a> <span></span> {{$product->name}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @if($product->image)
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->image }}" alt="{{$product->name}}"/>
                                            </figure>
                                        @else
                                            <figure class="border-radius-10">
                                                <img src="/images/noimage.jpeg" alt=""/>
                                            </figure>
                                        @endif
                                    </div>
                                    <!-- THUMBNAILS -->
                                    {{--                                    @if($product->image)--}}
                                    {{--                                        <div class="slider-nav-thumbnails">--}}
                                    {{--                                            <div>--}}
                                    {{--                                                <img src="{{ $product->image }}" alt="{{$product->name}}"/>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    @endif--}}
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <span
                                                class="font-small ml-5 text-muted"> {{$avarage}} {{__('names.ratingOrRatings')}}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        @if($product->discount)
                                            <div class="product-price primary-color float-left">
                                                <span
                                                    class="current-price text-brand">{{ round(($product->price * $product->discount->proc / 100),2) }}</span>
                                                <span>
                                                <span class="save-price font-md color3 ml-15">{{$product->discount->proc}}%</span>
                                                <span class="old-price font-md ml-15">{{ $product->price }}</span>
                                            </span>
                                            </div>
                                        @else
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand">{{ number_format($product->price,2) }} €</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{$product->description}}</p>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        <div class="add-cart d-flex">
                                            <div class="col-5">
                                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}

                                                {!! Form::number('count', "1", ['class' => 'form-control col-lg-5 col-sm-5', "minlength"=>"3", "maxlength"=>"5", "size"=>"5"]) !!}

                                            </div>
                                            <div class="col-7 ml-5">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input class="add h-100" type="submit"
                                                       value="{{__('buttons.add')}}">
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                           href="#Description">{{__('names.description')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                           href="#Reviews">{{__('names.rating')}}
                                            ({{$rateCount}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>{{$product->description}}</p>
                                            <hr class="wp-block-separator is-style-dots"/>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="mb-30">{{__('names.rating')}}</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <h6>{{$avarage}} out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{$arrated[5]}}%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            {{$arrated[5]}}%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{$arrated[4]}}%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            {{$arrated[4]}}%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{$arrated[3]}}%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            {{$arrated[3]}}%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{$arrated[2]}}%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            {{$arrated[2]}}%
                                                        </div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{$arrated[1]}}%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            {{$arrated[1]}}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            @if (!$voted)
                                                <h4 class="mb-15">{{__('names.starRating')}}</h4>
                                                <div class="rating">
                                                    <input type="radio" name="rating" value="5" id="5"><label
                                                        for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4"><label
                                                        for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3"><label
                                                        for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2"><label
                                                        for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1"><label
                                                        for="1">☆</label>
                                                </div>
                                            @else
                                                <h4 class="mb-15">{{__('names.alreadyVoted')}}</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $('input[type=radio][name=rating]').change(function () {
            // alert(this.value);
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: this.value,
                    product: {{$product->id}}
                },
                function (data, status) {
                    //alert("Data: " + data.val + "\nStatus: " + status);
                    if (data.val == "ok") {
                        // $('#vote').hide();
                        $('#vote').html("<h3>{{__("names.voted")}}");

                    }

                });
        });
    </script>
    @if ( $product->video )
        <script>
            // Load the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // Replace the 'ytplayer' element with an <iframe> and
            // YouTube player after the API code downloads.
            var player;

            function onYouTubePlayerAPIReady() {
                player = new YT.Player('ytplayer', {
                    height: '360',
                    width: '640',
                    videoId: '{{$product->video}}'
                });
            }
        </script>
    @endif
@endpush
@push('css')

    <style>
        .badge {
            font-size: 25px;
            font-weight: 200
        }

        .badge i {
            font-size: 20px;
            font-weight: 200
        }

        .about-rating {
            font-size: 15px;
            font-weight: 500;
            margin-top: 10px
        }

        .total-ratings {
            font-size: 12px
        }

        .bg-custom {
            background-color: #b7dd29 !important
        }

        .progress {
            margin-top: 10px
        }

        /*    rating form*/
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 6vw;
            color: #FFD600;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }


        h1,
        p {
            text-align: center
        }

        h1 {
            margin-top: 150px
        }

        p {
            font-size: 1.2rem
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 14px
            }

            p {
                font-size: 12px
            }
        }


    </style>
@endpush
