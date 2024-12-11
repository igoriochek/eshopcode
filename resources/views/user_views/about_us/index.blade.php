@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <div class="about-section pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="about-content">
                        <span class="text-heading fs-3">
                            @if (app()->getLocale() == 'lt')
                                Mūsų įmonės sukurta unikali platforma suteikia vartotojams galimybę savarankiškai 
                                susikonfiguruoti paspirtukus iš įvairių atsarginių dalių. Siekiame supaprastinti 
                                surinkimo procesą ir padaryti jį kuo patogesnį savo klientams, pateikdami 
                                novatoriškus įrankius vizualinei konfigūracijai ir komponentų pasirinkimui internetu.
                                <br><br>
                                Pagrindinis mūsų platformos funkcionalumas yra tas, kad vartotojai gali vizualiai 
                                pasirinkti ir derinti įvairias paspirtuko dalis tiesiai svetainėje. Tai leidžia 
                                jiems peržiūrėti, kaip atrodys jų unikali transporto priemonė prieš pirkdami dalis. 
                                Toks požiūris taupo ne tik laiką, bet ir pinigus, todėl nereikia ilgai ieškoti 
                                atsarginių dalių realiose parduotuvėse ir sumažinama dalių nesuderinamumo rizika.
                                <br><br>
                                Siūlome platų komponentų asortimentą: rėmai, ratai, vairas, šakės, platformos ir 
                                kiti svarbūs paspirtukų komponentai. Klientai gali rinktis pirmaujančių gamintojų 
                                atsargines dalis, kurios garantuoja aukštą jų būsimo paspirtuko kokybę ir patikimumą. 
                                Mūsų platforma leidžia jums lanksčiai pritaikyti savo paspirtuko išvaizdą ir veikimą, 
                                kad jis atitiktų jūsų individualius pageidavimus, nesvarbu, ar tai būtų atliekami 
                                triukai riedlenčių parke, ar laisvo stiliaus mieste.
                                <br><br>
                                Be to, atlikę virtualų surinkimą, klientai gali gauti išsamią informaciją apie kiekvieną 
                                pasirinktą detalę, jos charakteristikas ir suderinamumą su kitais elementais. Tai 
                                padeda išvengti surinkimo klaidų ir suteikia pasitikėjimo, kad visi komponentai veiks 
                                kartu be problemų.
                                <br><br>
                                Taip pat siūlome pasirinktų atsarginių dalių pristatymo ir gatavo paspirtuko surinkimo 
                                paslaugas pagal kliento pageidavimą. Mūsų specialistai pagal užsakymą gali surinkti 
                                paspirtuką, kuris užtikrina, kad jis bus tinkamai sumontuotas ir paruoštas atlikti 
                                triukus. Stengiamės teikti aukšto lygio paslaugas ir individualų požiūrį, siūlydami 
                                savo vartotojams unikalią patirtį kuriant savo kaskadininkų paspirtuką internete.
                                <br><br>
                            @elseif (app()->getLocale() == 'ru')
                                Наша компания создает уникальную платформу, которая предоставляет пользователям 
                                возможность самостоятельно составлять трюковые самокаты из различных запчастей. Мы 
                                стремимся упростить процесс сборки и сделать его максимально удобным для наших клиентов, 
                                предоставляя инновационные инструменты для визуальной настройки и выбора компонентов онлайн.
                                <br><br>
                                Основной функционал нашей платформы заключается в том, что пользователи могут визуально 
                                подбирать и комбинировать различные запчасти для самоката непосредственно на сайте. Это 
                                позволяет им предварительно увидеть, как будет выглядеть их уникальное транспортное 
                                средство, до того, как они приобретут детали. Такой подход экономит не только время, 
                                но и деньги, исключая необходимость долгого поиска запчастей в реальных магазинах и 
                                минимизируя риск несовместимости деталей. 
                                <br><br>
                                Мы предлагаем широкий ассортимент компонентов: рамы, колеса, рули, вилки, платформы и 
                                другие важные узлы для трюковых самокатов. Клиенты могут выбирать запчасти от ведущих 
                                производителей, что гарантирует высокое качество и надежность их будущего самоката. 
                                Наша платформа позволяет гибко настраивать внешний вид и характеристики самоката в 
                                соответствии с индивидуальными предпочтениями, будь то для выполнения трюков в скейтпарке 
                                или для городского фристайла.
                                <br><br>
                                Кроме того, после завершения виртуальной сборки, клиенты могут получить подробную 
                                информацию о каждой выбранной запчасти, её характеристиках и совместимости с другими 
                                элементами. Это помогает избежать ошибок при сборке и предоставляет уверенность в том, 
                                что все компоненты будут работать вместе без проблем.
                                <br><br>
                                Также мы предлагаем услуги доставки выбранных запчастей и сборки готового самоката по 
                                желанию клиента. Наши специалисты могут собрать самокат на заказ, что гарантирует его 
                                правильную настройку и готовность к выполнению трюков. Мы стремимся обеспечить высокий 
                                уровень сервиса и индивидуальный подход, предлагая нашим пользователям уникальный опыт 
                                создания собственного трюкового самоката онлайн.
                                <br><br>
                            @else
                                The unique platform created by our company gives users the opportunity to independently 
                                configure scooters from various spare parts. We aim to simplify the assembly process and 
                                make it as convenient as possible for our customers by providing innovative tools for 
                                visual configuration and component selection online.
                                <br><br>
                                The main functionality of our platform is that users can visually select and combine 
                                different parts of the scooter directly on the website. This allows them to preview what 
                                their unique vehicle will look like before purchasing parts. Such an approach saves not 
                                only time, but also money, so there is no need to search for spare parts in real stores 
                                for a long time, and the risk of incompatibility of parts is reduced.
                                <br><br>
                                We offer a wide range of components: frames, wheels, handlebars, forks, platforms and 
                                other important scooter components. Customers can choose spare parts from leading 
                                manufacturers that guarantee high quality and reliability of their future scooter. Our 
                                platform gives you the flexibility to customize the look and feel of your scooter to 
                                suit your individual preferences, whether it's doing tricks at the skate park or 
                                freestyle around town.
                                <br><br>
                                In addition, after performing a virtual assembly, customers can receive detailed 
                                information about each part selected, its characteristics and compatibility with 
                                other elements. This helps prevent assembly errors and gives you confidence that 
                                all the components will work together without problems.
                                <br><br>
                                We also offer delivery of selected spare parts and assembly of the finished scooter 
                                according to the customer's request. Our experts can custom assemble your scooter 
                                to ensure it is properly assembled and ready to perform tricks. We strive to provide 
                                a high level of service and a personalized approach, offering our users a unique 
                                experience of building their own stunt scooter online.
                                <br><br>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
