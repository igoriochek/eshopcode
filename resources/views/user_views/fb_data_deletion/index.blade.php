@extends('layouts.app')

@section('title', __('menu.fbDataDeletion'))

@section('content')
    <section class="our-story-section pt-60 pb-120">
        <div class="container">
            <div class="row">
                    <div class="col-12 mb-4">
                        @include('flash_messages')
                    </div>
                <div class="col-12">
                    <div class="tp-shop-main-wrapper">
                        <div class="tp-shop-items-wrapper tp-shop-item-primary">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                                    <div class="row">
                                        @if (config('app.locale') == 'lt')
                                            <p>Dts Solutions svetainėje naudojamas Facebook prisijungimas. Pagal Facebook politiką turime pateikti Duomenų ištrynimo instrukcijos URL adresą.</p>
                                            <p>Jei norite ištrinti savo veiklą Dts Solutions svetainėje, galite pašalinti savo informaciją atlikdami šiuos veiksmus:</p>
                                            <div class="ps-4 pb-1">1. Eikite į Facebook Account's Setting & Privacy (Facebook paskyros nustatymai ir privatumas). Spustelėkite Settings (Nustatymai).</div>
                                            <div class="ps-4 pb-1">2. Ieškokite Apps and Websites (Programėlės ir svetainės) ir pamatysite visas programėles ir svetaines, kurias susiejote su savo Facebook paskyra.</div>
                                            <div class="ps-4 pb-1">3. Ieškokite ir paieškos juostoje spustelėkite Dts Solutions.</div>
                                            <div class="ps-4 pb-1">4. Slinkite ir spustelėkite Remove (Pašalinti).</div>
                                            <div class="ps-4 pb-1">5. Sveikiname, jūs sėkmingai pašalinote savo veiklą mūsų svetainėje.</div>
                                        @elseif (config('app.locale') == 'ru')
                                            <p>На сайте Dts Solutions используется логин Facebook. Согласно политике Facebook, мы должны предоставить URL-адрес инструкции по удалению данных.</p>
                                            <p>Если вы хотите удалить свою активность на сайте Dts Solutions, вы можете удалить свою информацию, выполнив следующие действия:</p>
                                            <div class="ps-4 pb-1">1. Перейдите в раздел Facebook Account's Setting & Privacy  (Настройки и конфиденциальность учетной записи Facebook). Нажмите Settings (Настройки).</div>
                                            <div class="ps-4 pb-1">2. Найдите Apps and Websites (Приложения и веб-сайты), и вы увидите все приложения и веб-сайты, которые вы связали со своей учетной записью Facebook.</div>
                                            <div class="ps-4 pb-1">3. В строке поиска выберите Dts Solutions.</div>
                                            <div class="ps-4 pb-1">4. Прокрутите страницу и нажмите Remove (Удалить).</div>
                                            <div class="ps-4 pb-1">5. Поздравляем, вы успешно удалили свою деятельность с нашего сайта.</div>
                                        @else
                                            <p>Dts Solutions website uses the Facebook login. As per Facebook policy, we must provide Data Deletion Instructions URL.</p>
                                            <p>If you want to delete your activities for Dts Solutions website, you can remove your information by following these steps:</p>
                                            <div class="ps-4 pb-1">1. Go to your Facebook Account's Setting & Privacy. Click Settings.</div>
                                            <div class="ps-4 pb-1">2. Look for Apps and Websites and you will see all apps and websites you linked with your Facebook.</div>
                                            <div class="ps-4 pb-1">3. Search and click Dts Solutions in the search bar.</div>
                                            <div class="ps-4 pb-1">4. Scroll and click Remove.</div>
                                            <div class="ps-4 pb-1">5. Congratulations, you have successfully removed your activity from our website.</div>
                                        @endif
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
@endsection
