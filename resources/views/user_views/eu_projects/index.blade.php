@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-6 col-12 mb-24">
                    <div class="bb-about-img">
                        <img src="{{ asset('images/finansuoja_ES.jpg') }}" alt="financed_by_the_EU">
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('menu.euProjects') }}</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            @if (app()->getLocale() == 'lt')
                                <p>
                                    UAB "Madeiva", igyvendina projekta <strong>E. pardavimo sandoriu sudarymo sprendimu
                                        diegimas ir
                                        vaizdine konfiguracija UAB "Madeiva" </strong> Nr. 02-033-K-0122. Bendra projekto
                                    verte
                                    - <strong>99 445,80</strong> Eur, iö kuriu <strong>49 722,90</strong> Eur sudaro Europos
                                    regionines pletros fondo leöos.
                                    <br /><br />Projektas igyvendinamas pagal Sutartyje, pletros programos paûangos
                                    priemones Nr.
                                    05-001-01-05-05 "Skatinti imones skaitmenizuotis" veiklos "Skatinti labai maûu, maûu ir
                                    vidutiniu imoniu skaitmeninima, finansuojant e. pardavimo sandoriu sudarymo sprendimu
                                    diegima, paslaugu ir produktu konfiguravima ir vizualizacija" poveikles "Skatinti labai
                                    maûu, maûu ir vidutiniu imoniu skaitmeninima, finansuojant e. pardavimo sandoriu
                                    sudarymo sprendimu diegima, paslaugu ir produktu konfiguravima ir vizualizacija"
                                    (Sostines regionas) ir poveikles "Skatinti labai maûu, maûu ir vidutiniu imoniu
                                    skaitmeninima, finansuojant e. pardavimo sandoriu sudarymo sprendimu diegima, paslaugu
                                    ir produktu konfiguravima ir vizualizacija" (Vidurio ir vakaru Lietuvos regionas)
                                    projektu finansavimo salygu apraöe, patvirtintame Lietuvos Respublikos ekonomikos ir
                                    inovaciju ministro 2022 m. liepos 15 d. isakymu Nr. 4-877 "Del 2022-2030 metu pletros
                                    programos valdytojos Lietuvos respublikos ekonomikos ir inovaciju ministerijos
                                    ekonomikos transformacijos ir konkurencingumo pletros programos paûangos priemones Nr.
                                    05-001-01-05-05 "Skatinti imones skaitmenizuotis" apraöo patvirtinimo", Projektu
                                    administravimo ir finansavimo taisyklese patvirtintose Lietuvos Respublikos finansu
                                    ministro 2022 m. birûelio 22 d. isakymu Nr. 1K-237 "Del 2021-2027 metu Europos Sajungos
                                    fondu investiciju programos ir Ekonomikos gaivinimo ir atsparumo didinimo plano "Naujos
                                    kartos Lietuva" igyvendinimo", ir juose nurodytuose ES ir Lietuvos Respublikos teises
                                    aktuose nustatytas salygas ir tvarka.
                                    <br /><br />Projektu siekiama imone skaitmenizuotis, isidiegti e. pardavimo sandoriu
                                    sudarymo
                                    sprendimus, paslaugu ir produktu konfiguravima bei vizualizacija.
                                    <br /><br />UAB "Madeiva" - tai imone, dirbanti visuomeninio maitinimo srityje.
                                    Pagrindines
                                    veiklos
                                    kryptys restoranu ir pagaminto valgio teikimo, ivairiu maitinimo paslaugu (toliau -
                                    produktu) teikimo imone.
                                    <br /><br />Iki öiol imone savo produktus pardavinejo tik tiesioginiu budu, klientu
                                    aptarnavimo
                                    procesai, iskaitant produktu uûsakymu valdyma, nera skaitmenizuoti, todel dabartiniai
                                    sprendimai nesudaro galimybes darbuotojams teikti paslaugas efektyviai; neturedama
                                    galimybes valdyti verslo sandoriu el. budu (t. y. vykdyti produktu pirkimo ir pardavimo
                                    procesa internetu, iskaitant ir produktu paieökos, krepöelio (uûsakymo) suformavimo,
                                    mokejimo atlikimo bei uûsakymo ivykdymo ir valdymo funkcijas ir pan.), imone ribojo
                                    potencialiu klientu rata ir tuo paciu imones pajamu augima.
                                    <br /><br />Imone, siekdama padidinti konkurencinguma, pritraukti daugiau klientu ir
                                    efektyviau juos
                                    aptarnauti, labiau iöplesti pardavimus, nusprende isidiegti e. pardavimo sandoriu
                                    sprendimus ir vizualizacija ir pardavineti savo produktus naudojantis elektronines
                                    prekybos sprendimais.
                                    äis projektas inovatyvus tuo, kad bus kuriama e. pardavimo sandoriu sudarymo platforma,
                                    paremta paûangiausiomis informacinemis technologijomis, suteikiancias naujas galimybes
                                    inovatyviam produktu pardavimui.
                                    <br /><br />Igyvendintas projektas leis imonei persiorientuoti i produktu skaitmeninima,
                                    efektyviau
                                    pardavineti savo produktus, uûtikrins greitesni ir kokybiökesni klientu aptarnavima,
                                    sutrumpejes produktu pardavimo laikas leis aptarnauti daugiau klientu, tai uûtikrins
                                    didesni produktu prieinamuma ir imones pajamu augima.
                                    <br /><br />Projekto igyvendinimo laikotarpis 2024 m. birûelio 12 d. - 2025 m. birûelio
                                    12 d.
                                </p>
                                <p>Su projektu susijusios uûklausos gali buti adresuojamos
                                    <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                </p>
                            @elseif (app()->getLocale() == 'ru')
                                <p>
                                    UAB "Madeiva", реализует проект <strong>Э. по решению о заключении сделки купли-продажи
                                        установка и
                                        визуальная конфигурация UAB "Madeiva" </strong> № 02-033-K-0122. Проект в целом
                                    ценность
                                    - <strong>99 445,80</strong> евро, из которых <strong>49 722,90</strong> евро —
                                    европейская валюта
                                    средства фонда регионального развития.
                                    <br /><br />Проект реализуется в соответствии с Соглашением, ход выполнения программы
                                    освоения
                                    меры нет.
                                    05-001-01-05-05 «Поощрять компании к цифровизации» деятельность «Поощрять очень малые,
                                    малые и
                                    цифровизация средних предприятий путем финансирования эл. по решению о заключении сделки
                                    купли-продажи
                                    реализация, настройка и визуализация услуг и продуктов" действия "Поощрять очень
                                    цифровизация малых, средних и крупных предприятий путем финансирования эл. сделка
                                    купли-продажи
                                    внедрение решений по компиляции, настройке и визуализации услуг и продуктов"
                                    (Столичный регион) и подпрограмма «Содействие развитию микро-, малых и средних
                                    предприятий»
                                    цифровизация, финансирование эл. реализация решения по заключению сделки купли-продажи,
                                    услуги
                                    и конфигурация продукта и визуализация» (регион Центральной и Западной Литвы)
                                    Условия финансирования проекта в описании, утвержденном Министерством экономики и
                                    финансов Литовской Республики
                                    Министр инноваций 2022 15 июля Приказ № 4-877 «Дел будет расширен в 2022-2030 годах
                                    Программой управляет Министерство экономики и инноваций Литовской Республики.
                                    Меры по реализации Программы экономической трансформации и развития
                                    конкурентоспособности №
                                    05-001-01-05-05 «Поощрение компаний к цифровизации» утверждение описания, Проект
                                    в правилах администрирования и финансирования, утвержденных Министерством финансов
                                    Литовской Республики
                                    Министр в 2022 году 22 июня Приказ № 1К-237 «Дел 2021-2027 период Европейский Союз
                                    Программа инвестиций в Фонд и План экономического восстановления и устойчивости «Новый
                                    реализация «поколения Литва» и указанные в нем права ЕС и Литовской Республики
                                    условия и порядок, установленные в актах.
                                    <br /><br />Целью проекта является оцифровка компании, внедрение эл. сделка
                                    купли-продажи
                                    заключение
                                    конфигурация и визуализация решений, услуг и продуктов.
                                    <br /><br />UAB «Madeiva» — компания, работающая в сфере общественного питания.
                                    Основной
                                    деятельность
                                    направления в ресторан и предоставление готовых блюд, различных услуг общественного
                                    питания (далее -
                                    продукт) компанией, поставляющей продукт.
                                    <br /><br />До сих пор компания продавала свою продукцию только напрямую клиентам.
                                    услуга
                                    процессы, включая управление заказами на продукцию, не оцифрованы, поэтому текущий
                                    решения не позволяют сотрудникам эффективно предоставлять услуги; не имея
                                    возможности управлять бизнес-транзакциями в электронном виде (т.е. осуществлять
                                    куплю-продажу продукции
                                    онлайн-процесс, включая поиск товара, создание корзины (заказа),
                                    обработка платежей, выполнение заказов, функции управления и т.д.), общество с
                                    ограниченной ответственностью
                                    круг потенциальных клиентов и одновременно рост выручки компании.
                                    <br /><br />Компания, в целях повышения своей конкурентоспособности, привлечения
                                    большего количества клиентов и
                                    более эффективно их
                                    обслуживание, расширение продаж, решение о внедрении эл. сделка купли-продажи
                                    решения и визуализация и продавайте свою продукцию с помощью электронных
                                    торговые решения.
                                    Этот проект является инновационным, поскольку он создаст электронную систему. платформа
                                    для транзакций продаж,
                                    на основе самых передовых информационных технологий, предоставляющих новые возможности
                                    для продажи инновационной продукции.
                                    <br /><br />Реализованный проект позволит компании переориентироваться на цифровизацию
                                    продукции,
                                    более эффективно
                                    продавайте свою продукцию, обеспечьте более быстрое и качественное обслуживание
                                    клиентов,
                                    Более короткие сроки реализации продукции позволят нам обслуживать больше клиентов, что
                                    обеспечит
                                    большая доступность продукции и рост доходов компании.
                                    <br /><br />Срок реализации проекта 2024 г. 12 июня - 2025 г. июнь
                                    12-й.
                                    </р>
                                <p>По вопросам, связанным с проектом, можно обращаться по адресу
                                    <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                    </р>
                                @else
                                <p>
                                    UAB "Madeiva", implements the project <strong>E. sales transaction conclusion solution
                                        installation and
                                        visual configuration UAB "Madeiva" </strong> No. 02-033-K-0122. Total
                                    value of the project
                                    - <strong>99 445.80</strong> Eur, of which <strong>49 722.90</strong> Eur constitute the
                                    European
                                    Regional Development Fund funds.
                                    <br /><br />The project is implemented in accordance with the Agreement, the development
                                    program progress
                                    measures No.
                                    05-001-01-05-05 "Promote the digitalization of enterprises" activity "Promote the
                                    digitalization of very small, small and medium-sized enterprises by financing the
                                    implementation of e-sales solutions, configuration and visualization of services and
                                    products" sub-action "Promote the digitalization of very small, small and medium-sized
                                    enterprises by financing the implementation of e-sales solutions, configuration and
                                    visualization of services and products" (Capital Region) and sub-action "Promote the
                                    digitalization of very small, small and medium-sized enterprises by financing the
                                    implementation of e-sales solutions, configuration and visualization of services and
                                    products" (Central and Western Lithuania Region) in the description of the financing
                                    conditions for projects, approved by Order No. 15 of the Minister of Economy and
                                    Innovation of the Republic of Lithuania of July 15, 2022 4-877 "On approval of the
                                    description of the economic transformation and competitiveness development programme of
                                    the Ministry of Economy and Innovation of the Republic of Lithuania, the manager of the
                                    2022-2030 development programme, the measures No. 05-001-01-05-05 "Promoting
                                    digitalisation of enterprises", approved in the project administration and financing
                                    rules by Order No. 1K-237 of the Minister of Finance of the Republic of Lithuania of 22
                                    June 2022 "On the implementation of the European Union Funds Investment Programme and
                                    the Economic Recovery and Resilience Plan "New Generation Lithuania" for 2021-2027", and
                                    the conditions and procedure established in the legal acts of the EU and the Republic of
                                    Lithuania referred to therein.
                                    <br /><br />The project aims to digitize the company, implement e. sales transaction
                                    conclusion
                                    solutions, service and product configuration and visualization.
                                    <br /><br />UAB "Madeiva" is a company operating in the field of public catering.
                                    The main
                                    directions of activity
                                    are restaurant and prepared meal provision, and the provision of various catering
                                    services (hereinafter -
                                    products).
                                    <br /><br />Until now, the company has sold its products only directly, customer
                                    service processes, including product order management, have not been digitized,
                                    therefore, current
                                    solutions do not enable employees to provide services efficiently; it does not have the
                                    ability to manage business transactions electronically. way (i.e., carrying out the
                                    process of buying and selling products online, including product search, cart (order)
                                    formation, payment, order fulfillment and management functions, etc.), the company
                                    limited the circle of potential customers and, at the same time, the growth of the
                                    company's revenue.
                                    <br /><br />The company, in order to increase competitiveness, attract more customers
                                    and
                                    serve them more efficiently, and expand sales, decided to implement e-sales transaction
                                    solutions and visualization and sell its products using e-commerce solutions.
                                    This project is innovative in that an e-sales transaction platform will be created,
                                    based on the most advanced information technologies, providing new opportunities for
                                    innovative product sales.
                                    <br /><br />The implemented project will allow the company to reorient towards product
                                    digitalization,
                                    sell its products more efficiently, ensure faster and higher-quality customer service,
                                    shorten the product sales time and allow it to serve more customers, which will ensure
                                    greater product availability and growth in the company's revenue.
                                    <br /><br />Project implementation period June 12, 2024 - June
                                    12, 2025
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
