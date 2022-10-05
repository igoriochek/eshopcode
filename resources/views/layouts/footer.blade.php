<footer class="d-block">
    <div class="bg-light" style="padding: 100px 0 80px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <a class="navbar-brand fw-bold" href="{{ url('/home') }}">
                        <img src="/images/bonatrip.png" alt="bonatrip-logo" width="200px">
                    </a>
                    <p class="my-4 slogan-paragraph">
                        {{ __('footer.slogan') }}
                    </p>
                    <div class="d-flex" style="gap: 20px">
                        <a class="footer-link" href="{{ route('facebook.login') }}">
                            <i class="fa-brands fa-facebook fs-4"></i>
                        </a>
                        <a class="footer-link" href="{{ route('google.login') }}">
                            <i class="fa-brands fa-google fs-4"></i>
                        </a>
                        <a class="footer-link" href="{{ route('twitter.login') }}">
                            <i class="fa-brands fa-twitter fs-4"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-5 mt-lg-0">
                    <h5 class="fw-bold mb-5 footer-bar-title">
                        {{ __('footer.information') }}
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-4">
                            <a class="footer-link" href="{{ url('/') }}">
                                <i class="fa-solid fa-address-card fs-5 me-1"></i>
                                <span>{{ __('footer.aboutUsTeam') }}</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a class="footer-link" href="{{ url('/') }}">
                                <i class="fa-solid fa-briefcase fs-5 me-1"></i>
                                <span>{{ __('footer.career') }}</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a class="footer-link" href="{{ url('/') }}">
                                <i class="fa-solid fa-earth-africa fs-5 me-1"></i>
                                <span>{{ __('footer.allLocations') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-5 mt-lg-0 position-relative">
                    <h5 class="fw-bold mb-5 footer-bar-title">
                        {{ __('footer.contactUs') }}
                    </h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-location-dot fs-3 contact-travel-icon"></i>
                            </div>
                            <span class="contact-travel-paragraph">{{ __('Gyneju st. 14, LT-01109 Vilnius, Lithuania') }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <div style="width: 50px">
                                <i class="fa-solid fa-phone fs-3 contact-travel-icon"></i>
                            </div>
                            <span class="contact-travel-paragraph">{{ __('+370 679 22249') }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4" style="gap: 20px">
                            <a href="#" class="footer-link">
                                <i class="fa-brands fa-whatsapp fs-4"></i>
                            </a>
                            <a href="#" class="footer-link">
                                <i class="fa-brands fa-viber fs-4"></i>
                            </a>
                            <a href="#" class="footer-link">
                                <i class="fa-brands fa-telegram fs-4"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <ul class="mb-0 p-0 d-flex justify-content-center justify-content-lg-start align-items-center list-unstyled text-center" style="gap: 20px">
                        <li>
                            <a class="footer-link" href="#">
                                {{ __('footer.faq') }}
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                {{ __('footer.privacyPolicy') }}
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                {{ __('footer.termsOfService') }}
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                {{ __('footer.contantSupport') }}
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
