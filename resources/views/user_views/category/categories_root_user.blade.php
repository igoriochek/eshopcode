@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'rootcategories',
    'secondPageName' => __('names.categories'),
    'hasThirdPage' => false
])

    <div class="container py-10">
        <div class="row" style="padding-left: 100px; padding-right: 100px">
            <div class="col-lg-12">
                @include('user_views.category.categoryTree')
            </div>
        </div>
    </div>

@endsection
