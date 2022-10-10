<div>
    <section class="pt-5">
        <div class="container mb-30" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-4 col-md-12 primary-sidebar sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!-- Messenger Sidebar Widget -->
                    <div class="theiaStickySidebar" style="padding-top: 0; padding-bottom: 1px; position: static; transform: none; top: 0; left: 975.994px;">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30 d-flex justify-content-between align-items-center w-100">
                                {{ __('names.messages') }}
                                <a class="btn btn-primary" href="{{ route('livewire.messenger.add') }}">
                                    {{ __('buttons.contact') }}
                                </a>
                            </h5>
                            @include('livewire.messenger.users')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="text-muted fs-6">{{__('messages.openChat')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
