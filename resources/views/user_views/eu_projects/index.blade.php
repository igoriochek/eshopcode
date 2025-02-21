@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
<section class="about_section mt-0 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure>
                    <div class="about_thumb">
                        <img src="{{ asset('images/finansuoja_ES.jpg') }}" alt="financed_by_the_EU">
                    </div>
                    <figcaption class="about_content">
                        <h1>{{ __('menu.euProjects') }}</h1>
                        @if (app()->getLocale() == 'lt')
                        <p>
                            UAB „LORD-UK“ įgyvendina projektą E. pardavimo sandorių sudarymo sprendimų
                            diegimas ir vaizdinė konfigūracija UAB „LORD-UK“, kurio pagrindinis tikslas
                            – įsidiegti e. pardavimo sandorių sudarymo sprendimus, produktų konfigūravimą
                            bei vizualizaciją ir taip skaitmenizuoti pardavimų procesą, efektyviau pardavinėti
                            savo produktus, užtikrinti greitesnį ir kokybiškesnį klientų aptarnavimą,
                            sutrumpinti produktų pardavimo laiką bei aptarnauti daugiau klientų. Bendra
                            projekto vertė 99 445,80 Eur, iš kurių 49 722,90 Eur skirta iš Europos regioninės
                            plėtros fondo lėšų.
                        </p>
                        <p>
                            Projekto įgyvendinimo laikotarpis 2024 m. birželio 25 d. – 2025 m. birželio 25 d.
                        </p>
                        @elseif (app()->getLocale() == 'ru')
                        <p>
                            ЗАО «LORD-UK» реализует проект „Внедрение и визуальная настройка решений для
                            заключения сделок электронной продажи ЗАО «LORD-UK»“, основной целью которого
                            является внедрение эл. решения для заключения сделок купли-продажи, конфигурации
                            и визуализации продуктов и, таким образом, оцифровывают процесс продаж, продают
                            вашу продукцию более эффективно, обеспечивают более быстрое и качественное
                            обслуживание клиентов, сокращают время продажи продукции и обслуживают больше
                            клиентов. Общая стоимость проекта составляет 99 445,80 евро, из которых 49 722,90
                            евро выделены из средств Европейского фонда регионального развития.
                        </p>
                        <p>
                            Срок реализации проекта – 2024 год. 25 июня - в 2025 году 25 июня
                        </p>
                        @else
                        <p>
                            UAB "LORD-UK" implements the project „Implementation and visual configuration
                            of solutions for conclusion of e-sales transactions UAB "LORD-UK“, the main
                            goal of which is to implement e. solutions for conclusion of sales transactions,
                            product configuration and visualization and thus digitize the sales process,
                            sell your products more efficiently, ensure faster and better customer service,
                            shorten product sales time and serve more customers. The total value of the
                            project is EUR 99,445.80, of which EUR 49,722.90 is allocated from the funds
                            of the European Regional Development Fund.
                        </p>
                        <p>
                            The project implementation period is 2024. June 25 - in 2025 June 25.
                        </p>
                        @endif
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
@endsection