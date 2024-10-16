@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
    <section class="tp-shop-area mt-4 pb-120">
        <div class="container">
           <div class="row">
              <div class="col-12">
                 <div class="tp-shop-main-wrapper">

                    <!-- categories start -->
                    <div class="tp-sidebar-widget widget_categories mb-35">
                       <div class="job-overview-wrap bg-light-subtle p-4 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                           <h5 class="tp-shop-widget-title no-border">{{ __('names.categories') }}</h5>
                           @include('user_views.category.category_tree')
                       </div>
                    </div>
                    <!-- categories end -->

                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

@push('css')
    <style>
        .active {
            color: #0989FF;
        }

        .tp-sidebar-widget ul li a::after {
            position: absolute;
            content: "";
            width: 0;
            height: 0;
            background-color: transparent;
            border-radius: 50%;
            left: 0;
            top: 12px;
        }
    </style>
@endpush