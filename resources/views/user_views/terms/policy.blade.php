@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'policy',
    'secondPageName' => __('menu.policy'),
    'hasThirdPage' => false
])
    <div class="container py-10">

        @if($lang=="lt")

            <h3 class="mb-4">Privatumo politika</h3>

            <p>Privatumo politika (toliau – „Privatumo politika“ paaiškina, kaip UAB mdproject  (toliau – „Bendrovė“,) renka ir tvarko svetainės www.mdproject.lt (toliau – „Svetainė“) lankytojų informaciją, nurodo kokias teises svetainės lankytojai turi, bei kaip jas gali įgyvendinti. Siųsti užklausos formą lankytojai gali tik po to, kai susipažįsta su šia Privatumo politika ir tai patvirtina. Mes rekomenduojame atidžiai perskaityti šią Privatumo politiką prieš tai, kai registruojate užklausą Svetainėje.
                Bendrovė yra įsipareigojusi savo veikloje atsakingai ir saugiai tvarkyti Jūsų asmens duomenis. Vadovaudamiesi, šiais esminiais principais, mes visada sieksime užtikrinti pakankamą Jūsų duomenų apsaugos lygį bei Jūsų teisių apsaugą. Mes tvarkome Asmens duomenis, pagal šią Privatumo politiką, vadovaudamiesi taikomais teisės aktais, įskaitant Bendrąjį duomenų apsaugos reglamentą (2016/679) (toliau – „BDAR“) bei taikomus Lietuvos nacionalinius asmens duomenų apsaugos teisės aktus.

        @elseif ($lang == "ru")

            <h3 class="mb-4">Политика конфиденциальности</h3>

            <p>Чтобы лучше понять, что интересует наших пользователей, наш веб-сайт использует файлы cookie. Наш рекламный партнер AdRoll ремаркетингирует рекламу www.mdproject.lt на других веб-сайтах и сайтах социальных сетей. Рекламные файлы cookie используются только для того, чтобы узнать предпочтения наших пользователей. Личная информация, такая как имя, фамилия, адрес электронной почты и номер телефона, не собирается. Чтобы отказаться от рекламы AdRoll и их партнеров, посетите эту страницу: <a href="http://www.networkadvertising.org/choices/" class="fw-bold">http://www.networkadvertising.org/choices/</а>

        @else

            <h3 class="mb-4">Privacy Policy</h3>

            <p>In order to have a better understanding of what our users are interested in, our website uses cookies. Our advertising partner, AdRoll, remarkets the ads of www.mdproject.lt on other websites and social networking sites. Advertising cookies are only used for the purpose of knowing our users’ preferences. Personal information such as name, surname, e-mail address, and phone number is not collected. To opt-out of the advertising of AdRoll and their partners, visit this page: <a href="http://www.networkadvertising.org/choices/" class="fw-bold">http://www.networkadvertising.org/choices/</a>

        @endif

    </div>

@endsection
