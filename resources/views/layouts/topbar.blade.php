<div class="header-top header-top-ptb-1 d-lg-block">
    <div class="container py-1">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 cl-md-4 col-8">
                <div class="header-info">
                    <ul>
                        <li class="d-flex gap-1">
                            <i class="fa-solid fa-phone me-1 text-danger"></i>
                            <strong>{{__('footer.phone')}}: </strong>
                            <span>+370 620 90867</span>
                        </li>
                        <li class="d-none d-md-flex gap-1">
                            <i class="fa-solid fa-envelope me-1 text-danger"></i>
                            <strong>{{__('footer.email')}}: </strong>
                            <span>vilmavenckute3@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-4 col-4">
                <div class="header-info header-info-right">
                    <ul>
                        <li>
                            <a id="navbarDropDown"  class="language-dropdown-active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                {{__('messages.chooselang')}}
                                <i class="fi-rs-angle-small-down"></i>
                            </a>
                            <ul class="language-dropdown" aria-labelledby="navbarDropdown" style="z-index: 9999999">
                                @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a class="dropdown-item" href="/lang/{{ $locale }}"
                                            class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                            <img src="{{asset('/images/theme/flag-' . $locale . '.png')}}" alt="{{$locale}}"/>
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
