@section('title', __('names.contactUsers'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div class="axil-single-product-area axil-section-gap bg-color-white">
    <section class="pt-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 mb-5">
                    <div class="brand-init style1">
                        <div class="widget">
                            <div class="section-title">
                                <div class="border-bottom cbb1 mb-4 pb-4 d-flex justify-content-between align-items-center">
                                    <h4 class="title mb-1">
                                        {{ __('names.messages') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="messenger-add-users px-4 mb-4 mb-sm-5">
                        <div class="mb-4">
                            <h1 class="mb-3">{{ __('names.contactUsers') }}</h1>
                            <div class="grid-nav-wraper bg-light mb-5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                                        <nav class="shop-grid-nav">
                                            <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                                <li> <span class="total-products text-capitalize">
                                                        {{ __('names.showing') }}
                                                        @if ($addUsers->currentPage() !== $addUsers->lastPage())
                                                        {{ ($addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1).__('–').($addUsers->count() * $addUsers->currentPage()) }}
                                                        @else
                                                        @if ($addUsers->total() - $addUsers->count() === 0)
                                                        {{ $addUsers->count() }}
                                                        @else
                                                        {{ ($addUsers->total() - $addUsers->count()).__('–').$addUsers->total() }}
                                                        @endif
                                                        @endif
                                                        {{ __('names.of') }}
                                                        {{ $addUsers->total().' '.__('names.entries') }}
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            @include('livewire.messenger.add_users')
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


@push('css')
<style>
    .filter-results {
        margin-left: 0px !important;
    }

    .section-title::after {
        position: inherit !important;
    }
</style>
@endpush