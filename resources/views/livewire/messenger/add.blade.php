<div>
    @include('layouts.navi.page-banner',[
        'secondPageLink' => 'messenger',
        'secondPageName' => __('menu.messenger'),
        'hasThirdPage' => true,
        'thirdPageName' => __('names.contantUsers'),
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
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="messenger-add-users p-4 mb-4 mb-sm-5">
                        <h6 class="messenger-add-users-title m-0">
                            {{ __('names.contactUsers') }}
                        </h6>
                        <hr class="m-0 p-0 mb-1">
                        @include('livewire.messenger.table')
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
            transition: color 400ms ease;
        }
        .sidebar .category-tree-widget-content li a:hover, .sidebar .category-tree-widget-content li a:focus {
            color: pink;
        }
        .sidebar .category-tree-widget-content li span {
            color: lightgray;
        }
        .messenger-add-users .messenger-add-users-title {
            padding-bottom: 15px;
        }
        .messenger-add-users .messenger-add-users-user {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }
        .messenger-add-users .messenger-add-users-user .messenger-add-users-name, .messenger-add-users .messenger-add-users-user .messenger-add-users-email {
            font-weight: 500;
        }
        .messenger-add-users .messenger-add-users-user .messenger-add-users-name {
            margin-bottom: 10px;
        }
        .messenger-add-users .messenger-add-users-user .messenger-add-users-email {
            color: #b4b4b4;
            overflow: hidden;
        }
    </style>
@endpush
