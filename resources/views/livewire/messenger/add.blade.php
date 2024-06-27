@section('title', __('names.contactUsers'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div class="axil-single-product-area axil-section-gap bg-color-white">
    <section class="pt-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 mb-5">
                    <div class="content-blog blog-grid">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h4 class="mb-1">
                                    {{ __('names.messages') }}
                                </h4>
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
                            <h3 class="messenger-add-users-title m-0 pb-1 mb-1">
                                {{ __('names.contactUsers') }}
                            </h3>
                            <p class="filter-results">
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
                            </p>
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
    </style>
@endpush
