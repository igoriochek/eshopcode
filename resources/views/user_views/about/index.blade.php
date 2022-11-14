@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("userproducts") ,'title' => __('menu.aboutUs')])
    <div class="container">
        <div class="product-section p-4 mb-4" style="line-height: 35px; font-size: 1.1rem">
            <h2 style="font-family: 'Times New Roman', sans-serif; font-weight: 500" class="mb-4 mt-3">
                {{ __('menu.aboutUs') }}
            </h2>
            <div class="d-flex pb-5">
                @if ($lang === 'lt')
                    <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="500" />
                @else
                    <img src="{{ asset('images/es_projektai_en_ru.jpeg') }}" alt="es_projektai_en_ru" width="500" class="my-3" />
                @endif
            </div>
            @if ($lang == 'lt')
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB „Opatrip.com“ įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr.
                    13.1.1-LVPA-K-860-01-0726 „E. komercijos modelio diegimas MB „Opatrip.com““. Bendra
                    projekto vertė – <b>62 330,00</b> Eur, iš kurių <b>46 747,50</b> Eur sudaro Europos regioninės plėtros fondo
                    lėšos.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų
                    investicijų veiksmų programos 13 prioriteto „Veiksmų, skirtų COVID-19 pandemijos sukeltai
                    krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam
                    ekonomikos atsigavimui“ Nr. 13.1.1-LVPA-K-860 „E. komercijos modelis COVID-19“.
                    Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip
                    Europos Sąjungos atsako į COVID-19 pandemiją priemonė.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB “Opatrip.com” – nuo 2005 m. teikia pramogų turizmo paslaugas - organizuoja
                    temines ir pažintines ekskursijas, degustacijas, baidarių ir pelkių žygius, komandos formavimo ir
                    orientacinius žaidimus tiek vietiniams turistams, tiek atvykstantiems iš užsienio šalių.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Įmonė siekia teikti aukščiausios kokybės paslaugas, bei pasiūlyti sprendimus apimančius
                    įvairaus dydžio projektus. Vienos labiausiai besiplečiančių įmonės paslaugų - tai teminių
                    kelionių organizavimas pagal klientų poreikius tiek Lietuvoje, tiek užsienyje, teminių ekskursijų
                    orgnizavimas su vietiniais gidais.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Iki šiol įmonė pardavinėjant savo paslaugas naudoja web svetainę, bet ji netenkina
                    Pareiškėjo ir neatitinka naujausių technologijų reikalavimų bei klientų poreikių, nes naudojama
                    sena platforma, nėra daug reikalingų modulių ir funkcijų. Tokiu būdu ribojamas potencialių
                    klientų ratas ir įmonės pajamų augimas.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos
                    aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti pardavimo procesus diegdama
                    naują inovatyvų e.komercijos sprendimą ir pardavinėti savo produktus per jį.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma,
                    panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes
                    inovatyviam produktų pardavimui.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo produktus, užtikrins
                    greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis
                    aptarnauti daugiau klientų, tai užtikrins įmonės pajamų augimą.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Projekto įgyvendinimo laikotarpis nuo 2022 m. vasario mėn. iki 2023 m. vasario mėn.
                </p>
            @elseif ($lang == 'ru')
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB "Opatrip.com" реализует проект №.
                    13.1.1-ЛВПА-К-860-01-0726 "Э. внедрение коммерческой модели MB "Opatrip.com". Общий
                    стоимость проекта составляет <b>62 330,00</b> евро, из которых <b>46 747,50</b> евро поступает из Европейского фонда регионального развития.
                    средства.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Поддержка реализации проекта оказана за счет средств Европейского Союза на 2014-2020 гг.
                    Программа инвестиционных действий приоритет 13 «Действия по причинам пандемии COVID-19
                    для преодоления кризиса, продвижения и подготовки к зеленому, цифровому и устойчивому
                    для восстановления экономики» №. 13.1.1-ЛВПА-К-860"Э. бизнес-модель для COVID-19».
                    Проект финансируется Европейским фондом регионального развития. Финансируется как
                    Реакция Европейского Союза на пандемию COVID-19.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB "Opatrip.com" - с 2005 г. оказывает услуги развлекательного туризма - организует
                    тематические и познавательные туры, дегустации, сплавы на байдарках и болотах, тимбилдинги и
                    ориентировочные игры как для местных туристов, так и для гостей из зарубежных стран.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Компания стремится предоставлять услуги высочайшего качества и предлагать комплексные решения
                    проекты разного масштаба. Одной из наиболее расширяющихся услуг компании являются тематические
                    организация поездок в соответствии с потребностями клиентов как в Литве, так и за рубежом, тематические экскурсии
                    организация с местными гидами.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    До сих пор компания использует веб-сайт для продажи своих услуг, но это неудовлетворительно.
                    Заявитель не соответствует последним технологическим требованиям и потребностям заказчика, поскольку используется
                    старая платформа, мало нужных модулей и фич. Таким образом, возможности ограничены
                    клиентская база и рост доходов компании.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Компания стремится повысить конкурентоспособность, привлечь больше клиентов и сделать их более эффективными.
                    обслуживать, чтобы больше расширить продажи, решили оцифровать процессы продаж, внедрив
                    новое инновационное решение для электронной коммерции и продавайте свои товары через него.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Этот проект является инновационным в том, что он создаст платформу электронной коммерции,
                    использование самых передовых информационных технологий, которые открывают новые возможности
                    для реализации инновационных продуктов.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Реализованный проект позволит компании более эффективно продавать свою продукцию, обеспечит
                    более быстрое и качественное обслуживание клиентов, сокращение времени продажи продукции позволит
                    обслуживать больше клиентов, это обеспечит рост доходов компании.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Срок реализации проекта – с 2022 года. февраль. до 2023 года февраль.
                </p>
            @else
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB "Opatrip.com" implements EU structural funds-financed project no.
                    13.1.1-LVPA-K-860-01-0726 "E. implementation of the commercial model MB "Opatrip.com". Common
                    the value of the project is <b>62,330.00</b> Eur, of which <b>46,747.50</b> Eur is from the European Regional Development Fund
                    funds.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Support for the implementation of the project was provided under the European Union funds for 2014-2020
                    investment action program priority 13 "Actions for the causes of the COVID-19 pandemic
                    to overcome the crisis, promoting and preparing for green, digital and sustainable
                    for economic recovery" no. 13.1.1-LVPA-K-860 "E. business model for COVID-19".
                    The project is financed by the European Regional Development Fund. Funded as
                    The European Union's response to the COVID-19 pandemic.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    MB "Opatrip.com" - since 2005 provides entertainment tourism services - organizes
                    thematic and educational tours, tastings, kayaking and swamp tours, team building and
                    orientation games for both local tourists and visitors from foreign countries.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    The company aims to provide the highest quality services and offer comprehensive solutions
                    projects of various sizes. One of the company's most expanding services is thematic
                    organization of trips according to customer needs both in Lithuania and abroad, themed excursions
                    organization with local guides.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Until now, the company uses a website to sell its services, but it is not satisfactory
                    The applicant does not meet the latest technological requirements and customer needs, because it is used
                    old platform, not many needed modules and features. In this way, the potential is limited
                    customer base and company revenue growth.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    The company aims to increase competitiveness, attract more customers and make them more efficient
                    to serve, to expand sales more, decided to digitize sales processes by implementing
                    a new innovative e-commerce solution and sell your products through it.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    This project is innovative in that it will create an e-commerce platform,
                    using the most advanced information technologies that provide new opportunities
                    for innovative product sales.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    The implemented project will allow the company to sell its products more effectively, it will ensure
                    faster and better customer service, shortened product sales time will allow
                    serve more customers, this will ensure the growth of the company's income.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    The project implementation period is from 2022. February. until 2023 February.
                </p>
            @endif
        </div>
    </div>
@endsection
