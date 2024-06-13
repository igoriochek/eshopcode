@extends('layouts.app')

@section('title', __('menu.fbDataDeletion'))

@section('content')

    <div class="about-banner different-bg-position section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
                <div class="col-lg-12">
                    <div class="about-banner-content text-start section-space-bottom-95">
                        <div class="section-title">
                            @if (config('app.locale') == 'lt')
                                <p class="short-desc mb-0">Jodesta svetainėje naudojamas Facebook prisijungimas. Pagal
                                    Facebook politiką turime pateikti Duomenų ištrynimo instrukcijos URL adresą.</p>
                                <p class="short-desc mb-0">Jei norite ištrinti savo veiklą Jodesta svetainėje, galite
                                    pašalinti savo informaciją atlikdami šiuos veiksmus:</p>
                                <div class="ps-4 pb-1">1. Eikite į Facebook Account's Setting & Privacy (Facebook paskyros
                                    nustatymai ir privatumas). Spustelėkite Settings (Nustatymai).</div>
                                <div class="ps-4 pb-1">2. Ieškokite Apps and Websites (Programėlės ir svetainės) ir
                                    pamatysite visas programėles ir svetaines, kurias susiejote su savo Facebook paskyra.
                                </div>
                                <div class="ps-4 pb-1">3. Ieškokite ir paieškos juostoje spustelėkite Jodesta.</div>
                                <div class="ps-4 pb-1">4. Slinkite ir spustelėkite Remove (Pašalinti).</div>
                                <div class="ps-4 pb-1">5. Sveikiname, jūs sėkmingai pašalinote savo veiklą mūsų svetainėje.
                                </div>
                            @elseif (config('app.locale') == 'ru')
                                <p class="short-desc mb-0">На сайте Jodesta используется логин Facebook. Согласно политике
                                    Facebook, мы должны предоставить URL-адрес инструкции по удалению данных.</p>
                                <p class="short-desc mb-0">Если вы хотите удалить свою активность на сайте Jodesta, вы
                                    можете удалить свою информацию, выполнив следующие действия:</p>
                                <div class="ps-4 pb-1">1. Перейдите в раздел Facebook Account's Setting & Privacy (Настройки
                                    и конфиденциальность учетной записи Facebook). Нажмите Settings (Настройки).</div>
                                <div class="ps-4 pb-1">2. Найдите Apps and Websites (Приложения и веб-сайты), и вы увидите
                                    все приложения и веб-сайты, которые вы связали со своей учетной записью Facebook.</div>
                                <div class="ps-4 pb-1">3. В строке поиска выберите Jodesta.</div>
                                <div class="ps-4 pb-1">4. Прокрутите страницу и нажмите Remove (Удалить).</div>
                                <div class="ps-4 pb-1">5. Поздравляем, вы успешно удалили свою деятельность с нашего сайта.
                                </div>
                            @else
                                <p class="short-desc mb-0">Jodesta website uses the Facebook login. As per Facebook policy,
                                    we must provide Data Deletion Instructions URL.</p>
                                <p class="short-desc mb-0">If you want to delete your activities for Jodesta website, you
                                    can remove your information by following these steps:</p>
                                <div class="ps-4 pb-1">1. Go to your Facebook Account's Setting & Privacy. Click Settings.
                                </div>
                                <div class="ps-4 pb-1">2. Look for Apps and Websites and you will see all apps and websites
                                    you linked with your Facebook.</div>
                                <div class="ps-4 pb-1">3. Search and click Jodesta in the search bar.</div>
                                <div class="ps-4 pb-1">4. Scroll and click Remove.</div>
                                <div class="ps-4 pb-1">5. Congratulations, you have successfully removed your activity from
                                    our website.</div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
