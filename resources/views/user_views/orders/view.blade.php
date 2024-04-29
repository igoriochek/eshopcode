@extends('layouts.app')

@section('title', __('names.order').' '.$order->order_id)
@section('parentTitle', __('menu.orders'))
@section('parentUrl', url('/user/rootorders'))

@section('content')
    <section class="profile__area pb-120 pt-20">
        <div class="container">
           <div class="profile__inner p-relative">
              <div class="profile__shape">
                 <img class="profile__shape-1" src="{{ asset('template/img/login/laptop.png') }}" alt="">
                 <img class="profile__shape-2" src="{{ asset('template/img/login/man.png') }}" alt="">
                 <img class="profile__shape-3" src="{{ asset('template/img/login/shape-1.png') }}" alt="">
                 <img class="profile__shape-4" src="{{ asset('template/img/login/shape-2.png') }}" alt="">
                 <img class="profile__shape-5" src="{{ asset('template/img/login/shape-3.png') }}" alt="">
                 <img class="profile__shape-6" src="{{ asset('template/img/login/shape-4.png') }}" alt="">
              </div>
              <div class="row">
                <div class="col-12 mb-4">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                 <div class="col-xxl-4 col-lg-4">
                    <div class="profile__tab mr-40">
                       <nav>
                          <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                             <a class="nav-link" href="{{ url('/user/userprofile') }}">
                                <span>
                                    <i class="fa-regular fa-address-card"></i>
                                </span>
                                {{ __('menu.profile') }}
                             </a>
                             <a class="nav-link active" href="{{ url('/user/rootorders') }}">
                                <span>
                                    <i class="fa-solid fa-box-open"></i>
                                </span>
                                {{ __('menu.orders') }}
                             </a>
                             <a class="nav-link" href="{{ url('/user/rootoreturns') }}">
                                <span>
                                    <i class="fa-solid fa-right-left"></i>
                                </span>
                                {{ __('menu.returns') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="nav-link" type="submit" onclick="event.preventDefault(); return confirm('{{ __('messages.confirmLogout') }}');">
                                    <span>
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </span>
                                    {{ __('menu.logout') }}
                                </button>
                             </form>
                             <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                          </div>
                       </nav>
                    </div>
                 </div>
                 <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">
                        <div class="tab-content" id="profile-tabContent">
                         <div class="tab-pane fade active show" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                             <h3 class="profile__info-title">{{ __('names.orderDetails') }}</h3>
                             <div class="profile__address-item d-flex flex-column align-items-start">
                                <div class="profile__address-content d-flex flex-wrap" style="column-gap: 25px">
                                    <p><span>{{ __('names.order').' ID: ' }}</span>{{ $order->order_id }}</p>
                                   <p><span>{{ __('table.status').': ' }}</span>{{ __("status.".$order->status->name) }}</p>
                                   <p><span>{{ __('table.sum').': ' }}</span>€{{ number_format($order->sum, 2) }}</p>
                                   <p><span>{{ __('table.date').': ' }}</span>{{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mt-10">
                                    @if ($order->status->name == 'Returned')
                                    <div class="btn-group">
                                        <a href="{{ route('viewreturn', [$return->id]) }}" class="tp-logout-btn">
                                            {{ __('names.return') }}
                                        </a>
                                    </div>
                                    @endif
                                    @if ($order->status->name !== "Returned" && $order->status->name !== "Canceled")
                                        @if ($order->status->name !== 'Completed')
                                            <div class="btn-group">
                                                <a href="{{ route('cancelnorder', [$order->id]) }}" class="tp-logout-btn">
                                                    {{ __('buttons.cancel') }}
                                                </a>
                                            </div>
                                        @endif
                                        @if ($order->status->name == 'Completed')
                                            <div class="btn-group">
                                                <a href="{{ route('returnorder', [$order->id]) }}" class="tp-logout-btn">
                                                    {{ __('buttons.return') }}
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                    @if ($order->status->name == 'Completed' || $order->status->name == 'Returned')
                                        <div class="btn-group">
                                            <a href="{{ route('download_invoice', [$order->id]) }}" class="tp-logout-btn">
                                                {{ __('names.invoice') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                             </div>
                          </div>
                        </div>
                     </div>
                    <div class="profile__tab-content mt-30">
                       <div class="tab-content" id="profile-tabContent">
                        <div class="tab-pane fade active show" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <h3 class="profile__info-title">{{ __('names.orderItems') }}</h3>
                            <div class="profile__ticket table-responsive">
                                @include('user_views.orders.tables.order_item_table')
                            </div>
                         </div>
                       </div>
                    </div>
                    <div class="profile__tab-content mt-30">
                        <div class="tab-content" id="profile-tabContent">
                         <div class="tab-pane fade active show" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                             <h3 class="profile__info-title">{{ __('names.orderHistory') }}</h3>
                             <div class="profile__ticket table-responsive">
                                @include('orders.history_table')
                             </div>
                          </div>
                        </div>
                     </div>
                 </div>
              </div>
           </div>
        </div>
    </section>
@endsection

