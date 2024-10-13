@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <div class="blog-area ptb-70">
        <div class="container">
            <div class="team-area pt-30 pb-30">
                <div class="container">
                    <div class="shop-top-shorting-area">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="shop-shorting-left-content">
                                    <ul>
                                        <li>
                                            <h4 class="mb-4">{{ __('menu.aboutUs') }}</h4>
                                            @if (app()->getLocale() == 'lt')
                                                <p>UAB "Consultus Magnus" - tai šiuolaikinė konsultacinė įmonė, Lietuvoje sėkmingai dirbanti nuo 1997 m. Įmonė ypatingą dėmesį teikia paslaugų kokybei bei individualiam požiūriui į kiekvieną klientą.</p>
                                                <p>Pagrindinės įmonės veiklos sritys yra šios: konsultacijos verslo finansavimo galimybių, paraiškų rengimo ES struktūriniams fondams, tarptautinėms ir nacionalinėms programoms srityse, galimybių studijų, investicinių projektų ir verslo planų rengimas, projektų valdymas, vadybos sistemų diegimas, konsultavimas, auditas ir mokymai, tarpininkavimas perkant / parduodant verslą bei pritraukiant investuotojus.</p>
                                            @elseif (app()->getLocale() == 'ru')
                                                <p>UAB "Consultus Magnus" - современная консалтинговая компания, успешно работающая в Литве с 1997 г. Компания уделяет особое внимание качеству своих услуг и индивидуальному подходу к каждому клиенту.</p>
                                                <p>Основными направлениями деятельности компании являются: консультирование в области возможностей финансирования бизнеса, подготовка заявок в структурные фонды ЕС, международные и национальные программы, подготовка технико-экономических обоснований, инвестиционных проектов и бизнес-планов, управление проектами, внедрение систем управления, консультирование, аудит и обучение, посредничество при покупке/продаже бизнеса и привлечении инвесторов.</p>
                                            @else
                                                <p>UAB "Consultus Magnus" is a modern consulting company that has been successfully operating in Lithuania since 1997.The company pays special attention to the quality of its services and an individual approach to each client.</p>
                                                <p>The main areas of the company's activity are: consulting in the areas of business financing opportunities, preparation of applications for EU structural funds, international and national programmes, preparation of feasibility studies, investment projects and business plans, project management, implementation of management systems, consultancy, auditing and training, mediation in buying/selling a business and attracting investors.</p>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
