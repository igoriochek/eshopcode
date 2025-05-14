@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12 mb-24 d-flex justify-content-center">
                    <div class="bb-about-img col-lg-7 col-12">
                        <img src="{{ asset('images/finansuoja_ES.jpg') }}" alt="financed_by_the_EU">
                    </div>
                </div>
                <div class="col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('menu.euProjects') }}</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            @if (app()->getLocale() == 'lt')
                                <p>
                                    UAB „Madeiva“, įgyvendina projektą E. pardavimo sandorių sudarymo sprendimų diegimas ir
                                    vaizdinė konfigūracija UAB „Madeiva“ Nr. 02-033-K-0122. Bendra projekto vertė –
                                    99 445,80 Eur, iš kurių 49 722,90 Eur sudaro Europos regioninės plėtros fondo lėšos.
                                </p>
                                <p>
                                    Projektas įgyvendinamas pagal Sutartyje, plėtros programos pažangos priemonės Nr.
                                    05-001-01-05-05 „Skatinti įmones skaitmenizuotis“ veiklos „Skatinti labai mažų, mažų ir
                                    vidutinių įmonių skaitmeninimą, finansuojant e. pardavimo sandorių sudarymo sprendimų
                                    diegimą, paslaugų ir produktų konfigūravimą ir vizualizaciją“ poveiklės „Skatinti labai
                                    mažų, mažų ir vidutinių įmonių skaitmeninimą, finansuojant e. pardavimo sandorių
                                    sudarymo sprendimų diegimą, paslaugų ir produktų konfigūravimą ir vizualizaciją“
                                    (Sostinės regionas) ir poveiklės „Skatinti labai mažų, mažų ir vidutinių įmonių
                                    skaitmeninimą, finansuojant e. pardavimo sandorių sudarymo sprendimų diegimą, paslaugų
                                    ir produktų konfigūravimą ir vizualizaciją“ (Vidurio ir vakarų Lietuvos regionas)
                                    projektų finansavimo sąlygų apraše, patvirtintame Lietuvos Respublikos ekonomikos ir
                                    inovacijų ministro 2022 m. liepos 15 d. įsakymu Nr. 4-877 „Dėl 2022–2030 metų plėtros
                                    programos valdytojos Lietuvos respublikos ekonomikos ir inovacijų ministerijos
                                    ekonomikos transformacijos ir konkurencingumo plėtros programos pažangos priemonės Nr.
                                    05-001-01-05-05 „Skatinti įmones skaitmenizuotis“ aprašo patvirtinimo“, Projektų
                                    administravimo ir finansavimo taisyklėse patvirtintose Lietuvos Respublikos finansų
                                    ministro 2022 m. birželio 22 d. įsakymu Nr. 1K-237 „Dėl 2021–2027 metų Europos Sąjungos
                                    fondų investicijų programos ir Ekonomikos gaivinimo ir atsparumo didinimo plano „Naujos
                                    kartos Lietuva“ įgyvendinimo“, ir juose nurodytuose ES ir Lietuvos Respublikos teisės
                                    aktuose nustatytas sąlygas ir tvarką.
                                </p>
                                <p>
                                    Projektu siekiama įmonę skaitmenizuotis, įsidiegti e. pardavimo sandorių sudarymo
                                    sprendimus, paslaugų ir produktų konfigūravimą bei vizualizaciją.
                                </p>
                                <p>
                                    UAB „Madeiva“ – tai įmonė, dirbanti visuomeninio maitinimo srityje. Pagrindinės veiklos
                                    kryptys restoranų ir pagaminto valgio teikimo, įvairių maitinimo paslaugų (toliau –
                                    produktų) teikimo įmonė.
                                </p>
                                <p>
                                    Iki šiol įmonė savo produktus pardavinėjo tik tiesioginiu būdu, klientų aptarnavimo
                                    procesai, įskaitant produktų užsakymų valdymą, nėra skaitmenizuoti, todėl dabartiniai
                                    sprendimai nesudaro galimybės darbuotojams teikti paslaugas efektyviai; neturėdama
                                    galimybės valdyti verslo sandorių el. būdu (t. y. vykdyti produktų pirkimo ir pardavimo
                                    procesą internetu, įskaitant ir produktų paieškos, krepšelio (užsakymo) suformavimo,
                                    mokėjimo atlikimo bei užsakymo įvykdymo ir valdymo funkcijas ir pan.), įmonė ribojo
                                    potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.
                                </p>
                                <p>
                                    Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos
                                    aptarnauti, labiau išplėsti pardavimus, nusprendė įsidiegti e. pardavimo sandorių
                                    sprendimus ir vizualizaciją ir pardavinėti savo produktus naudojantis elektroninės
                                    prekybos sprendimais.
                                </p>
                                <p>
                                    Šis projektas inovatyvus tuo, kad bus kuriama e. pardavimo sandorių sudarymo platforma,
                                    paremta pažangiausiomis informacinėmis technologijomis, suteikiančias naujas galimybes
                                    inovatyviam produktų pardavimui.
                                </p>
                                <p>
                                    Įgyvendintas projektas leis įmonei persiorientuoti į produktų skaitmeninimą, efektyviau
                                    pardavinėti savo produktus, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą,
                                    sutrumpėjęs produktų pardavimo laikas leis aptarnauti daugiau klientų, tai užtikrins
                                    didesnį produktų prieinamumą ir įmonės pajamų augimą.
                                </p>
                                <p>
                                    Projekto įgyvendinimo laikotarpis 2024 m. birželio 12 d. – 2025 m. birželio 12 d.
                                </p>
                                <p>Su projektu susijusios uûklausos gali buti adresuojamos
                                    <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                </p>
                            @elseif (app()->getLocale() == 'ru')
                                <p>
                                    UAB "Madeiva" реализует проект "E. Внедрение решений по заключению сделок купли-продажи
                                    и
                                    визуальная конфигурация UAB "Madeiva" № 02-033-K-0122. Общая стоимость проекта –
                                    99 445,80 евро, из которых 49 722,90 евро из Европейского фонда регионального развития.
                                </p>
                                <p>
                                    Проект реализуется в соответствии с Соглашением, Мероприятием по реализации Программы
                                    развития №.
                                    05-001-01-05-05 "Поощрение предприятий к цифровизации" деятельность "Поощрение микро-,
                                    малых и
                                    Оцифровка средних предприятий путем финансирования решений по заключению электронных
                                    сделок купли-продажи
                                    внедрение, настройка и визуализация услуг и продуктов" подвиды деятельности "Продвигать
                                    высоко
                                    Оцифровка малых, средних и крупных предприятий путем финансирования сделок купли-продажи
                                    в электронной коммерции
                                    внедрение решений по компиляции, настройке и визуализации услуг и продуктов"
                                    (Столичный регион) и поддействия «Содействие развитию микро-, малых и средних
                                    предприятий»
                                    цифровизация путем финансирования электронной реализации решений по сделкам
                                    купли-продажи, услуг
                                    и конфигурация продукта и визуализация» (регион Центральной и Западной Литвы)
                                    в описании условий финансирования проекта, утвержденных Министерством экономики и
                                    финансов Литовской Республики
                                    Министр инноваций 2022 г. 15 июля приказом №. 4-877 «О разработке Программы развития на
                                    2022–2030 годы»
                                    Программой управляет Министерство экономики и инноваций Литовской Республики.
                                    Мера прогресса Программы экономической трансформации и развития конкурентоспособности №
                                    05-001-01-05-05 «Поощрение компаний к оцифровке» утверждения описания», Проект
                                    в правилах администрирования и финансирования, утвержденных Министерством финансов
                                    Литовской Республики
                                    Министр в 2022 году 22 июня приказом №. 1К-237 «О бюджете Европейского Союза на
                                    2021–2027 годы»
                                    Программа инвестиций в фонды и план экономического восстановления и устойчивости «Новый
                                    реализация «Нового поколения Литвы» и упомянутых в ней законов ЕС и Литовской Республики
                                    условия и порядок, установленные в актах.
                                </p>
                                <p>
                                    Целью проекта является цифровизация компании, внедрение решений по заключению
                                    электронных сделок купли-продажи, настройка и визуализация услуг и продуктов.
                                </p>
                                <p>
                                    UAB "Madeiva" - компания, работающая в сфере общественного питания. Основными
                                    направлениями деятельности являются предоставление ресторанов и готовых блюд, а
                                    также
                                    предоставление различных услуг общественного питания (далее - продукты).
                                </p>
                                <p>
                                    До сих пор компания продавала свою продукцию только напрямую, процессы обслуживания
                                    клиентов, включая управление заказами продуктов, не оцифрованы, поэтому текущие
                                    решения
                                    не позволяют сотрудникам эффективно оказывать услуги; не имея возможности управлять
                                    бизнес-транзакциями в электронном виде (т. е. осуществлять процесс покупки и продажи
                                    продуктов
                                    в режиме онлайн, включая поиск продуктов, формирование корзины (заказа), функции
                                    оплаты
                                    и выполнения и управления заказами и т. д.), компания ограничила
                                    круг потенциальных клиентов и одновременно рост доходов компании.
                                </p>
                                <p>
                                    Для повышения конкурентоспособности, привлечения большего количества клиентов и
                                    более
                                    эффективного их обслуживания, а также расширения продаж компания решила внедрить
                                    решения
                                    для электронных продаж и визуализацию транзакций и продавать свою продукцию с
                                    использованием решений электронной коммерции.
                                </p>
                                <p>
                                    Данный проект является инновационным в том смысле, что будет создана платформа
                                    электронных продаж транзакций,
                                    основанная на самых передовых информационных технологиях, предоставляющая новые
                                    возможности для
                                    инновационных продаж продукции.
                                </p>
                                <p>
                                    Реализованный проект позволит компании переориентироваться на цифровизацию
                                    продукции,
                                    продавать свою продукцию более эффективно,
                                    обеспечивать более быстрое и качественное обслуживание клиентов,
                                    сокращенное время продажи продукции позволит ей обслуживать больше клиентов, что
                                    обеспечит
                                    большую доступность продукции и рост доходов компании.
                                </p>
                                <p>
                                    Срок реализации проекта 12 июня 2024 г. - 12 июня 2025 г.
                                </p>
                                <p>По вопросам, связанным с проектом, можно обращаться по адресу
                                    <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                </p>
                            @else
                                <p>
                                    UAB „Madeiva“, implemented the implementation of E. sales transaction conclusion
                                    solutions and
                                    visual configuration UAB „Madeiva“ No. 02-033-K-0122. The total value of the project
                                    is
                                    99,445.80 Eur, of which 49,722.90 Eur are from the European Regional Development
                                    Fund.
                                </p>
                                <p>
                                    The project is implemented in accordance with the Agreement, the development program
                                    progress measure No.
                                    05-001-01-05-05 “Promote digitalization of enterprises” activity “Promote
                                    digitalization
                                    of micro, small and medium-sized enterprises by financing the implementation of
                                    e-sales
                                    solutions, configuration and visualization of services and products” sub-activity
                                    “Promote digitalization of micro, small and medium-sized enterprises by financing
                                    the
                                    implementation of e-sales solutions, configuration and visualization of services and
                                    products”
                                    (Capital Region) and sub-activity “Promote digitalization of micro, small and
                                    medium-sized enterprises by financing the implementation of e-sales solutions,
                                    configuration and visualization of services and products” (Central and Western
                                    Lithuania
                                    Region)
                                    in the description of project financing conditions, we approve the order of the
                                    Minister
                                    of Economy and Innovation of the Republic of Lithuania of 15 July 2022 No. 4-877 “On
                                    approval of the description of the economic transformation and competitiveness
                                    development programme progress measure No. 05-001-01-05-05 “Encouraging enterprises
                                    to
                                    digitise” of the Ministry of Economy and Innovation of the Republic of Lithuania,
                                    the
                                    manager of the 2022–2030 development programme”, in the Project Administration and
                                    Financing Rules approved by Order No. 1K-237 of the Minister of Finance of the
                                    Republic
                                    of Lithuania of 22 June 2022 “On the implementation of the European Union Funds
                                    Investment Programme for 2021–2027 and the Economic Recovery and Resilience Plan
                                    “New
                                    Generation Lithuania”, and in them the conditions and procedure established in the
                                    legal
                                    acts of the EU and the Republic of Lithuania were specified.
                                </p>
                                <p>
                                    The project aims to digitize the company, implement e. sales transaction conclusion
                                    solutions, service and product configuration and visualization.
                                </p>
                                <p>
                                    UAB "Madeiva" is a company operating in the field of public catering. The main areas
                                    of
                                    activity
                                    are the provision of restaurants and prepared meals, and the provision of various
                                    catering services (hereinafter -
                                    products).
                                </p>
                                <p>
                                    Until now, the company has sold its products only directly, customer service
                                    processes, including product order management, are not digitized, therefore, current
                                    solutions do not enable employees to provide services effectively; not having
                                    the ability to manage business transactions electronically (i.e. to carry out the
                                    process of buying and selling products
                                    online, including product search, basket (order) formation,
                                    payment and order fulfillment and management functions, etc.), the company limited
                                    the circle of potential customers and at the same time the growth of the company's
                                    income.
                                </p>
                                <p>
                                    In order to increase competitiveness, attract more customers and serve them more
                                    efficiently, and expand sales, the company decided to implement e-sales transaction
                                    solutions and visualization and sell its products using e-commerce solutions.
                                </p>
                                <p>
                                    This project is innovative in that an e-sales transaction platform will be created,
                                    based on the most advanced information technologies, providing new opportunities for
                                    innovative product sales.
                                </p>
                                <p>
                                    The implemented project will allow the company to reorient towards product
                                    digitalization,
                                    sell its products more efficiently,
                                    ensure faster and higher-quality customer service,
                                    shortened product sales time will allow it to serve more customers, which will
                                    ensure
                                    greater product availability and growth in the company's income.
                                </p>
                                <p>
                                    Project implementation period June 12, 2024 - June 12, 2025
                                </p>
                                <p>Inquiries related to the project can be addressed
                                    <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
