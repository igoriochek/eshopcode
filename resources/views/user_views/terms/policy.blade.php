@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.policy') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.policy') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="container">
        <div class="p-5 my-5" style="border: 1px solid #ddd; border-radius: 5px">
            @if($lang=="lt")
                <h2 class="mb-4">Privatumo politika</h2>
                Privatumo politika (toliau – „Privatumo politika“) paaiškina, kaip Lanosus (toliau – „Bendrovė“) renka ir tvarko svetainės www.lanosus.lt (toliau – „Svetainė“) lankytojų informaciją, nurodo kokias teises Svetainės lankytojai turi bei kaip jas gali įgyvendinti. Prieš registruojantis Svetainėje rekomenduojame atidžiai perskaityti šią Privatumo politiką.<br/>
                Bendrovė yra įsipareigojusi savo veikloje atsakingai ir saugiai tvarkyti Jūsų asmens duomenis. Vadovaudamiesi, šiais esminiais principais, mes visada sieksime užtikrinti pakankamą Jūsų duomenų apsaugos lygį bei Jūsų teisių apsaugą. Mes tvarkome Asmens duomenis, pagal šią Privatumo politiką, vadovaudamiesi taikomais teisės aktais, įskaitant Bendrąjį duomenų apsaugos reglamentą (2016/679) (toliau – „BDAR“) bei taikomus Lietuvos nacionalinius asmens duomenų apsaugos teisės aktus.<br/>
                <h6 class="mt-3 mb-2 h3">Duomenų valdytojas</h6>
                Lanosus<br/>
                Įmonės kodas yra: 304887410<br/>
                Adresas: Tilžės g. 156, Šiauliai<br/>
                Tel. Nr. +370 603 02602<br/>
                El. pašto adresas: sales@lanosus.com<br/>
                <h6 class="mt-3 mb-2 h3">Kokią informaciją renkame, naudojame ir saugojame apie Jus?</h6>
                Informacija, kurią pateikia pats Svetainės lankytojas, pildydamas registracijos formą mūsų Svetainėje:<br/>
                <span class="ms-3"></span>1.	Vardas<br/>
                <span class="ms-3"></span>2.	Adresas<br/>
                <span class="ms-3"></span>3.	El. paštas<br/>
                <span class="ms-3"></span>4.	Telefono numeris<br/>
                Informacija reikalinga paslaugos suteikimui (BDAR 6 straipsnio 1 dalies b punktas)<br/>
                <h6 class="mt-3 mb-2 h3">Ar naudojame slapukus?</h6>
                Taip, mūsų Svetainėje yra naudojami slapukai.<br/>
                <h6 class="mt-3 mb-2 h3">Kokią informaciją turėtumėte mums pateikti?</h6>
                Pildydami registracijos formą mūsų Svetainėje turėtumėte mums pateikti duomenis, prašomus registracijos formoje.<br/>
                Koks yra teisinis informacijos rinkimo pagrindas?<br/>
                Mes renkame informaciją apie Jus teisėtai, nes:<br/>
                <span class="ms-3"></span>1.	Jūsų informacija yra reikalinga sutarčiai su Jumis sudaryti ir vykdyti;<br/>
                <span class="ms-3"></span>2.	Mes turime teisėtą interesą stebėti Svetainės lankomumo statistiką.<br/>
                <h6 class="mt-3 mb-2 h3">Ar teikiame jūsų informaciją kitiems subjektams (tvarkytojams)?</h6>
                Bendrovė tvarkomų Asmens duomenų neteikia tretiesiems asmenims be išankstinio asmens (duomenų subjekto) sutikimo, išskyrus teisės aktų nustatyta tvarka.<br/>
                <h6 class="mt-3 mb-2 h3">Jūsų duomenų tvarkymo principai</h6>
                Mes siekiame, kad Asmens duomenys būtų tvarkomi tiksliai, sąžiningai ir teisėtai, kad jie būtų tvarkomi tik tokiais tikslais, kuriais renkami, laikantis teisės aktuose nustatytų aiškių ir skaidrių asmens duomenų tvarkymo principų ir reikalavimų.<br/>
                <h6 class="mt-3 mb-2 h3">Kiek laiko saugome informaciją apie jus?</h6>
                Mes Jūsų informaciją apie registraciją Svetainėje saugome iki sutikimo atšaukimo. Informaciją apie Jūsų atliktus pirkimus saugome vadovaudamiesi Bendrųjų dokumentų saugojimo terminų rodykle.<br/>
                <h6 class="mt-3 mb-2 h3">Kokios duomenų subjekto teisės?</h6>
                Jūs turite teisę susipažinti su savo asmens duomenimis ir kaip jie yra tvarkomi, reikalauti ištaisyti, papildyti ar sunaikinti pateiktus asmens duomenis, taip pat sustabdyti jų tvarkymo veiksmus (atšaukti savo sutikimą). Taip pat turite teisę reikalauti, kad asmens duomenų valdytojas apribotų asmens duomenų tvarkymą, teisę į duomenų perkėlimą, pateikti skundą Valstybinei duomenų apsaugos inspekcijai (kontaktiniai duomenys pateikti interneto svetainėje www.ada.lt) ir nesutikti su pateiktų asmens duomenų tvarkymu. Jei norite gauti išsamią informaciją apie šių teisių įgyvendinimo tvarką, pateikite užklausą Svetainėje nurodytu el. pašto adresu. Su išsamesne informacija apie asmens duomenų tvarkymą ir saugumą galite susipažinti atvykę pas mus.<br/>
                <h6 class="mt-3 mb-2 h3">Mūsu atsakingo asmens kontaktai</h6>
                Mes esame įsipareigoję užtikrinti Jūsų asmens duomenų apsaugą ir suteikti visą būtiną informaciją. Jeigu turite klausimų ar pastebėjimų dėl Jūsų asmens duomenų tvarkymo, prašome susisiekti su mumis Svetainėje nurodytu el. p. adresu.<br/>
                Ši Privatumo politika galioja nuo jos paskelbimo Svetainėje dienos. Privatumo politika nėra laikoma Bendrovės ir Jūsų susitarimu dėl Asmens duomenų tvarkymo. Šia Privatumo politika Bendrovė Jus informuoja apie Jūsų asmens duomenų tvarkymo principus Bendrovėje. Mes galime bet kada pakeisti Privatumo politiką. Privatumo politikos pakeitimai ir (ar) papildymai įsigalioja po jų paskelbimo Svetainėje momento. Rekomenduojame reguliariai peržiūrėti mūsų Privatumo politiką.<br/>

            @elseif ($lang == "ru")
                <h2 class="mb-4">Политика конфиденциальности</h2>
                Политика конфиденциальности (далее — «Политика конфиденциальности») объясняет, как Lanosus (далее — «Компания») собирает и обрабатывает информацию о посетителях веб-сайта www.lanosus.lt (далее — «Сайт»), указывает, что права, которыми обладают посетители Сайта, и способы их реализации. Перед регистрацией на Сайте рекомендуем внимательно ознакомиться с настоящей Политикой конфиденциальности.<br/>
                Компания обязуется ответственно и безопасно обращаться с вашими личными данными в своей деятельности. Основываясь на этих основных принципах, мы всегда будем стремиться обеспечить достаточный уровень защиты ваших данных и защиту ваших прав. Мы обрабатываем Персональные данные в соответствии с настоящей Политикой конфиденциальности в соответствии с применимыми правовыми актами, в том числе Общим регламентом защиты данных (2016/679) (далее — «GDPR») и применимыми национальными законами Литвы о защите персональных данных.<br />
                <h6 class="mt-3 mb-2 h3">Контроллер данных</h6>
                Lanosus<br/>
                Код компании: 304887410<br/>
                Адрес: Tilžės g. 156, Šiauliai<br/>
                Тел. Нр. +370 603 02602<br/>
                Адрес электронной почты: sales@lanosus.com<br/>
                <h6 class="mt-3 mb-2 h3">Какую информацию о вас мы собираем, используем и храним?</h6>
                Информация, предоставленная самим посетителем Сайта при заполнении регистрационной формы на нашем Сайте:<br/>
                <span class="ms-3"></span>1. Имя<br/>
                <span class="ms-3"></span>2. Адрес<br/>
                <span class="ms-3"></span>3. Электронная почта почта<br/>
                <span class="ms-3"></span>4. Номер телефона<br/>
                Информация необходима для предоставления услуги (статья 6 GDPR, параграф 1, пункт b)<br/>
                <h6 class="mt-3 mb-2 h3">Используем ли мы файлы cookie?</h6>
                Да, наш веб-сайт использует файлы cookie.<br/>
                <h6 class="mt-3 mb-2 h3">Какую информацию вы должны нам предоставить?</h6>
                При заполнении регистрационной формы на нашем веб-сайте вы должны предоставить нам данные, запрашиваемые в регистрационной форме.<br/>
                <h6 class="mt-3 mb-2 h3">Какова правовая основа для сбора информации?</h6>
                Мы собираем информацию о вас на законных основаниях, потому что:<br/>
                <span class="ms-3"></span>1. Ваша информация необходима для заключения и исполнения договора с вами;<br/>
                <span class="ms-3"></span>2. У нас есть законный интерес в отслеживании статистики посещаемости веб-сайта.<br/>
                <h6 class="mt-3 mb-2 h3">Предоставляем ли мы вашу информацию другим организациям (контролерам)?</h6>
                Компания не предоставляет обрабатываемые персональные данные третьим лицам без предварительного согласия лица (субъекта данных), кроме как в порядке, установленном правовыми актами.<br/>
                Ваши принципы обработки данных<br/>
                Мы стремимся к тому, чтобы Персональные данные обрабатывались точно, справедливо и законно, чтобы они обрабатывались только для тех целей, для которых они собираются, с соблюдением четких и прозрачных принципов и требований к обработке персональных данных, изложенных в правовых актах.<br/ >
                <h6 class="mt-3 mb-2 h3">Как долго мы храним информацию о вас?</h6>
                Мы храним вашу информацию о регистрации на Сайте до тех пор, пока вы не отзовете свое согласие. Мы храним информацию о ваших покупках в соответствии с Общими условиями хранения документов.<br/>
                <h6 class="mt-3 mb-2 h3">Каковы права субъекта данных?</h6>
                Вы имеете право ознакомиться со своими персональными данными и способами их обработки, потребовать исправления, дополнения или уничтожения предоставленных персональных данных, а также прекратить их обработку (отозвать свое согласие). Вы также имеете право потребовать, чтобы контролер персональных данных ограничил обработку персональных данных, право на передачу данных, подать жалобу в Государственную инспекцию по защите данных (контактные данные доступны на веб-сайте www.ada.lt) и возражать против обработки предоставленных персональных данных. Если вы хотите получить подробную информацию о порядке реализации данных прав, отправьте запрос на электронную почту, указанную на Сайте. почтовый адрес. Вы можете получить более подробную информацию об обработке и безопасности персональных данных, посетив нас.<br/>
                <h6 class="mt-3 mb-2 h3">Контакты нашего ответственного лица</h6>
                Мы стремимся обеспечить защиту ваших личных данных и предоставить всю необходимую информацию. Если у вас есть какие-либо вопросы или замечания относительно обработки ваших персональных данных, пожалуйста, свяжитесь с нами по адресу электронной почты, указанному на Сайте. Г-н. адрес.<br/>
                Настоящая Политика конфиденциальности действует с момента ее публикации на Сайте. Политика конфиденциальности не считается соглашением между Компанией и Вами в отношении обработки Персональных данных. Настоящей Политикой конфиденциальности Компания информирует вас о принципах обработки ваших персональных данных в Компании. Мы можем изменить Политику конфиденциальности в любое время. Изменения и/или дополнения Политики конфиденциальности вступают в силу после их публикации на Сайте. Мы рекомендуем вам регулярно просматривать нашу Политику конфиденциальности.<br/>

            @else
                <h2 class="mb-4">Privacy Policy</h2>
                The Privacy Policy (hereinafter - the "Privacy Policy") explains how Lanosus (hereinafter - the "Company") collects and processes the information of visitors to the website www.lanosus.lt (hereinafter - the "Site"), indicates what rights the visitors of the Site have and how to exercise them. can implement. Before registering on the Website, we recommend that you carefully read this Privacy Policy.<br/>
                The company is committed to handling your personal data responsibly and securely in its activities. Based on these essential principles, we will always strive to ensure a sufficient level of protection of your data and the protection of your rights. We process Personal Data, in accordance with this Privacy Policy, in accordance with the applicable legal acts, including the General Data Protection Regulation (2016/679) (hereinafter - "GDPR") and the applicable Lithuanian national personal data protection legislation.<br/>
                <h6 class="mt-3 mb-2 h3">Data Controller</h6>
                Lanosus<br/>
                The company code is: 304887410<br/>
                Address: Tilžės g. 156, Šiauliai<br/>
                Phone. No. +370 603 02602<br/>
                Email address: sales@lanosus.com<br/>
                <h6 class="mt-3 mb-2 h3">What information do we collect, use and store about you?</h6>
                Information provided by the Website visitor himself when filling out the registration form on our Website:<br/>
                <span class="ms-3"></span>1. Name<br/>
                <span class="ms-3"></span>2. Address<br/>
                <span class="ms-3"></span>3. Email mail<br/>
                <span class="ms-3"></span>4. Phone number<br/>
                The information is necessary for the provision of the service (GDPR Article 6, Paragraph 1, Clause b)<br/>
                <h6 class="mt-3 mb-2 h3">Do we use cookies?</h6>
                Yes, our Website uses cookies.<br/>
                <h6 class="mt-3 mb-2 h3">What information should you give us?</h6>
                When completing the registration form on our Website, you should provide us with the data requested in the registration form.<br/>
                <h6 class="mt-3 mb-2 h3">What is the legal basis for collecting the information?</h6>
                We collect information about you legally because:<br/>
                <span class="ms-3"></span>1. Your information is necessary to conclude and execute a contract with you;<br/>
                <span class="ms-3"></span>2. We have a legitimate interest in monitoring website traffic statistics.<br/>
                <h6 class="mt-3 mb-2 h3">Do we provide your information to other entities (controllers)?</h6>
                The company does not provide processed personal data to third parties without the prior consent of the person (data subject), except in accordance with the procedure established by legal acts.<br/>
                Your data processing principles<br/>
                We strive for Personal Data to be processed accurately, fairly and legally, to be processed only for the purposes for which it is collected, in compliance with the clear and transparent principles and requirements for personal data processing set forth in legal acts.<br/>
                <h6 class="mt-3 mb-2 h3">How long do we keep information about you?</h6>
                We store your information about registration on the Website until you withdraw your consent. We store information about your purchases in accordance with the General Document Storage Terms Index.<br/>
                <h6 class="mt-3 mb-2 h3">What are the rights of the data subject?</h6>
                You have the right to familiarize yourself with your personal data and how they are processed, to demand correction, addition or destruction of the provided personal data, as well as to stop their processing (withdraw your consent). You also have the right to demand that the controller of personal data restricts the processing of personal data, the right to transfer data, file a complaint with the State Data Protection Inspectorate (contact details are available on the website www.ada.lt) and object to the processing of submitted personal data. If you want to receive detailed information about the procedure for exercising these rights, send a request to the e-mail specified on the Website. postal address. You can get more detailed information about personal data processing and security by visiting us.<br/>
                <h6 class="mt-3 mb-2 h3">Contacts of our responsible person</h6>
                We are committed to ensuring the protection of your personal data and providing all necessary information. If you have any questions or observations regarding the processing of your personal data, please contact us at the e-mail address specified on the Website. Mr. address.<br/>
                This Privacy Policy is valid from the date of its publication on the Website. The Privacy Policy is not considered an agreement between the Company and You regarding the processing of Personal Data. With this Privacy Policy, the Company informs you about the principles of processing your personal data in the Company. We may change the Privacy Policy at any time. Changes and/or additions to the Privacy Policy take effect after their publication on the Website. We recommend that you regularly review our Privacy Policy.<br/>
            @endif
        </div>
    </div>
@endsection
