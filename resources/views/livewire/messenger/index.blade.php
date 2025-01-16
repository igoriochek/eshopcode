@section('title', __('menu.messenger'))
<section class="section-terms padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="bb-shop-wrap">
                    <div class="bb-sidebar-block">
                        <div class="bb-sidebar-title">
                            <h3>{{ __('names.messages') }}</h3>
                        </div>
                        <a href="{{ route('livewire.messenger.add') }}" class="bb-btn-2">
                            {{ __('buttons.contact') }}
                        </a>
                    </div>
                    <div class="bb-sidebar-block">
                        @include('livewire.messenger.users')
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

<style>
    .bb-shop-wrap .bb-sidebar-block .bb-sidebar-title {
        margin-bottom: 0px !important;
    }

    .bb-shop-wrap .bb-sidebar-block {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>