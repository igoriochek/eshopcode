<footer class="d-block">
    <div style="padding: 100px 0 80px 0; background: #2f3e3f">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4 mt-md-5 mt-lg-0 position-relative">
                    <h5 class="fw-bold mb-5 footer-bar-title">
                        {{ __('footer.contactUs') }}
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-location-dot fs-4 contact-travel-icon"></i>
                            </div>
                            <div>
                                <h6 style="color: #ccc">{{ __('footer.address') }}</h6>
                                <span class="contact-travel-paragraph">{{ __('Perkūnkiemio g. 13-91, LT-12114 Vilnius ') }}</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-phone fs-4 contact-travel-icon"></i>
                            </div>
                            <div>
                                <h6 style="color: #ccc">{{ __('footer.phoneNumber') }}</h6>
                                <span class="contact-travel-paragraph">{{ __('+370 686 10246') }}</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-file-lines fs-4 contact-travel-icon"></i>
                            </div>
                            <div>
                                <h6 style="color: #ccc">{{ __('footer.companyCode') }}</h6>
                                <span class="contact-travel-paragraph">{{ __('304073493') }}</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-building-columns fs-4 contact-travel-icon"></i>
                            </div>
                            <div>
                                <h6 style="color: #ccc">{{ __('footer.vatCode') }}</h6>
                                <span class="contact-travel-paragraph">{{ __('LT100009695219') }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-5 mt-lg-0">
                    <h5 class="fw-bold mb-5 footer-bar-title">
                        {{ __('footer.menu') }}
                    </h5>
                    <ul class="list-unstyled mb-0">
                        @include('layouts.menus.user_menu_bottom')
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5 class="fw-bold mb-5 footer-bar-title">
                        {{ __('footer.securedPayment') }}
                    </h5>
                    <img src="{{ asset('images/320px-Paysera_logo.png') }}" alt="Paysera" width="250px">
                </div>
            </div>
        </div>
    </div>
    <div class="py-4" style="background: #172c2d">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <ul class="mb-0 p-0 d-flex justify-content-center justify-content-lg-start align-items-center list-unstyled text-center" style="gap: 25px">
                        <li>
                            <a class="footer-link" href="{{ url('/eu_projects') }}">
                                {{ __('menu.aboutUs') }}
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="{{ url('/termsofservice') }}">
                                {{ __('menu.termsofservice') }}
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="{{ url('/policy') }}">
                                {{ __('footer.privacyPolicy') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <p class="mb-0 copyright-paragraph text-center text-lg-end">
                        {{ __('footer.copyright') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
