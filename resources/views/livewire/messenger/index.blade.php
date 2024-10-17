@section('title', __('menu.messenger'))

<section class="feature-section-two ptb-120">
    <div class="container">
       <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="widget p-3" style="border: 1px solid #e5e5e5">
                    <div class="widget-title-container d-flex justify-content-between align-items-center mb-2 pb-3 mb-3" style="border-bottom: 1px solid #EEEEEE;">
                        <h4 class="tp-sidebar-widget-title mb-0" style="margin-right: 10px;">
                            {{ __('names.messages') }}
                        </h4>
                        <button type="button" class="btn btn-primary p-0 py-2">
                            <a href="{{ route('livewire.messenger.add') }}" class="px-4" style="color: #fff;">
                                {{ __('buttons.contact') }}
                            </a>
                        </button>
                    </div>
                    <div class="category-tree-widget-content" >
                        @include('livewire.messenger.users')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 mt-50 mt-md-0">
                <div class="tp-postbox-wrapper">
                    <div class="text-center">
                        <span class="text-muted">{{__('messages.openChat')}}</span>
                    </div>
                </div>
            </div>
       </div>
    </div>
 </section>
