<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>{{__('footer.help')}}</h3>
                <a href="tel://0037060000000" id="phone">+37060000000</a>
                <a href="mailto:help@viatora.com" id="email_footer">help@viatora.com</a>
            </div>
            <div class="col-md-3">
                <h3>Viatora</h3>
                <ul>
                    <li><a href="#"><span>{{ __('footer.about') }}</span></a></li>
                    <li><a href="#"><span>{{ __('footer.careers') }}</span></a></li>
                    <li><a href="#"><span>{{ __('footer.faq') }}</span></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>{{__('footer.termsAndPrivacy')}}</h3>
                <ul>
                    <li><a href="#"><span>{{ __('footer.terms') }}</span></a></li>
                    <li><a href="#"><span>{{ __('footer.privacy') }}</span></a></li>
                </ul>
            </div>
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
