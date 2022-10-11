<div>
    @include('page_header', [
        'secondPageLink' => 'messenger',
        'secondPageName' => __('menu.messenger'),
        'hasThirdPage' => true,
        'thirdPageName' => 'add'
    ])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-lg-4 col-md-12 primary-sidebar sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Messenger Sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0; padding-bottom: 1px; position: static; transform: none; top: 0; left: 975.994px;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30 d-flex justify-content-between align-items-center w-100">
                            {{ __('names.messages') }}
                        </h5>
                        @include('livewire.messenger.users')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div>
                    <h4 class="mb-2">
                        {{ __('names.contactUsers') }}
                    </h4>
                    <p>
                        {{ __('names.showing') }}
                        @if ($addUsers->currentPage() !== $addUsers->lastPage())
                            {{ ($addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1).__('–').($addUsers->count() * $addUsers->currentPage())}}
                        @else
                            @if ($addUsers->total() - $addUsers->count() === 0)
                                {{ 1 }}
                            @else
                                {{ ($addUsers->total() - $addUsers->count()).__('–').$addUsers->total() }}
                            @endif
                        @endif
                        {{ __('names.of') }}
                        {{ $addUsers->total().' '.__('names.resultsOf') }}
                    </p>
                    @include('livewire.messenger.add_users')
                </div>
            </div>
        </div>
    </div>
</div>
