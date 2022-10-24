<div>
    @include('layouts.navi.page-banner',[
         'secondPageLink' => 'messenger',
        'secondPageName' => __('menu.messenger'),
        'hasThirdPage' => false
    ])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h6 class="widget-title m-0">
                                    {{ __('names.messages') }}
                                </h6>
                                <a class="btn btn-primary btn-hover-secondary" href="{{ route('livewire.messenger.add') }}">
                                    <i class="fa-solid fa-plus"></i>
                                    {{ __('buttons.contact') }}
                                </a>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5 mt-5 mt-lg-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="text-muted">{{__('messages.openChat')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('css')
    <style>
        .sidebar .category-tree-widget-content li {
            list-style: none;
        }
        .sidebar .category-tree-widget-content li a {
            text-decoration: none;
            color: gray;
            transition: color 400ms ease;
        }
        .sidebar .category-tree-widget-content li a:hover, .sidebar .category-tree-widget-content li a:focus {
            color: pink;
        }
        .sidebar .category-tree-widget-content li span {
            color: lightgray;
        }
    </style>
@endpush
