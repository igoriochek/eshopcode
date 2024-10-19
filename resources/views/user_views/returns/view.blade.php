@extends('layouts.app')

@section('title', __('names.return').' '.$return->id)
@section('parentTitle', __('menu.returns'))
@section('parentUrl', url('/user/rootreturns'))

@section('content')
<section class="contact-us pb-120 pt-20">
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
               <div class="job-overview-wrap bg-light-subtle p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
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
                           <button class="nav-link" style="width: 100%; display: flex; justify-content: start; align-items: center;" type="submit" onclick="event.preventDefault(); return confirm('{{ __('messages.confirmLogout') }}');">
                              <span>
                                 <i class="fa-solid fa-right-from-bracket" style="margin-right: 4px;"></i>
                              </span>
                              {{ __('menu.logout') }}
                           </button>
                        </form>
                     </div>
                  </nav>
               </div>
            </div>
            <div class="col-xxl-8 col-lg-8">
               <div class="profile__tab-content">
                  <div class="tab-content" id="profile-tabContent">
                     <div class="register-wrap p-5 bg-white shadow rounded-custom position-relative aos-init aos-animate" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                        <h3 class="profile__info-title">{{ __('names.returnDetails') }}</h3>
                        <div class="profile__address-item d-flex flex-column align-items-start">
                           <div class="profile__address-content d-flex flex-wrap" style="column-gap: 25px">
                              <p><span>{{ __('table.status').': ' }}</span>{{ __("status.".$return->status->name) }}</p>
                              <p><span>{{ __('table.sum').': ' }}</span>€{{ number_format($return->sum, 2) }}</p>
                              <p><span>{{ __('table.date').': ' }}</span>{{ $return->created_at->format('M d, Y') }}</p>
                           </div>
                           <div class="d-flex justify-content-start align-items-center flex-wrap gap-3">
                              <div class="btn-group">
                                 <a href="{{ route('vieworder', [$return->order_id]) }}" class="btn btn-primary">
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
                     <div class="register-wrap p-5 bg-white shadow rounded-custom position-relative aos-init aos-animate" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                        <h3 class="profile__info-title">{{ __('names.returnItems') }}</h3>
                        <div class="profile__ticket table-responsive">
                           @include('user_views.returns.tables.return_item_table')
                        </div>
                     </div>
                  </div>
               </div>
               <div class="profile__tab-content mt-30">
                  <div class="tab-content" id="profile-tabContent">
                     <div class="register-wrap p-5 bg-white shadow rounded-custom position-relative aos-init aos-animate" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
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

<style>
   .nav-tabs .nav-link.active {
      background-color: #fafafa !important;
      border-color: rgb(225, 226, 227) !important;

   }

   .nav-tabs .nav-link {
      border-radius: 0.3125rem !important;
      border: 1px solid rgb(225, 226, 227);
   }

   .nav-tabs {
      --bs-nav-tabs-border-color: rgba(17, 24, 39, 0) !important;
   }
</style>