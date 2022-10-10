@extends('layouts.app')

@section('content')
    <div class="container mb-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-lg-12 primary-sidebar sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Product sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0; padding-bottom: 1px; position: static; transform: none; top: 0; left: 975.994px;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            {{ __('names.categories') }}
                        </h5>
                        @include('user_views.category.categoryTreeview')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
