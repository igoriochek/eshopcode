<footer class="revealed pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h6 class="mb-4 text-white fw-bold text-uppercase">
                    <span>{{__('footer.contactInfo')}}</span>
                </h6>
                <ul>
                    <li class="mb-3">
                        <h3>{{__('footer.address')}}</h3>
                        Lietuvininkų g. 70, LT-99182 Šilutė.
                    </li>
                    <li class="mb-3">
                        <h3>{{__('footer.phone')}}</h3>
                        <a href="tel://0037065688588">+370 656 88588</a>
                    </li>
                    <li class="mb-3">
                        <h3>{{__('footer.email')}}</h3>
                        <a href="mailto:info@viatora.com">info@viatora.com</a>
                    </li>
                    <li class="mb-3">
                        <h3>{{__('footer.companyCode')}}</h3>
                        300600012
                    </li>
                    <li class="mb-3">
                        <h3>{{__('footer.vatCode')}}</h3>
                        LT100003014514
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h6 class="mb-4 text-white fw-bold text-uppercase">
                    <span>{{__('footer.menu')}}</span>
                </h6>
                <ul>
                    @include('layouts.menus.footermenu')
                </ul>
            </div>
            @auth
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <h6 class="mb-4 text-white fw-bold text-uppercase">
                        <span>{{__('footer.profile')}}</span>
                    </h6>
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
                <h6 class="mb-4 text-white fw-bold text-uppercase">
                    <span>{{__('footer.language')}}</span>
                </h6>
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
                    <ul class="dropdown-menu mt-1" aria-labelledby="navbarDropdown">
                        @foreach (config('translatable.locales') as $locale)
                            <li>
                                <a class="dropdown-item" href="/lang/{{ $locale }}"
                                   class="@if (app()->getLocale() == $locale)  @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                    @if ($locale == 'en')
                                        {{ __('English') }}
                                    @elseif ($locale == 'lt')
                                        {{ __('Lietuviskai') }}
                                    @elseif ($locale == 'ru')
                                        {{ __('Pусский') }}
                                    @endif
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
