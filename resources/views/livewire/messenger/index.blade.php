@section('title', __('menu.messenger'))

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
                                    <a href="{{ route('livewire.messenger.add') }}" class="btn btn-primary btn-block rounded">
                                        {{ __('buttons.contact') }}
                                    </a>
                                </div>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="text-muted">{{__('messages.openChat')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .section-title::after {
        position: inherit !important;
    }
</style>