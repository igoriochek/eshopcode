@section('title', __('names.contactUsers'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))


<section class="shipping-area shipping-style-2 section-space-y-axis-100">
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
                    <div class="product-topbar">
                        <ul class="mb-3">
                            <li class="page-count">
                                {{ __('names.showing') }}
                                <span>
                                    @if ($addUsers->currentPage() !== $addUsers->lastPage())
                                        {{ $addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1 . __('–') . $addUsers->count() * $addUsers->currentPage() }}
                                    @else
                                        @if ($addUsers->total() - $addUsers->count() === 0)
                                            {{ $addUsers->count() }}
                                        @else
                                            {{ $addUsers->total() - $addUsers->count() . __('–') . $addUsers->total() }}
                                        @endif
                                    @endif
                                </span>
                                {{ __('names.of') }}
                                <span>{{ $addUsers->total() }}</span>
                                {{ __('names.entries') }}
                            </li>
                        </ul>
                        @include('livewire.messenger.add_users')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
