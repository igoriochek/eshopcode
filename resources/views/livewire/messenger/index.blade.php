@section('title', __('menu.messenger'))

<div class="shipping-area shipping-style-2 section-space-y-axis-100">
    <div class="container">
        <div class="row shipping-wrap py-5 py-xl-0" style="align-items: start;">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="contact-form-wrap">
                    <div class="contact-form" style="width: 100%;">
                        <div class="widget-title-container d-flex justify-content-between align-items-center mb-2 pb-3 mb-3"
                            style="border-bottom: 1px solid #EEEEEE;">
                            <h4 class="contact-form-title mb-0">
                                {{ __('names.messages') }}
                            </h4>
                            <button type="button"
                                class="btn btn btn-custom-size md-size btn-primary btn-secondary-hover rounded-0 p-0"
                                style="width: 120px; height: 45px; line-height: 0px;">
                                <a href="{{ route('livewire.messenger.add') }}" class="p-4" style="color: #fefdfd;">
                                    {{ __('buttons.contact') }}
                                </a>
                            </button>
                        </div>
                        <div class="category-tree-widget-content">
                            @include('livewire.messenger.users')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 mt-50 mt-md-0">
                <div class="tp-postbox-wrapper">
                    <div class="text-center">
                        <a class="text-muted">{{ __('messages.openChat') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
