@section('title', $user->name ?? __('names.user'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div class="axil-single-product-area axil-section-gap bg-color-white">
    <section class="pt-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="content-blog blog-grid">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h4 class="mb-1">
                                    {{ __('names.messages') }}
                                </h4>
                                <a class="axil-btn btn-bg-primary" href="{{ route('livewire.messenger.add') }}">
                                    {{ __('buttons.contact') }}
                                </a>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-blog blog-grid col-lg-8">
                    @include('livewire.messenger.room')
                </div>
            </div>
        </div>
    </section>
</div>
