<div class="d-none d-lg-flex justify-content-center align-items-center text-light topbar">
    <div class="container">
        <div class="py-1">
            <div class="row">
                <div class="col-12">
                    <div class="d-lg-flex align-items-center text-center">
                        <div class="d-flex justify-content-between" style="gap: 20px">
                            <div class="d-flex align-items-center">
                                <a class="text-light" href="#">
                                    <i class="fa-solid fa-phone topbar_icon me-1"></i>
                                    <span>+370 686 10246</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <a class="text-light" href="#">
                                    <i class="fa-solid fa-location-dot topbar_icon me-1"></i>
                                    <span>Perkūnkiemio g. 13-91, LT-12114 Vilnius </span>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between ms-auto" style="gap: 5px">
                            <div class="d-flex align-items-center " style="gap: 15px">
                                <a class="topbar_icon_link" href="{{ route('facebook.login') }}">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class="topbar_icon_link" href="{{ route('google.login') }}">
                                    <i class="fa-brands fa-google"></i>
                                </a>
                                <a class="topbar_icon_link" href="{{ route('twitter.login') }}">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center">
                                <ul class="m-0 p-0" style="list-style: none">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                            @if (app()->getLocale() == 'lt')
                                                <img src="/images/lt-flag.png" alt="lt-flag" width=18 height=13 class="me-1">
                                                {{ __('LT') }}
                                            @elseif (app()->getLocale() == 'en')
                                                <img src="/images/en-flag.png" alt="en-flag" width=18 height=13 class="me-1">
                                                {{ __('EN') }}
                                            @elseif (app()->getLocale() == 'ru')
                                                <img src="/images/ru-flag.svg" alt="en-flag" width=17 class="me-1">
                                                {{ __('RU') }}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach (config('translatable.locales') as $locale)
                                                <li>
                                                    <a class="dropdown-item" href="/lang/{{ $locale }}"
                                                       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                                        {{ strtoupper($locale) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
