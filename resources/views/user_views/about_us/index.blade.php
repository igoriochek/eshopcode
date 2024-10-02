@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <section class="tp-shop-area pb-120">
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
                                @if (app()->getLocale() == 'lt')
                                    <p>Įmonė UAB "DTS Solutions" - tai informacinių technologijų konsultavimo, informacinių sistemų audito ir programinės įrangos kūrimo bendrovė, sėkmingai vykdanti veiklą rinkoje nuo 1997 metų.</p>
                                    <p>Mes nuolat investuojame tiek į darbuotojų IT kompetencijos ugdymą, tiek ir į atskirų verslo sričių kompetencijų tobulinimą, kad atitiktume rinkos keliamus reikalavimus mūsų kvalifikacijai. Tai įgalina mūsų specialistus tapti lygiaverčiais užsakovų verslo vystymo strateginiais partneriais.</p>
                                    <p>Bendrovėje įdiegta kokybės vadybos sistema, atitinkanti ISO 9001:2015 standarto reikalavimus. UAB "DTS Solutions" laikosi patvirtintos kokybės politikos ir siekia nuolat tobulinti veiklos procesus, užtikrindama aukščiausią paslaugų kokybę bei tvarią, aplinkai draugišką veiklą.</p>
                                @elseif (app()->getLocale() == "ru")
                                    <p>UAB "DTS Solutions" - компания, занимающаяся консалтингом в области информационных технологий, аудитом информационных систем и разработкой программного обеспечения, успешно работающая на рынке с 1997 года.</p>
                                    <p>Мы постоянно инвестируем в развитие ИТ-компетенций наших сотрудников, а также в совершенствование компетенций отдельных направлений бизнеса, чтобы соответствовать требованиям рынка к нашим квалификациям. Это позволяет нашим специалистам стать равноправными стратегическими партнерами в развитии бизнеса наших клиентов.</p>
                                    <p>В компании внедрена система менеджмента качества, соответствующая требованиям стандарта ISO 9001:2015. DTS Solutions UAB придерживается утвержденной политики в области качества и стремится постоянно совершенствовать свои бизнес-процессы, обеспечивая высочайшее качество услуг и устойчивое, экологически безопасное функционирование.</p>
                                @else
                                    <p>UAB "DTS Solutions" is an information technology consulting, information systems auditing and software development company that has been successfully operating in the market since 1997.</p>
                                    <p>We are constantly investing in the development of our employees' IT competences, as well as in the improvement of the competences of our individual business areas in order to meet the market's requirements for our qualifications. This enables our specialists to become equal strategic partners in the development of our customers' businesses.</p>
                                    <p>The company has implemented a quality management system that meets the requirements of ISO 9001:2015. DTS Solutions UAB adheres to the approved quality policy and strives to continuously improve its business processes, ensuring the highest quality of services and sustainable, environmentally friendly operations.</p>
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
