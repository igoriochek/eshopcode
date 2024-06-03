@extends('layouts.app')

@section('title', __('menu.categories'))

@section('content')
    <!-- <section class="tp-blog-grid-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-12">
                 <div class="tp-sidebar-wrapper">

                    <div class="tp-sidebar-widget widget_categories mb-35">
                       <div class="tp-sidebar-widget-content">
                            @include('user_views.category.category_tree')
                       </div>
                    </div>
                    
                 </div>
              </div>
           </div>
        </div>
     </section> -->
<div class="shop-area section-space-y-axis-100">
   <div class="container">
      <div class="row">
         <div class=" order-lg-1 order-2 pt-10 pt-lg-0">
            <div class="sidebar-area style-2">
               <div class="widgets-area mb-9">
                  <h2 class="widgets-title mb-5">{{ __('names.categories') }}</h2>
                  @include('user_views.category.category_tree')
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



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