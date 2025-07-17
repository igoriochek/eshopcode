@extends('layouts.app')

@section('title', __('menu.policy'))

@section('content')
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('menu.policy') }}</h2>
                            </div>
                        </div>
                        <div class="bb-faq-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="accordion" id="accordionExample">
                                @if (app()->getLocale() == 'lt')
                                    <p>
                                        Privatumo politika (toliau – "Privatumo politika") paaiškina, kaip UAB "Madeiva"
                                        (toliau – "Bendrovė") renka ir tvarko svetainės https://madeiva.shop/ (toliau –
                                        "Svetainė") lankytojų informaciją, nurodo kokias teises Svetainės lankytojai turi
                                        bei kaip jas gali įgyvendinti. Prieš registruojantis Svetainėje rekomenduojame
                                        atidžiai perskaityti šią Privatumo politiką.
                                    </p>
                                    <p class="mb-2">
                                        Bendrovė yra įsipareigojusi savo veikloje atsakingai ir saugiai tvarkyti Jūsų asmens
                                        duomenis. Vadovaudamiesi, šiais esminiais principais, mes visada sieksime užtikrinti
                                        pakankamą Jūsų duomenų apsaugos lygį bei Jūsų teisių apsaugą. Mes tvarkome Asmens
                                        duomenis, pagal šią Privatumo politiką, vadovaudamiesi taikomais teisės aktais,
                                        įskaitant Bendrąjį duomenų apsaugos reglamentą (2016/679) (toliau – "BDAR") bei
                                        taikomus Lietuvos nacionalinius asmens duomenų apsaugos teisės aktus.
                                    </p>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Duomenų valdytojas
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                UAB "Madeiva"<br />
                                                Įmonės kodas: 303342108<br />
                                                Adresas: J. Jasinskio g. 10, Vilnius<br />
                                                Tel. Nr. +37064777121<br />
                                                El. pašto adresas: grasale.kavine@gmail.com<br />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Kokią informaciją renkame, naudojame ir saugojame apie Jus?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Informacija, kurią pateikia pats Svetainės lankytojas, pildydamas
                                                registracijos formą mūsų Svetainėje:
                                                <div class="ps-4 pb-1">1. Vardas</div>
                                                <div class="ps-4 pb-1">2. Adresas</div>
                                                <div class="ps-4 pb-1">3. El. paštas</div>
                                                <div class="ps-4 pb-1">4. Telefono numeris</div>
                                                Informacija reikalinga paslaugos suteikimui (BDAR 6 straipsnio 1 dalies b
                                                punktas).
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Ar naudojame slapukus?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Taip, mūsų Svetainėje yra naudojami slapukai.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Kokią informaciją turėtumėte mums pateikti?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Pildydami registracijos formą mūsų Svetainėje turėtumėte mums pateikti
                                                duomenis, prašomus registracijos formoje.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                Koks yra teisinis informacijos rinkimo pagrindas?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Mes renkame informaciją apie Jus teisėtai, nes:
                                                <div class="ps-4 pb-1">1. Jūsų informacija yra reikalinga sutarčiai su Jumis
                                                    sudaryti ir vykdyti;</div>
                                                <div class="ps-4 pb-1">2. Mes turime teisėtą interesą stebėti Svetainės
                                                    lankomumo statistiką.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                Ar teikiame jūsų informaciją kitiems subjektams (tvarkytojams)?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Bendrovė tvarkomų Asmens duomenų neteikia tretiesiems asmenims be
                                                išankstinio asmens (duomenų subjekto) sutikimo, išskyrus teisės aktų
                                                nustatyta tvarka.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                Jūsų duomenų tvarkymo principai
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Mes siekiame, kad Asmens duomenys būtų tvarkomi tiksliai, sąžiningai ir
                                                teisėtai, kad jie būtų tvarkomi tik tokiais tikslais, kuriais renkami,
                                                laikantis teisės aktuose nustatytų aiškių ir skaidrių asmens duomenų
                                                tvarkymo principų ir reikalavimų.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                aria-expanded="false" aria-controls="collapseEight">
                                                Kiek laiko saugome informaciją apie jus?
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse"
                                            aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Mes Jūsų informaciją apie registraciją Svetainėje saugome iki sutikimo
                                                atšaukimo. Informaciją apie Jūsų atliktus pirkimus saugome vadovaudamiesi
                                                Bendrųjų dokumentų saugojimo terminų rodykle.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                aria-expanded="false" aria-controls="collapseNine">
                                                Kokios duomenų subjekto teisės?
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse"
                                            aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Jūs turite teisę susipažinti su savo asmens duomenimis ir kaip jie yra
                                                tvarkomi, reikalauti ištaisyti, papildyti ar sunaikinti pateiktus asmens
                                                duomenis, taip pat sustabdyti jų tvarkymo veiksmus (atšaukti savo sutikimą).
                                                Taip pat turite teisę reikalauti, kad asmens duomenų valdytojas apribotų
                                                asmens duomenų tvarkymą, teisę į duomenų perkėlimą, pateikti skundą
                                                Valstybinei duomenų apsaugos inspekcijai (kontaktiniai duomenys pateikti
                                                interneto svetainėje www.ada.lt) ir nesutikti su pateiktų asmens duomenų
                                                tvarkymu. Jei norite gauti išsamią informaciją apie šių teisių įgyvendinimo
                                                tvarką, pateikite užklausą Svetainėje nurodytu el. pašto adresu. Su
                                                išsamesne informacija apie asmens duomenų tvarkymą ir saugumą galite
                                                susipažinti atvykę pas mus.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                aria-expanded="false" aria-controls="collapseTen">
                                                Mūsų atsakingo asmens kontaktai
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse"
                                            aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Mes esame įsipareigoję užtikrinti Jūsų asmens duomenų apsaugą ir suteikti
                                                visą būtiną informaciją. Jeigu turite klausimų ar pastebėjimų dėl Jūsų
                                                asmens duomenų tvarkymo, prašome susisiekti su mumis Svetainėje nurodytu el.
                                                p. adresu.<br />
                                                Ši Privatumo politika galioja nuo jos paskelbimo Svetainėje dienos.
                                                Privatumo politika nėra laikoma Bendrovės ir Jūsų susitarimu dėl Asmens
                                                duomenų tvarkymo. Šia Privatumo politika Bendrovė Jus informuoja apie Jūsų
                                                asmens duomenų tvarkymo principus Bendrovėje. Mes galime bet kada pakeisti
                                                Privatumo politiką. Privatumo politikos pakeitimai ir (ar) papildymai
                                                įsigalioja po jų paskelbimo Svetainėje momento. Rekomenduojame reguliariai
                                                peržiūrėti mūsų Privatumo politiką.
                                            </div>
                                        </div>
                                    </div>
                                @elseif (app()->getLocale() == 'ru')
                                    <p>
                                        Настоящая Политика конфиденциальности (далее – «Политика конфиденциальности»)
                                        разъясняет, как UAB «Madeiva»
                                        (далее – «Компания») собирает и обрабатывает информацию посетителей веб-сайта
                                        https://madeiva.shop/ (далее – «Сайт»), определяет права посетителей Сайта
                                        и порядок их реализации. Перед регистрацией на Сайте рекомендуем
                                        внимательно ознакомиться с настоящей Политикой конфиденциальности.
                                    </p>
                                    <p class="mb-2">
                                        Компания стремится ответственно и безопасно обращаться с вашими персональными
                                        данными в своей деятельности. Руководствуясь этими основополагающими принципами, мы
                                        всегда стремимся обеспечить достаточный уровень защиты ваших данных и защиты ваших
                                        прав. Мы обрабатываем персональные данные в соответствии с настоящей Политикой
                                        конфиденциальности, в соответствии с применимыми правовыми актами, включая Общий
                                        регламент по защите данных (2016/679) (далее именуемый «GDPR») и применимое
                                        литовское национальное законодательство о защите персональных данных.
                                    </p>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Контроллер данных
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                UAB "Madeiva" <br />
                                                Код компании: 303342108<br />
                                                Адрес: J. Jasinskio g. 10, Vilnius<br />
                                                Тел. Нр. +37064777121 <br />
                                                Адрес электронной почты: grasale.kavine@gmail.com<br />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Какую информацию о вас мы собираем, используем и храним?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Информация, предоставленная самим посетителем Сайта при заполнении
                                                регистрационной формы на нашем Сайте:
                                                <div class="ps-4 pb-1">1. Имя</div>
                                                <div class="ps-4 pb-1">2. Адрес</div>
                                                <div class="ps-4 pb-1">3. Электронная почта почта</div>
                                                <div class="ps-4 pb-1">4. Номер телефона</div>
                                                Информация необходима для предоставления услуги (статья 6 GDPR, параграф 1,
                                                пункт b).
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Используем ли мы файлы cookie?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Да, наш веб-сайт использует файлы cookie.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Какую информацию вы должны нам предоставить?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                При заполнении регистрационной формы на нашем веб-сайте вы должны
                                                предоставить нам данные, запрашиваемые в регистрационной форме.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                Какова правовая основа для сбора информации?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Мы собираем информацию о вас на законных основаниях, потому что:
                                                <div class="ps-4 pb-1">1. Ваша информация необходима для заключения и
                                                    исполнения договора с вами;</div>
                                                <div class="ps-4 pb-1">2. У нас есть законный интерес в отслеживании
                                                    статистики посещаемости веб-сайта.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                Предоставляем ли мы вашу информацию другим организациям (контролерам)?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Компания не предоставляет обрабатываемые персональные данные третьим лицам
                                                без предварительного согласия лица (субъекта данных), кроме как в порядке,
                                                установленном правовыми актами.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                Ваши принципы обработки данных
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Мы стремимся к тому, чтобы Персональные данные обрабатывались точно,
                                                справедливо и законно, чтобы они обрабатывались только для тех целей, для
                                                которых они собираются, с соблюдением четких и прозрачных принципов и
                                                требований к обработке персональных данных, изложенных в правовых актах.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                aria-expanded="false" aria-controls="collapseEight">
                                                Как долго мы храним информацию о вас?
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse"
                                            aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Мы храним вашу информацию о регистрации на Сайте до тех пор, пока вы не
                                                отзовете свое согласие. Мы храним информацию о ваших покупках в соответствии
                                                с Общими условиями хранения документов.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                aria-expanded="false" aria-controls="collapseNine">
                                                Каковы права субъекта данных?
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse"
                                            aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Вы имеете право ознакомиться со своими персональными данными и способами их
                                                обработки, потребовать исправления, дополнения или уничтожения
                                                предоставленных персональных данных, а также прекратить их обработку
                                                (отозвать свое согласие). Вы также имеете право потребовать, чтобы контролер
                                                персональных данных ограничил обработку персональных данных, право на
                                                передачу данных, подать жалобу в Государственную инспекцию по защите данных
                                                (контактные данные доступны на веб-сайте www.ada.lt) и возражать против
                                                обработки предоставленных персональных данных. Если вы хотите получить
                                                подробную информацию о порядке реализации данных прав, отправьте запрос на
                                                электронную почту, указанную на Сайте. почтовый адрес. Вы можете получить
                                                более подробную информацию об обработке и безопасности персональных данных,
                                                посетив нас.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                aria-expanded="false" aria-controls="collapseTen">
                                                Контакты нашего ответственного лица
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse"
                                            aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Мы стремимся обеспечить защиту ваших личных данных и предоставить всю
                                                необходимую информацию. Если у вас есть какие-либо вопросы или замечания
                                                относительно обработки ваших персональных данных, пожалуйста, свяжитесь с
                                                нами по адресу электронной почты, указанному на Сайте. Г-н. адрес.<br />
                                                Настоящая Политика конфиденциальности действует с момента ее публикации на
                                                Сайте. Политика конфиденциальности не считается соглашением между Компанией
                                                и Вами в отношении обработки Персональных данных. Настоящей Политикой
                                                конфиденциальности Компания информирует вас о принципах обработки ваших
                                                персональных данных в Компании. Мы можем изменить Политику
                                                конфиденциальности в любое время. Изменения и/или дополнения Политики
                                                конфиденциальности вступают в силу после их публикации на Сайте. Мы
                                                рекомендуем вам регулярно просматривать нашу Политику
                                                конфиденциальности.
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p>
                                        The Privacy Policy (hereinafter referred to as the "Privacy Policy") explains how
                                        UAB "Madeiva" (hereinafter referred to as the "Company") collects and processes
                                        information from
                                        visitors to the website https://madeiva.shop/ (hereinafter referred to as the
                                        "Site"), specifies what rights visitors to the Site have
                                        and how they can exercise them. Before registering on the Site, we recommend
                                        to read this Privacy Policy carefully.
                                    </p>
                                    <p class="mb-2">
                                        The Company is committed to handling your personal
                                        data responsibly and securely in its activities. Guided by these fundamental
                                        principles, we will always strive to ensure
                                        a sufficient level of protection of your data and the protection of your rights. We
                                        process Personal
                                        data in accordance with this Privacy Policy, in accordance with applicable legal
                                        acts,
                                        including the General Data Protection Regulation (2016/679) (hereinafter referred to
                                        as the "GDPR") and
                                        applicable Lithuanian national personal data protection legislation.
                                    </p>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Data Controller
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                UAB "Madeiva"<br />
                                                Registration code: 303342108<br />
                                                Address: J. Jasinskio g. 10, Vilnius<br />
                                                Phone. No. +37064777121<br />
                                                Email address: grasale.kavine@gmail.com<br />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                What information do we collect, use and store about
                                                you?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Information provided by the Website visitor himself when filling out the
                                                registration form on our Website:
                                                <div class="ps-4 pb-1">1. Name</div>
                                                <div class="ps-4 pb-1">2. Address</div>
                                                <div class="ps-4 pb-1">3. Email</div>
                                                <div class="ps-4 pb-1">4. Phone number</div>
                                                The information is necessary for the provision of the service (GDPR Article
                                                6, Paragraph 1, Clause b)
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Do we use cookies?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yes, our Website uses cookies.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                What information should you give us?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                When completing the registration form on our Website, you should provide us
                                                with the data requested in the registration form.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                What is the legal basis for collecting the
                                                information?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We collect information about you legally because:
                                                <div class="ps-4 pb-1">1. Your information is necessary to conclude and
                                                    execute a contract with you;</div>
                                                <div class="ps-4 pb-1">2. We have a legitimate interest in monitoring
                                                    website traffic statistics.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                Do we provide your information to other entities
                                                (controllers)?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                The company does not provide processed personal data to third parties
                                                without the prior consent of the person (data subject), except in accordance
                                                with the procedure established by legal acts.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                Your data processing principles
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We strive for Personal Data to be processed accurately, fairly and legally,
                                                to be processed only for the purposes for which it is collected, in
                                                compliance with the clear and transparent principles and requirements for
                                                personal data processing set forth in legal acts.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                aria-expanded="false" aria-controls="collapseEight">
                                                How long do we keep information about you?
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse"
                                            aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We store your information about registration on the Website until you
                                                withdraw your consent. We store information about your purchases in
                                                accordance with the General Document Storage Terms Index.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                aria-expanded="false" aria-controls="collapseNine">
                                                What are the rights of the data subject?
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse"
                                            aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                You have the right to familiarize yourself with your personal data and how
                                                they are processed, to demand correction, addition or destruction of the
                                                provided personal data, as well as to stop their processing (withdraw your
                                                consent). You also have the right to demand that the controller of personal
                                                data restricts the processing of personal data, the right to transfer data,
                                                file a complaint with the State Data Protection Inspectorate (contact
                                                details are available on the website www.ada.lt) and object to the
                                                processing of submitted personal data. If you want to receive detailed
                                                information about the procedure for exercising these rights, send a request
                                                to the e-mail specified on the Website. postal address. You can get more
                                                detailed information about personal data processing and security by visiting
                                                us.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                aria-expanded="false" aria-controls="collapseTen">
                                                Contacts of our responsible person
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse"
                                            aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We are committed to ensuring the protection of your personal data and
                                                providing all necessary information. If you have any questions or
                                                observations regarding the processing of your personal data, please contact
                                                us at the e-mail address specified on the Website. Mr. address.<br />
                                                This Privacy Policy is valid from the date of its publication on the
                                                Website. The Privacy Policy is not considered an agreement between the
                                                Company and You regarding the processing of Personal Data. With this Privacy
                                                Policy, the Company informs you about the principles of processing your
                                                personal data in the Company. We may change the Privacy Policy at any time.
                                                Changes and/or additions to the Privacy Policy take effect after their
                                                publication on the Website. We recommend that you regularly review our
                                                Privacy Policy.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
