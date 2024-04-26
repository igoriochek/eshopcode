@section('title', $user->name ?? __('names.user'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

@section('title', __('menu.messenger'))

<section class="tp-postbox-area pb-80">
    <div class="container">
       <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="widget">
                    <div class="widget-title-container d-flex justify-content-between align-items-center mb-2 pb-3 mb-3" style="border-bottom: 1px solid #EEEEEE;">
                        <h2 class="tp-sidebar-widget-title mb-0">
                            {{ __('names.messages') }}
                        </h2>
                        <button type="button" class="tp-filter-btn filter-open-btn p-0 py-2">
                            <a href="{{ route('livewire.messenger.add') }}" class="px-4">
                                {{ __('buttons.contact') }}
                            </a>
                        </button>
                    </div>
                    <div class="category-tree-widget-content">
                        @include('livewire.messenger.users')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 mt-50 mt-md-0">
                <div class="tp-postbox-wrapper">
                    @include('livewire.messenger.room')
                </div>
            </div>
       </div>
    </div>
 </section>
