@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

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
                             <a class="nav-link" href="{{ url('/user/rootorders') }}">
                                <span>
                                    <i class="fa-solid fa-box-open"></i>
                                </span>
                                {{ __('menu.orders') }}
                             </a>
                             <a class="nav-link active" href="{{ url('/user/rootoreturns') }}">
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
                             <h3 class="profile__info-title">{{ __('names.returnDetails') }}</h3>
                             <div class="profile__address-item d-flex flex-column align-items-start">
                                <div class="profile__address-content d-flex flex-wrap gap-4">
                                   <p><span>{{ __('table.status').': ' }}</span>{{ __("status.".$return->status->name) }}</p>
                                   <p><span>{{ __('table.sum').': ' }}</span>€{{ number_format($return->sum, 2) }}</p>
                                   <p><span>{{ __('table.date').': ' }}</span>{{ $return->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center flex-wrap gap-3 mt-10">
                                    <div class="btn-group">
                                        <a href="{{ route('vieworder', [$return->order_id]) }}" class="tp-logout-btn">
                                            {{ __('names.order') }}
                                        </a>
                                    </div>
                                </div>
                             </div>
                          </div>
                        </div>
                     </div>
                    <div class="profile__tab-content mt-30">
                       <div class="tab-content" id="profile-tabContent">
                        <div class="tab-pane fade active show" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            <h3 class="profile__info-title">{{ __('names.returnItems') }}</h3>
                            <div class="profile__ticket table-responsive">
                                @include('user_views.returns.tables.return_item_table')
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

