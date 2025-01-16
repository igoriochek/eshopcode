@section('title', __('names.contactUsers'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

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
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="section-title bb-center">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('names.contactUsers') }}</h2>
                            </div>
                        </div>
                        @include('livewire.messenger.add_users')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('css')
<style>
    .bb-shop-wrap .bb-sidebar-block .bb-sidebar-title {
        margin-bottom: 0px !important;
    }

    .bb-shop-wrap .bb-sidebar-block {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .section-title .section-detail h2 {
        text-transform: none !important;
    }
</style>
@endpush