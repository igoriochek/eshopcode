@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{ $product->name }} [View Product]</h1>
            </div>
        </div>
    </div>
</section>

<section>
<div class="row m-2">
    <div class="col-sm-12">
        <div class="product">
            <div class="name"><b>{{__('names.name')}}:</b> {{ $product->name }}</div>
            <div class="price"><b>{{__('names.price')}}:</b>

            @if ($product->discount )
                    {{__("names.old")}}:<strike>{{$product->price}}</strike>&nbsp;&nbsp;&nbsp;<b>{{__("names.new")}}:{{ round(($product->price * $product->discount->proc / 100),2) }}</b>
            @else
            {{ $product->price }}
            @endif


            </div>
            @if ( $product->image )
                <div>
                    <img src="{{ $product->image }}" alt=""/>
                </div>
                @else
                <div>
                    <img src="/images/noimage.jpeg" alt=""/>
                </div>
            @endif
            <div>&nbsp;</div>
            <div class="description"><b>{{__('names.desc')}}:</b> {{ $product->description }}</div>
            <div>&nbsp;</div>
            <div>
                {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                {!! Form::number('count', "1", ['class' => 'form-control col-lg-5 col-sm-5', "minlength"=>"3", "maxlength"=>"5", "size"=>"5"]) !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="submit" value="addToCart">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

</section>
<section>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="row m-2">
        <div class="col-sm-12">
{{--            <div class="product">--}}
{{--                {{__('names.rating')}}--}}
{{--            </div>--}}

            <div class="container mt-5">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4 border-right">
                            <div class="ratings text-center p-4 py-5"> <span class="badge bg-success"><b>4.1</b> <i class="fa-solid fa-star"></i></span> <span class="d-block about-rating">VERY GOOD</span> <span class="d-block total-ratings">183 ratings</span> </div>
                        </div>
                        <div class="col-md-8">
                            <div class="rating-progress-bars p-3">
                                <div class="progress-1 align-items-center">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"> 71% </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-custom" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">55%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 48%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">48%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">30%</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">15%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>

{{--Rating form--}}
    <div id="vote">
        @if ( !$voted)
            <h1>Star rating </h1>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
        @else

        @endif
        </div>
            <h1>{{__('names.alreadyvoted')}}</h1>
        </div>
    </div>

</section>


@endsection

@push('scripts')
<script>
    $('input[type=radio][name=rating]').change(function() {
            // alert(this.value);
        $.post("{{route('addUserRating')}}",
            {
                "_token": "{{ csrf_token() }}",
                rating: this.value,
                product: {{$product->id}}
            },
            function(data, status){
                //alert("Data: " + data.val + "\nStatus: " + status);
                if ( data.val == "ok"){
                    // $('#vote').hide();
                    $('#vote').html("<h3>{{__("names.voted")}}");

                }

            });
    });
</script>
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

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 6vw;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
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
