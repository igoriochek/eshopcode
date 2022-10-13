<div class="footer-section">
    <div class="footer-widget-area section-padding-01">
        <div class="container">
            <div class="row gy-6">
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <a href="/home">
                            <h4 class="footer-widget__title text-uppercase">{{__('footer.contactInfo')}}</h4>
                        </a>
                        <div class="footer-widget__info" style="margin-top: 0">
                            <p>{{__('footer.address')}}</p>
                            <span class="number">ADDRESS</span>
                        </div>
                        <div class="footer-widget__info" style="margin-top: 0">
                            <p>{{__('footer.phone')}}</p>
                            <span class="number"><a href="tel://0037060000000">PHONE</a></span>
                        </div>
                        <div class="footer-widget__info" style="margin-top: 0">
                            <p>{{__('footer.email')}}</p>
                            <span class="number"> <a href="mailto:help@mdproject.com">EMAIL</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row gy-6">
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title text-uppercase">
                                   {{__('footer.menu')}}
                                </h4>
                                <ul class="footer-widget__link">
                                    @include('layouts.usermenu')
                                </ul>
                            </div>
                        </div>
                        @auth
                            <div class="col-sm-4">
                                <h4 class="footer-widget__title text-uppercase">
                                    {{__('footer.profile')}}
                                </h4>
                                <ul class="footer-widget__link">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-wrapper text-center">
                <div class="footer-widget__social-02">
                    <a class="facebook" href="{{ route('facebook.login') }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="youtube" href="{{ route('google.login') }}"><i class="fab fa-google"></i></a>
                    <a class="twitter" href="{{ route('twitter.login') }}"><i class="fab fa-twitter"></i></a>
                </div>
                <p class="footer-widget__copyright mt-0">{{__('footer.copyright')}}</p>
            </div>
        </div>
    </div>
</div>
