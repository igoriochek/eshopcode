@section('title', __('names.contactUsers'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div>
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="single-shop-sidebar-widget categories">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h3 class="widget-title m-0">
                                    {{ __('names.messages') }}
                                </h3>
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
                            <h4 class="messenger-add-users-title m-0 pb-1">
                                {{ __('names.contactUsers') }}
                            </h4>
                            <p>
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
