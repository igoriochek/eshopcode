<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5>
                    <span>{{__('footer.contactInfo')}}</span>
                </h5>
                <ul>
                    <li>
                        <h3>{{__('footer.address')}}</h3>
                        Konstitucijos pr. 7, Vilnius, Verslo centras „Europa“, 12 aukštas, LT-09308
                    </li>
                    <li>
                        <h3>{{__('footer.phone')}}</h3>
                        <a href="tel://0037060000000">+37060000000 </a>
                    </li>
                    <li>
                        <h3>Viber, Whatsapp</h3>
                        +370 685 777 77
                    </li>
                    <li>
                        <h3>{{__('footer.email')}}</h3>
                        <a href="mailto:help@viatora.com">help@viatora.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5>
                    <span>{{__('footer.menu')}}</span>
                </h5>
                <ul>
                    @include('layouts.menus.guestmenu')
                </ul>
            </div>
            @auth
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <h5>
                        <span>{{__('footer.profile')}}</span>
                    </h5>
                    <ul>
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

            <div class="col-md-2">
                <h3>{{__('footer.language')}}</h3>
                <div class="dropdown dropdown-mini" style="text-align: center; border-radius: 3px; background: #444; width: 120px">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-start" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false" style="color: #999; font-weight: 400">
                        @if (app()->getLocale() == 'en')
                            {{ __('English') }}
                        @elseif (app()->getLocale() == 'lt')
                            {{ __('Lietuviskai') }}
                        @elseif (app()->getLocale() == 'ru')
                            {{ __('Pусский') }}
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (config('translatable.locales') as $locale)
                            <li>
                                <a class="dropdown-item" href="/lang/{{ $locale }}"
                                   class="@if (app()->getLocale() == $locale)  @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                    {{ strtoupper($locale) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="{{ route('facebook.login') }}"><i class="icon-facebook"></i></a></li>
                            <li><a href="{{ route('twitter.login') }}"><i class="icon-twitter"></i></a></li>
                            <li><a href="{{ route('google.login') }}"><i class="icon-google"></i></a></li>
                        </ul>
                        <p>{{__('footer.copyright')}}</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->
