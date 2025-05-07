@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('menu.aboutUs') }}</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            @if (app()->getLocale() == 'lt')
                                <p>
                                    Esame įmonė UAB „Madeiva“. Viešojo maitinimo veiklą vykdome daugiau nei 11 metų.
                                    Pagrindinė mūsų veikla – dienos pietūs vietoje arba išsinešimui arba prekyba internetu.
                                    Įmonės vizija ir siekis – sveikas, šviežias, skanus, natūralus ir subalansuotas maistas
                                    kiekvieną dieną.<br />
                                    Mūsų valgiaraštis įvairus, sudaromas atsižvelgiant į daržovių ir vaisių/uogų
                                    sezoniškumą. Patiekalus gaminame tik iš kokybiškų produktų, vadovaudamiesi tausojančiais
                                    gamybos būdais, todėl mūsų maisto gaminiai nepraranda maistinių medžiagų ir vitaminų.
                                    Didžiąją dalį žaliavų maisto gamybai tiekia Lietuvos specializuoti tiekėjai ir
                                    ūkininkai, turintys sertifikatus.<br />
                                    ​Gamindami stengiamės laikytis principo vartoti sumažintą druskos ir cukraus kiekį.
                                    Nevartojame dirbtinių sultinių, dažiklių, skonio stipriklių, konservantų ir kitų
                                    nesveikų priedų.<br />
                                    ​Maistą gaminame modernioje, naujai įrengtoje virtuvėje. Kasdieną siūlome keletą
                                    skirtingų karštųjų patiekalų, bent pora skirtingų karštų garnyrų (pvz. kuskusas ir
                                    kietagrūdžiai makaronai), platų daržovių ir salotų asortimentą bei vegetarišką
                                    patiekalą. Taip pat pietums verdama aromatinga ir tiršta sriuba. Na, o pasmaguriavimui
                                    po pietų, siūlome paskanauti mūsų naminių kepinių (kibinai, sviestiniai vafliai, naminės
                                    varškės spurgos, įvairių skonių „Tinginiai“).<br />
                                    <br />
                                    ​Maloniai kviečiame naudotis mūsų paslaugomis!<br />
                                    ​Kodėl mes?<br />
                                    ​Nes siekiame būti išskirtiniai ir užtikrinti išskirtinę kokybę mūsų Klientams!<br />
                                </p>
                            @elseif (app()->getLocale() == 'ru')
                                <p>
                                    Мы — компания UAB «Madeiva». Мы работаем в сфере общественного питания более 11 лет.
                                    Наша основная деятельность — ежедневные обеды на месте, а также продажа блюд на вынос
                                    или через интернет.
                                    Видение и амбиции компании — здоровая, свежая, вкусная, натуральная и сбалансированная
                                    пища.
                                    каждый день.<br />
                                    Наше меню разнообразно и зависит от наличия овощей и фруктов/ягод.
                                    сезонность. Мы готовим блюда только из качественных продуктов, следуя экологически
                                    чистым практикам.
                                    методы производства, благодаря которым наши продукты питания не теряют питательных
                                    веществ и витаминов.
                                    Большую часть сырья для производства продуктов питания поставляют литовские
                                    специализированные поставщики и
                                    фермеры с сертификатами.<br />
                                    При приготовлении пищи мы стараемся придерживаться принципа использования минимального
                                    количества соли и сахара.
                                    Мы не используем искусственные бульоны, красители, усилители вкуса, консерванты и другие
                                    добавки.
                                    вредные добавки.<br />
                                    Мы готовим еду на современной, недавно оборудованной кухне. Мы предлагаем несколько
                                    каждый день
                                    разные горячие блюда, как минимум несколько разных горячих гарниров (например, кускус и
                                    макароны из цельной муки), широкий ассортимент овощей и салатов, а также вегетарианское
                                    меню
                                    блюдо. На обед также готовят ароматный и густой суп. Ну, ради развлечения.
                                    Днем мы предлагаем вам попробовать нашу домашнюю выпечку (кибинай, вафли с маслом,
                                    домашние
                                    творожные пончики, разные вкусы "Ленивые").<br />
                                    <br />
                                    Приглашаем Вас воспользоваться нашими услугами!<br />
                                    Почему мы?<br />
                                    Потому что мы стремимся быть исключительными и гарантировать исключительное качество для
                                    наших клиентов!<br />
                                </p>
                            @else
                                <p>

                                    2,265 / 5,000
                                    We are a company UAB "Madeiva". We have been operating in the catering industry for more
                                    than 11 years.
                                    Our main activity is daily lunch on site or for takeaway or online shopping.
                                    The company's vision and aspiration is healthy, fresh, tasty, natural and balanced food
                                    every day.<br />
                                    Our menu is varied, created taking into account the seasonality of vegetables and
                                    fruits/berries
                                    . We prepare dishes only from high-quality products, following sustainable
                                    production methods, so our food products do not lose nutrients and vitamins.
                                    The majority of raw materials for food production are supplied by Lithuanian specialized
                                    suppliers and
                                    farmers with certificates.<br />
                                    ​When cooking, we try to adhere to the principle of using reduced amounts of salt and
                                    sugar.
                                    We do not use artificial broths, dyes, flavor enhancers, preservatives and other
                                    unhealthy additives.<br />
                                    ​We prepare food in a modern, newly equipped kitchen. Every day we offer several
                                    different hot dishes, at least a couple of different hot side dishes (e.g. couscous and
                                    durum pasta), a wide range of vegetables and salads and a vegetarian
                                    dish. We also cook aromatic and thick soup for lunch. And for a snack
                                    in the afternoon, we offer to taste our homemade pastries (kibinai, butter waffles,
                                    homemade
                                    curd donuts, various flavors of "Tinginiai").<br />
                                    <br />
                                    ​We kindly invite you to use our services!<br />
                                    ​Why us?<br />
                                    ​Because we strive to be exceptional and ensure exceptional quality for our
                                    Customers!<br />
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
