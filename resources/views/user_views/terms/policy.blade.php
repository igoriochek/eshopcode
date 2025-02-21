@extends('layouts.app')

@section('title', __('menu.policy'))

@section('content')
<div class="faq_content_area mt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="faq_content_wrapper">
                    <h4>{{ __('menu.policy') }}</h4>
                    @if (app()->getLocale() == 'lt')
                    <p>
                        Privatumo politika (toliau – "Privatumo politika") paaiškina, kaip UAB "Lord UK"
                        (toliau – "Bendrovė") renka ir tvarko svetainės https://lordvisuals.lt/ (toliau –
                        "Svetainė") lankytojų informaciją, nurodo kokias teises Svetainės lankytojai turi
                        bei kaip jas gali įgyvendinti. Prieš registruojantis Svetainėje rekomenduojame
                        atidžiai perskaityti šią Privatumo politiką.
                    </p>
                    <p>
                        Bendrovė yra įsipareigojusi savo veikloje atsakingai ir saugiai tvarkyti Jūsų
                        asmens duomenis. Vadovaudamiesi, šiais esminiais principais, mes visada sieksime
                        užtikrinti pakankamą Jūsų duomenų apsaugos lygį bei Jūsų teisių apsaugą. Mes
                        tvarkome Asmens duomenis, pagal šią Privatumo politiką, vadovaudamiesi taikomais
                        teisės aktais, įskaitant Bendrąjį duomenų apsaugos reglamentą (2016/679) (toliau
                        – "BDAR") bei taikomus Lietuvos nacionalinius asmens duomenų apsaugos teisės aktus.
                    </p>
                    <h4>Duomenų valdytojas</h4>
                    <p>
                        UAB "Lord UK"<br />
                        Įmonės kodas: 302610051<br />
                        Adresas: Liepų g. 83, Klaipėda<br />
                        Tel. Nr. +37060564062<br />
                        El. pašto adresas: info@lordvisuals.lt<br />
                    </p>
                    <h4>Kokią informaciją renkame, naudojame ir saugojame apie Jus?</h4>
                    <p>
                        Informacija, kurią pateikia pats Svetainės lankytojas, pildydamas registracijos formą mūsų Svetainėje:
                    <div class="ps-4 pb-1">1. Vardas</div>
                    <div class="ps-4 pb-1">2. Adresas</div>
                    <div class="ps-4 pb-1">3. El. paštas</div>
                    <div class="ps-4 pb-1">4. Telefono numeris</div>
                    Informacija reikalinga paslaugos suteikimui (BDAR 6 straipsnio 1 dalies b punktas).
                    </p>
                    <h4>Ar naudojame slapukus?</h4>
                    <p>
                        Taip, mūsų Svetainėje yra naudojami slapukai.
                    </p>
                    <h4>Kokią informaciją turėtumėte mums pateikti?</h4>
                    <p>
                        Pildydami registracijos formą mūsų Svetainėje turėtumėte mums pateikti
                        duomenis, prašomus registracijos formoje.
                    </p>
                    <h4>Koks yra teisinis informacijos rinkimo pagrindas?</h4>
                    <p>
                        Mes renkame informaciją apie Jus teisėtai, nes:
                    <div class="ps-4 pb-1">1. Jūsų informacija yra reikalinga sutarčiai su Jumis
                        sudaryti ir vykdyti;</div>
                    <div class="ps-4 pb-1">2. Mes turime teisėtą interesą stebėti Svetainės
                        lankomumo statistiką.</div>
                    </p>
                    <h4>Ar teikiame jūsų informaciją kitiems subjektams (tvarkytojams)?</h4>
                    <p>
                        Bendrovė tvarkomų Asmens duomenų neteikia tretiesiems asmenims be
                        išankstinio asmens (duomenų subjekto) sutikimo, išskyrus teisės aktų
                        nustatyta tvarka.
                    </p>
                    <h4>Jūsų duomenų tvarkymo principai</h4>
                    <p>
                        Mes siekiame, kad Asmens duomenys būtų tvarkomi tiksliai, sąžiningai ir
                        teisėtai, kad jie būtų tvarkomi tik tokiais tikslais, kuriais renkami,
                        laikantis teisės aktuose nustatytų aiškių ir skaidrių asmens duomenų
                        tvarkymo principų ir reikalavimų.
                    </p>
                    <h4>Kiek laiko saugome informaciją apie jus?</h4>
                    <p>
                        Mes Jūsų informaciją apie registraciją Svetainėje saugome iki sutikimo
                        atšaukimo. Informaciją apie Jūsų atliktus pirkimus saugome vadovaudamiesi
                        Bendrųjų dokumentų saugojimo terminų rodykle.
                    </p>
                    <h4>Kokios duomenų subjekto teisės?</h4>
                    <p>
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
                    </p>
                    <h4>Mūsų atsakingo asmens kontaktai</h4>
                    <p>
                        Mes esame įsipareigoję užtikrinti Jūsų asmens duomenų apsaugą ir suteikti
                        visą būtiną informaciją. Jeigu turite klausimų ar pastebėjimų dėl Jūsų
                        asmens duomenų tvarkymo, prašome susisiekti su mumis Svetainėje nurodytu el.
                        p. adresu.
                    </p>
                    <p>
                        Ši Privatumo politika galioja nuo jos paskelbimo Svetainėje dienos.
                        Privatumo politika nėra laikoma Bendrovės ir Jūsų susitarimu dėl Asmens
                        duomenų tvarkymo. Šia Privatumo politika Bendrovė Jus informuoja apie Jūsų
                        asmens duomenų tvarkymo principus Bendrovėje. Mes galime bet kada pakeisti
                        Privatumo politiką. Privatumo politikos pakeitimai ir (ar) papildymai
                        įsigalioja po jų paskelbimo Svetainėje momento. Rekomenduojame reguliariai
                        peržiūrėti mūsų Privatumo politiką.
                    </p>
                    @elseif (app()->getLocale() == 'ru')
                    <p>
                        Политика конфиденциальности (далее — «Политика конфиденциальности»)
                        объясняет, как ЗАО «Lord UK» (далее — «Компания») собирает и обрабатывает
                        информацию о посетителях веб-сайта https://www.lordvisuals.lt (далее — «Сайт»),
                        указывает, что права, которыми обладают посетители Сайта, и способы их
                        реализации. Перед регистрацией на Сайте рекомендуем внимательно ознакомиться
                        с настоящей Политикой конфиденциальности.
                    </p>
                    <p>
                        Компания обязуется ответственно и безопасно обращаться с вашими личными
                        данными в своей деятельности. Основываясь на этих основных принципах, мы
                        всегда будем стремиться обеспечить достаточный уровень защиты ваших данных
                        и защиту ваших прав. Мы обрабатываем Персональные данные в соответствии с
                        настоящей Политикой конфиденциальности в соответствии с применимыми
                        правовыми актами, в том числе Общим регламентом защиты данных (2016/679)
                        (далее — «GDPR») и применимыми национальными законами Литвы о защите
                        персональных данных.
                    </p>
                    <h4>Контроллер данных</h4>
                    <p>
                        ЗАО « Lord UK »<br />
                        Код компании: 302610051<br />
                        Адрес: Liepų g. 83, Klaipėda<br />
                        Тел. Нр. +37060564062<br />
                        Адрес электронной почты: info@lordvisuals.lt<br />
                    </p>
                    <h4>Какую информацию о вас мы собираем, используем и храним?</h4>
                    <p>
                        Информация, предоставленная самим посетителем Сайта при заполнении регистрационной формы на нашем Сайте:
                        <div class="ps-4 pb-1">1. Имя</div>
                        <div class="ps-4 pb-1">2. Адрес</div>
                        <div class="ps-4 pb-1">3. Электронная почта почта</div>
                        <div class="ps-4 pb-1">4. Номер телефона</div>
                        Информация необходима для предоставления услуги (статья 6 GDPR, параграф 1,
                        пункт b).
                    </p>
                    <h4>Используем ли мы файлы cookie?</h4>
                    <p>
                        Да, наш веб-сайт использует файлы cookie.
                    </p>
                    <h4>Какую информацию вы должны нам предоставить?</h4>
                    <p>
                        При заполнении регистрационной формы на нашем веб-сайте вы должны
                        предоставить нам данные, запрашиваемые в регистрационной форме.
                    </p>
                    <h4>Какова правовая основа для сбора информации?</h4>
                    <p>
                        Мы собираем информацию о вас на законных основаниях, потому что:
                        <div class="ps-4 pb-1">1. Ваша информация необходима для заключения и
                        исполнения договора с вами;</div>
                        <div class="ps-4 pb-1">2. У нас есть законный интерес в отслеживании
                        статистики посещаемости веб-сайта.</div>
                    </p>
                    <h4>Предоставляем ли мы вашу информацию другим организациям (контролерам)?</h4>
                    <p>
                        Компания не предоставляет обрабатываемые персональные данные третьим лицам
                        без предварительного согласия лица (субъекта данных), кроме как в порядке,
                        установленном правовыми актами.
                    </p>
                    <h4>Ваши принципы обработки данных</h4>
                    <p>
                        Мы стремимся к тому, чтобы Персональные данные обрабатывались точно,
                        справедливо и законно, чтобы они обрабатывались только для тех целей, для
                        которых они собираются, с соблюдением четких и прозрачных принципов и
                        требований к обработке персональных данных, изложенных в правовых актах.

                    </p>
                    <h4>Как долго мы храним информацию о вас?</h4>
                    <p>
                        Мы храним вашу информацию о регистрации на Сайте до тех пор, пока вы не
                        отзовете свое согласие. Мы храним информацию о ваших покупках в соответствии
                        с Общими условиями хранения документов.
                    </p>
                    <h4>Каковы права субъекта данных?</h4>
                    <p>
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
                    </p>
                    <h4>Контакты нашего ответственного лица</h4>
                    <p>
                        Мы стремимся обеспечить защиту ваших личных данных и предоставить всю
                        необходимую информацию. Если у вас есть какие-либо вопросы или замечания
                        относительно обработки ваших персональных данных, пожалуйста, свяжитесь с
                        нами по адресу электронной почты, указанному на Сайте. Г-н. адрес.
                    </p>
                    <p>
                        Настоящая Политика конфиденциальности действует с момента ее публикации на
                        Сайте. Политика конфиденциальности не считается соглашением между Компанией
                        и Вами в отношении обработки Персональных данных. Настоящей Политикой
                        конфиденциальности Компания информирует вас о принципах обработки ваших
                        персональных данных в Компании. Мы можем изменить Политику
                        конфиденциальности в любое время. Изменения и/или дополнения Политики
                        конфиденциальности вступают в силу после их публикации на Сайте. Мы
                        рекомендуем вам регулярно просматривать нашу Политику
                        конфиденциальности.
                    </p>
                    @else
                    <p>
                        The Privacy Policy (hereinafter - the "Privacy Policy") explains how
                        UAB "Lord UK" (hereinafter - the "Company") collects and processes the
                        information of visitors to the website https://www.lordvisuals.lt (hereinafter
                        - the "Site"), indicates what rights the visitors of the Site have
                        and how to exercise them. can implement. Before registering on the
                        Website, we recommend that you carefully read this Privacy Policy.
                    </p>
                    <p>
                        The company is committed to handling your personal data responsibly and
                        securely in its activities. Based on these essential principles, we will
                        always strive to ensure a sufficient level of protection of your data
                        and the protection of your rights. We process Personal Data, in accordance
                        with this Privacy Policy, in accordance with the applicable legal acts,
                        including the General Data Protection Regulation (2016/679) (hereinafter -
                        "GDPR") and the applicable Lithuanian national personal data protection
                        legislation.
                    </p>
                    <h4>Data Controller</h4>
                    <p>
                        UAB "Lord UK"<br />
                        Registration code: 302610051<br />
                        Address: Liepų g. 83, Klaipėda<br />
                        Phone. No. +37060564062<br />
                        Email address: info@lordvisuals.lt<br />
                    </p>
                    <h4>What information do we collect, use and store about
                        you?</h4>
                    <p>
                        Information provided by the Website visitor himself when filling out the
                        registration form on our Website:
                        <div class="ps-4 pb-1">1. Name</div>
                        <div class="ps-4 pb-1">2. Address</div>
                        <div class="ps-4 pb-1">3. Email</div>
                        <div class="ps-4 pb-1">4. Phone number</div>
                        The information is necessary for the provision of the service (GDPR Article
                        6, Paragraph 1, Clause b)
                    </p>
                    <h4>Do we use cookies?</h4>
                    <p>
                        Yes, our Website uses cookies.
                    </p>
                    <h4>What information should you give us?</h4>
                    <p>
                        When completing the registration form on our Website, you should provide us
                        with the data requested in the registration form.
                    </p>
                    <h4>What is the legal basis for collecting the
                        information?</h4>
                    <p>
                        We collect information about you legally because:
                        <div class="ps-4 pb-1">1. Your information is necessary to conclude and
                        execute a contract with you;</div>
                        <div class="ps-4 pb-1">2. We have a legitimate interest in monitoring
                        website traffic statistics.</div>
                    </p>
                    <h4>Do we provide your information to other entities
                        (controllers)?</h4>
                    <p>
                        The company does not provide processed personal data to third parties
                        without the prior consent of the person (data subject), except in accordance
                        with the procedure established by legal acts.
                    </p>
                    <h4>Your data processing principles</h4>
                    <p>
                        We strive for Personal Data to be processed accurately, fairly and legally,
                        to be processed only for the purposes for which it is collected, in
                        compliance with the clear and transparent principles and requirements for
                        personal data processing set forth in legal acts.
                    </p>
                    <h4>How long do we keep information about you?</h4>
                    <p>
                        We store your information about registration on the Website until you
                        withdraw your consent. We store information about your purchases in
                        accordance with the General Document Storage Terms Index.
                    </p>
                    <h4>What are the rights of the data subject?</h4>
                    <p>
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
                    </p>
                    <h4>Contacts of our responsible person</h4>
                    <p>
                        We are committed to ensuring the protection of your personal data and
                        providing all necessary information. If you have any questions or
                        observations regarding the processing of your personal data, please contact
                        us at the e-mail address specified on the Website. Mr. address.
                    </p>
                    <p>
                        This Privacy Policy is valid from the date of its publication on the
                        Website. The Privacy Policy is not considered an agreement between the
                        Company and You regarding the processing of Personal Data. With this Privacy
                        Policy, the Company informs you about the principles of processing your
                        personal data in the Company. We may change the Privacy Policy at any time.
                        Changes and/or additions to the Privacy Policy take effect after their
                        publication on the Website. We recommend that you regularly review our
                        Privacy Policy.
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection