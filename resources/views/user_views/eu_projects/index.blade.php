@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
    <div class="about-section pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="about-content">
                        <img src="{{ asset('images/finansuoja_ES.jpg') }}" alt="financed_by_the_EU" class="py-5 my-5 col-md-6 col-12">
                        <span class="text-heading fs-3">
                            @if (app()->getLocale() == 'lt')
                            UAB „LORD-UK“ įgyvendina projektą E. pardavimo sandorių sudarymo sprendimų 
                            diegimas ir vaizdinė konfigūracija UAB „LORD-UK“, kurio pagrindinis tikslas 
                            – įsidiegti e. pardavimo sandorių sudarymo sprendimus, produktų konfigūravimą 
                            bei vizualizaciją ir taip skaitmenizuoti pardavimų procesą, efektyviau pardavinėti 
                            savo produktus, užtikrinti greitesnį ir kokybiškesnį klientų aptarnavimą, 
                            sutrumpinti produktų pardavimo laiką bei aptarnauti daugiau klientų. Bendra 
                            projekto vertė 99 445,80 Eur, iš kurių 49 722,90 Eur skirta iš Europos regioninės 
                            plėtros fondo lėšų. 
                            <br><br>
                            Projekto įgyvendinimo laikotarpis 2024 m. birželio 25 d. – 2025 m. birželio 25 d.
                            <br><br>
                            @elseif (app()->getLocale() == 'ru')
                            ЗАО «LORD-UK» реализует проект „Внедрение и визуальная настройка решений для 
                            заключения сделок электронной продажи ЗАО «LORD-UK»“, основной целью которого 
                            является внедрение эл. решения для заключения сделок купли-продажи, конфигурации 
                            и визуализации продуктов и, таким образом, оцифровывают процесс продаж, продают 
                            вашу продукцию более эффективно, обеспечивают более быстрое и качественное 
                            обслуживание клиентов, сокращают время продажи продукции и обслуживают больше 
                            клиентов. Общая стоимость проекта составляет 99 445,80 евро, из которых 49 722,90 
                            евро выделены из средств Европейского фонда регионального развития.
                            <br><br>
                            Срок реализации проекта – 2024 год. 25 июня - в 2025 году 25 июня
                            <br><br>
                            @else
                            UAB "LORD-UK" implements the project „Implementation and visual configuration 
                            of solutions for conclusion of e-sales transactions UAB "LORD-UK“, the main 
                            goal of which is to implement e. solutions for conclusion of sales transactions, 
                            product configuration and visualization and thus digitize the sales process, 
                            sell your products more efficiently, ensure faster and better customer service, 
                            shorten product sales time and serve more customers. The total value of the 
                            project is EUR 99,445.80, of which EUR 49,722.90 is allocated from the funds 
                            of the European Regional Development Fund.
                            <br><br>
                            The project implementation period is 2024. June 25 - in 2025 June 25.
                            <br><br>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
