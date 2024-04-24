<footer>
    <div class="tp-footer-area tp-footer-style-2 tp-footer-style-primary tp-footer-style-6" data-bg-color="#F4F7F9" style="background-color: rgb(244, 247, 249);">
       <div class="tp-footer-top pt-95 pb-40">
          <div class="container">
             <div class="row">
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-6">
                   <div class="tp-footer-widget footer-col-1 mb-50">
                      <div class="tp-footer-widget-content">
                         <div class="tp-footer-logo">
                            <a href="{{ url('/') }}">
                               <img src="{{ asset('images/dts_logo_black.png') }}" alt="logo">
                            </a>
                         </div>
                         <div class="tp-footer-social">
                            {{-- <a href="#"><i class="fa-brands fa-facebook-f"></i></a> --}}
                         </div>
                         <div class="tp-footer-widget-content">
                            <div class="tp-footer-talk mb-20">
                               <span>{{ __('footer.contactInfo') }}</span>
                               <h4>
                                <a href="tel:#">+370xxxxxxxx</a>
                               </h4>
                            </div>
                            <div class="tp-footer-contact">
                               <div class="tp-footer-contact-item d-flex align-items-start">
                                  <div class="tp-footer-contact-icon">
                                     <span>
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                           <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                     </span>
                                  </div>
                                  <div class="tp-footer-contact-content">
                                     <p><a href="mailto:#">untitled@untitled.com</a></p>
                                  </div>
                               </div>
                               <div class="tp-footer-contact-item d-flex align-items-start">
                                  <div class="tp-footer-contact-icon">
                                     <span>
                                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z" stroke="currentColor" stroke-width="1.5"></path>
                                           <path d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z" stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                     </span>
                                  </div>
                                  <div class="tp-footer-contact-content">
                                     <p>
                                        <a href="javascript:void(0)" target="_blank">
                                            {{ __('footer.address') }}
                                        </a>
                                    </p>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="tp-footer-widget footer-col-2 mb-50">
                       <h4 class="tp-footer-widget-title">{{ __('footer.account') }}</h4>
                       <div class="tp-footer-widget-content">
                          <ul>
                             @auth
                             <li>
                                 <a href="{{ url('/user/viewcart') }}">
                                     {{ __('menu.cart') }}
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ url('/user/rootorders') }}">
                                     {{ __('menu.orders') }}
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ url('/user/rootoreturns') }}">
                                     {{ __('menu.returns') }}
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ url('/user/userprofile') }}">
                                     {{ __('menu.profile') }}
                                 </a>
                             </li>
                             <li>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                     @csrf
                                     <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                         {{ __('menu.logout') }}
                                     </a>
                                 </form>
                             </li>
                         @else
                             <li>
                                 <a href="{{ route('login') }}">
                                     {{ __('buttons.login') }}
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('register') }}" >
                                     {{ __('buttons.register') }}
                                 </a>
                             </li>
                         @endauth
                          </ul>
                       </div>
                    </div>
                 </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="tp-footer-widget footer-col-3 mb-50">
                       <h4 class="tp-footer-widget-title">{{ __('footer.menu') }}</h4>
                       <div class="tp-footer-widget-content">
                          <ul>
                            <li>
                                <a href="{{ url('/products') }}" >
                                    {{ __('menu.products') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/rootcategories') }}">
                                    {{ __('menu.categories') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/promotions') }}">
                                    {{ __('menu.promotions') }}
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ url('/user/discountCoupons') }}">
                                        {{ __('menu.discountCoupons') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/messenger') }}">
                                        {{ __('menu.messenger') }}
                                    </a>
                                </li>
                            @endauth
                          </ul>
                       </div>
                    </div>
                 </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                   <div class="tp-footer-widget footer-col-4 mb-50">
                    <h4 class="tp-footer-widget-title">{{ __('footer.information') }}</h4>
                    <div class="tp-footer-widget-content">
                        <ul>
                          <li>
                              <a href="{{ url('/about_us') }}">
                                  {{ __('menu.aboutUs') }}
                              </a>
                          </li>
                          <li>
                              <a href="{{ url('/termsofservice') }}">
                                  {{ __('menu.termsofservice') }}
                              </a>
                          </li>   
                          <li>
                              <a href="{{ url('/policy') }}">
                                  {{ __('menu.policy') }}
                              </a>
                          </li>   
                          <li>
                              <a href="{{ url('/eu_projects') }}">
                                  {{ __('menu.euProjects') }}
                              </a>
                          </li>   
                        </ul>
                     </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="tp-footer-bottom">
          <div class="container">
             <div class="tp-footer-bottom-wrapper">
                <div class="row align-items-center">
                   <div class="col-md-6">
                      <div class="tp-footer-copyright">
                         <p>{{ __('footer.copyright') }}</p>
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="tp-footer-payment text-md-end">
                         <p>
                            <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="image" width="80px">
                         </p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>