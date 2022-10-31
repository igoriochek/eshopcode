<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                        <div class="logo mb-30">
                            <h4 class="widget-title text-uppercase text-brand">{{__('footer.contactInfo')}}</h4>
                        </div>
                        <ul class="contact-infor">
                            <li>
                                <img src="{{asset('/images/theme/icons/icon-location.svg')}}" alt="" />
                                <strong>{{__('footer.address')}}: </strong>
                                <span>Giedros g. 35, LT-10234 Vilnius</span>
                            </li>
                            <li>
                                <img src="{{asset('/images/theme/icons/icon-3.svg')}}" alt="" />
                                <strong>{{__('footer.companycode')}}: </strong>
                                <span>302900421</span>
                            </li>
                            <li>
                                <img src="{{asset('/images/theme/icons/icon-1.svg')}}" alt="" />
                                <strong>{{__('footer.vatcode')}}: </strong>
                                <span>LT100007714016</span>
                            </li>
                            <li>
                                <img src="{{asset('/images/theme/icons/icon-contact.svg')}}" alt="" />
                                <strong>{{__('footer.phone')}}: </strong>
                                <span>+ 370 650 99090</span>
                            </li>
                            <li>
                                <img src="{{asset('/images/theme/icons/icon-email-2.svg')}}" alt="" />
                                <strong>{{__('footer.email')}}: </strong>
                                <span>info@contentum.lt </span>
                            </li>
{{--                            <li>--}}
{{--                                <img src="{{asset('/images/theme/icons/icon-clock.svg')}}" alt="" />--}}
{{--                                <strong>{{ __('footer.hours') }}: </strong>--}}
{{--                                <span>HOURS</span>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title text-uppercase text-brand">{{__('footer.menu')}}</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @include('layouts.menus.guest_user_menu')
                    </ul>
                </div>
                @auth
                <div class="footer-link-widget col">
                    <h4 class="widget-title text-uppercase text-brand">{{__('footer.profile')}}</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li>
                            <a href="{{ url('/user/viewcart') }}">
                                {{__('menu.cart')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/user/rootorders') }}">
                                {{__('menu.orders')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/user/rootoreturns') }}">
                                {{__('menu.returns')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/user/userprofile') }}">
                                {{__('menu.profile')}}
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('menu.logout') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

                <div class="footer-link-widget widget-install-app col">
                    <h4 class="widget-title text-uppercase text-brand">{{__('footer.securedPayment')}}</h4>
                    <img class="wow fadeIn animated" src="{{asset('/images/theme/320px-Paysera_logo.png')}}" style="width: 200px" alt="" />
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-30" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">
                    <strong class="text-brand">{{__('footer.copyright')}}</strong>
                    <br />
                    {{__('footer.allRightsReserved')}}
                </p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <a href="/facebook/auth"><img src="{{asset('/images/theme/icons/icon-facebook-white.svg')}}" alt="/facebook/auth" /></a>
                    <a href="/google/auth"><img src="{{asset('/images/theme/icons/icon-google.svg')}}" alt="/google/auth" /></a>
                    <a href="/twitter/auth"><img src="{{asset('/images/theme/icons/icon-twitter-white.svg')}}" alt="/twitter/auth" /></a>
                </div>
            </div>
        </div>
    </div>
</footer>
