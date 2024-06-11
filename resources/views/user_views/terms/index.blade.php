@extends('layouts.app')

@section('title', __('menu.termsofservice'))

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
                                            <h4 class="mb-4">{{ __('menu.termsofservice') }}</h4>
                                            @if ($lang == 'lt')
                                                <p style="line-height: 2rem">
                                                    1. Bendrosios nuostatos.</br>
                                                    1.1. Šios prekių / paslaugų pirkimo – pardavimo taisyklės (toliau –
                                                    Taisyklės) yra Šalims privalomas teisinis dokumentas, kuris nustato
                                                    Pirkėjo ir Pardavėjo teises, pareigas ir atsakomybę Pirkėjui įsigyjant
                                                    prekes / paslaugas el. parduotuvėje.</br>
                                                    1.2. Pardavėjas pasilieka teisę bet kuriuo metu pakeisti, taisyti ar
                                                    papildyti taisykles, atsižvelgdamas į teisės aktų nustatytus
                                                    reikalavimus. Pirkėjas informuojamas el. parduotuvės tinklalapyje.
                                                    Pirkėjui apsiperkant el. parduotuvėje taikomos Taisyklės, galiojančios
                                                    užsakymo pateikimo metu.</br>
                                                    1.3. Pirkti el. parduotuvėje turi teisę:</br>
                                                    1.3.1. veiksnūs fiziniai asmenys, t.y., asmenys sulaukę pilnametystės,
                                                    kurių veiksnumas nėra apribotas teismo tvarka;</br>
                                                    1.3.2. nepilnamečiai nuo 14 iki 18 metų amžiaus, tik turėdami tėvų arba
                                                    rūpintojų sutikimą, išskyrus tuos atvejus, kai jie savarankiškai
                                                    disponuoja savo pajamomis;</br>
                                                    1.3.3. juridiniai asmenys;</br>
                                                    1.3.4. visų aukščiau nurodytų asmenų įgaliotieji atstovai.</br>
                                                    1.4. Pardavėjas, patvirtindamas taisykles, taip pat garantuoja, kad,
                                                    remiantis taisyklių 1.3. punktu, Pirkėjas turi teisę pirkti prekes /
                                                    paslaugas el. parduotuvėje.</br>
                                                    1.5. Sutartis tarp Pirkėjo ir Pardavėjo laikoma sudaryta nuo to momento,
                                                    kai Pirkėjas el. parduotuvėje suformavęs prekių / paslaugų krepšelį,
                                                    susipažinęs su Pardavėjo taisyklėmis, paspaudžia mygtuką „Patvirtinti
                                                    užsakymą“ (žr. 5 punktą „Prekių / Paslaugų užsakymas, kainos,
                                                    atsiskaitymo tvarka, terminai“).</br>
                                                    1.6. Kiekviena sutartis, sudaryta tarp Pirkėjo ir Pardavėjo, yra saugoma
                                                    el. parduotuvėje.</br>
                                                    2. Asmens duomenų apsauga.</br>
                                                    2.1. Užsisakyti prekes / paslaugas el. parduotuvėje Pirkėjas gali
                                                    užsiregistruodamas šioje el. parduotuvėje – įvesdamas registracijoje
                                                    prašomus duomenis;</br>
                                                    2.2. Pirkėjas, užsakydamas prekes / paslaugas, atitinkamuose Pardavėjo
                                                    pateikiamuose informacijos laukuose turi nurodyti užsakymo tinkamam
                                                    įvykdymui būtinus Pirkėjo asmens duomenis.</br>
                                                    2.3. Patvirtindamas šias taisykles Pirkėjas sutinka, jog 2.2. punkte
                                                    pateikti Pirkėjo asmens duomenys būtų tvarkomi prekių / paslaugų
                                                    pardavimo el. parduotuvėje, Pardavėjo veiklos analizės ir tiesioginės
                                                    rinkodaros tikslais.</br>
                                                    2.4. Pirkėjas, užsiregistruodamas el. parduotuvėje bei užsakydamas
                                                    prekes / paslaugas, įsipareigoja saugoti ir niekam neatskleisti
                                                    prisijungimo duomenų.</br>
                                                    3. Pirkėjo teisės ir įsipareigojimai.</br>
                                                    3.1. Pirkėjas turi teisę pirkti prekes / paslaugas el. parduotuvėje šių
                                                    Taisyklių ir kitose šios el. parduotuvės informacijos skiltyse nustatyta
                                                    tvarka.</br>
                                                    3.2. Pirkėjas turi teisę atsisakyti prekių / paslaugų pirkimo –
                                                    pardavimo sutarties su el. parduotuve, pranešdamas Pardavėjui apie tai
                                                    raštu (el. paštu, nurodant pageidaujamą grąžinti prekę / paslaugą ir jos
                                                    užsakymo numerį), jeigu prekė / paslauga neatitinka el. parduotuvėje
                                                    pateikto prekės / paslaugos aprašymo (yra nekokybiška) ne vėliau kaip
                                                    per 14 darbo dienų.</br>
                                                    3.3. Pirkėjas, naudodamasis el. parduotuve, sutinka su šiomis pirkimo -
                                                    pardavimo Taisyklėmis ir įsipareigoja jų laikytis bei nepažeisti LR
                                                    teisės aktų.</br>
                                                    4. Pardavėjo teisės ir įsipareigojimai.</br>
                                                    4.1. Pardavėjas įsipareigoja sudaryti visas sąlygas Pirkėjui tinkamai
                                                    naudotis el. parduotuvės teikiamomis paslaugomis.</br>
                                                    4.2. Jei Pirkėjas bando pakenkti Pardavėjo el. parduotuvės darbo
                                                    stabilumui ir saugumui ar pažeidžia savo įsipareigojimus, Pardavėjas
                                                    turi teisę nedelsiant ir be perspėjimo apriboti ar sustabdyti Pirkėjo
                                                    galimybę naudotis el. parduotuve arba išskirtiniais atvejais panaikinti
                                                    Pirkėjo registraciją.</br>
                                                    4.3. Pardavėjas įsipareigoja gerbti Pirkėjo privatumo teisę į Pirkėjo
                                                    priklausančią asmeninę informaciją, nurodytą el. parduotuvės
                                                    registracijos formoje.</br>
                                                    5. Prekių / Paslaugų užsakymas, kainos, atsiskaitymo tvarka,
                                                    terminai.</br>
                                                    5.1. El. parduotuvėje Pirkėjas gali pirkti visą parą, 7 dienas per
                                                    savaitę.</br>
                                                    5.2. Sutartis pradeda galioti nuo to momento, kai Pirkėjas paspaudžia
                                                    mygtuką „Patvirtinti užsakymą.</br>
                                                    5.3. Prekių / Paslaugų kainos el. parduotuvėje ir suformuotame užsakyme
                                                    nurodomos eurais, įskaitant PVM.</br>
                                                    5.4. Pirkėjas atsiskaito už prekes / paslaugas naudojantis internetinės
                                                    bankininkystės sistema (Paysera).</br>
                                                    5.5. Tik gavus apmokėjimą už prekes / paslaugas pradedamas formuoti
                                                    užsakymas ir pradedamas skaičiuoti prekių pristatymo / paslaugų
                                                    suteikimo terminas.</br>
                                                    6. Prekių / Paslaugų kokybės, garantijos.</br>
                                                    6.1. Kiekvienos el. parduotuvėje parduodamos prekės / paslaugos duomenys
                                                    bendrai nurodomi prie kiekvienos prekės / paslaugos esančiame prekės
                                                    aprašyme.</br>
                                                    6.2. Pardavėjas tam tikroms prekių / paslaugų rūšims suteikia tam tikrą
                                                    laiką galiojančią kokybės garantiją, kurios konkretus terminas ir kitos
                                                    sąlygos nurodomos tokių prekių / paslaugų aprašymuose.</br>
                                                    6.3. Pardavėjui tam tikroms prekių / paslaugų rūšims nesuteikus kokybės
                                                    garantijos, galioja garantija, numatyta atitinkamų teisės aktų.</br>
                                                    7. Prekių / paslaugų grąžinimas ir keitimas.</br>
                                                    7.1. Norėdamas grąžinti prekes / paslaugas, Pirkėjas gali tai padaryti
                                                    per 14 (keturiolika) darbo dienų nuo prekių pristatymo / paslaugos
                                                    suteikimo Pirkėjui dienos, informuodamas Pardavėją kontaktų skyriuje
                                                    nurodytomis susisiekimo priemonėmis, nurodant grąžinamos prekės /
                                                    paslaugos pavadinimą, užsakymo numerį ir grąžinimo priežastis.</br>
                                                    Nutraukiant sutartį, pardavėjas įsipareigoja grąžinti pirkėjo įmokėtą
                                                    sumą (nekokybiška preke / paslauga laikoma el. parduotuvėje prekės /
                                                    paslaugos aprašymo neatitinkanti prekė / paslauga). Prekės / paslaugos
                                                    grąžinimą tokiu atveju organizuoja pardavėjas. Esant bendram pardavėjo
                                                    ir pirkėjo susitarimui, nekokybiška prekė / paslauga gali būti pakeista
                                                    į kokybišką.</br>
                                                    8. Pirkėjo ir pardavėjo atsakomybė.</br>
                                                    8.1. Pirkėjas yra visiškai atsakingas už Pirkėjo pateikiamų asmens
                                                    duomenų teisingumą. Jei Pirkėjas nepateikia tikslių asmens duomenų
                                                    registracijos formoje, Pardavėjas neatsako už dėl to atsiradusius
                                                    padarinius ir įgyja teisę reikalauti iš Pirkėjo patirtų tiesioginių
                                                    nuostolių atlyginimo.</br>
                                                    8.2. Pirkėjas atsako už veiksmus, atliktus naudojantis šia el.
                                                    parduotuve.</br>
                                                    8.3. Užsiregistravęs Pirkėjas atsako už savo prisijungimo duomenų
                                                    perdavimą tretiesiems asmenims. Jei el. parduotuvės teikiamomis
                                                    paslaugomis naudojasi trečiasis asmuo, prisijungęs prie el. parduotuvės
                                                    naudodamasis Pirkėjo prisijungimo duomenimis, Pardavėjas šį asmenį
                                                    laikome Pirkėju.</br>
                                                    8.4. Pardavėjas atleidžiamas nuo bet kokios atsakomybės tais atvejais,
                                                    kai nuostoliai kyla dėl to, jog Pirkėjas, neatsižvelgdamas į Pardavėjo
                                                    rekomendacijas ir Pirkėjo įsipareigojimus, nesusipažino su šiomis
                                                    Taisyklėmis, nors tokia galimybė jam buvo suteikta.</br>
                                                    8.5. Jei Pardavėjo el. parduotuvėje yra nuorodos į kitų įmonių, įstaigų,
                                                    organizacijų ar asmenų el. tinklalapius, Pardavėjas nėra atsakingas už
                                                    ten esančią informaciją ar vykdomą veiklą, tų tinklapių neprižiūri,
                                                    nekontroliuoja ir toms įmonėms bei asmenims neatstovauja.</br>
                                                    8.6. Atsiradus žalai, kaltoji Šalis atlygina kitai Šaliai tiesioginius
                                                    nuostolius.</br>
                                                    9. Baigiamosios nuostatos.</br>
                                                    9.1. Šios prekių / paslaugų pirkimo – pardavimo Taisyklės sudarytos
                                                    vadovaujantis LR įstatymais ir teisės aktais.</br>
                                                    9.2. Visi nesutarimai, kilę dėl šių Taisyklių vykdymo, sprendžiami
                                                    derybų būdu. Nepavykus susitarti, ginčai sprendžiami LR įstatymų
                                                    nustatyta tvarka.
                                                </p>
                                            @elseif ($lang == 'ru')
                                                <p>
                                                    1. Общие положения.</br>
                                                    1.1. Настоящие правила купли-продажи товаров/услуг (далее – Правила)
                                                    являются обязательным для Сторон юридическим документом, определяющим
                                                    права,
                                                    обязанности и ответственность Покупателя и Продавца при приобретении
                                                    Покупателем товаров/услуг посредством электронной почты. почта. в
                                                    магазине.</br>
                                                    1.2. Продавец оставляет за собой право изменять, дополнять или дополнять
                                                    правила в любое время с учетом требований, установленных правовыми
                                                    актами.
                                                    Покупатель уведомляется по электронной почте. на сайте магазина. Когда
                                                    покупатель покупает электронную почту Магазин применяет Правила,
                                                    действующие
                                                    на момент оформления заказа.</br>
                                                    1.3. Купить электронную почту Магазин имеет право:</br>
                                                    1.3.1. трудоспособные физические лица, то есть лица, достигшие
                                                    совершеннолетия, дееспособность которых не ограничена решением
                                                    суда;</br>
                                                    1.3.2. несовершеннолетние в возрасте от 14 до 18 лет только с согласия
                                                    их
                                                    родителей или опекунов, за исключением случаев, когда они распоряжаются
                                                    своими доходами самостоятельно;</br>
                                                    1.3.3. юридические лица;</br>
                                                    1.3.4. уполномоченные представители всех вышеуказанных лиц.</br>
                                                    1.4. Утверждая правила, продавец также гарантирует, что на основании
                                                    правил</br>
                                                    1.3. Пункт Покупатель имеет право приобретать товары/услуги
                                                    посредством</br>
                                                    электронной почты. в магазине.</br>
                                                    1,5. Договор между Покупателем и Продавцом считается заключенным с
                                                    момента
                                                    направления Покупателем электронного письма. после создания корзины
                                                    товаров/услуг в магазине, ознакомившись с правилами Продавца, нажмите
                                                    кнопку
                                                    «Подтвердить заказ» (см. пункт 5 «Заказ товаров/услуг, цены, порядок
                                                    оплаты,
                                                    сроки»).</br>
                                                    1.6. Каждый договор, заключенный между Покупателем и Продавцом, хранится
                                                    в
                                                    электронном виде. в магазине.</br>
                                                    2. Защита персональных данных.</br>
                                                    2.1. Заказ товаров/услуг по электронной почте. В магазине Покупатель
                                                    может
                                                    зарегистрироваться, используя этот адрес электронной почты. в магазине –
                                                    путем ввода данных, запрошенных при регистрации;</br>
                                                    2.2. При заказе товаров/услуг Покупатель обязан указать персональные
                                                    данные
                                                    Покупателя, необходимые для правильного оформления заказа, в
                                                    соответствующих
                                                    информационных полях, предоставляемых Продавцом.</br>
                                                    2.3. Утверждая настоящие правила, Покупатель соглашается с тем, что 2.2.
                                                    Персональные данные Покупателя, указанные в пункте, будут обрабатываться
                                                    при
                                                    электронной продаже товаров/услуг. в магазине, в целях анализа
                                                    деятельности
                                                    Продавца и прямого маркетинга.</br>
                                                    2.4. Покупатель, регистрирующийся по электронной почте в магазине и при
                                                    заказе товаров/услуг обязуется хранить и не разглашать кому-либо данные
                                                    для
                                                    входа.</br>
                                                    3. Права и обязанности покупателя.</br>
                                                    3.1. Покупатель имеет право приобретать товары/услуги посредством
                                                    электронной почты. в магазине настоящих Правил и других статей данного
                                                    эл. в порядке, указанном в разделах информации о магазине.</br>
                                                    3.2. Покупатель имеет право отказаться от договора купли-продажи
                                                    товара/услуги с эл. магазине, уведомив об этом Продавца в письменной
                                                    форме
                                                    (по электронной почте с указанием желаемого возврата товара/услуги и
                                                    номера
                                                    его заказа), если товар/услуга не соответствует электронному адресу
                                                    описание
                                                    товара/услуги, предоставленного в магазине (некачественного) не позднее
                                                    14
                                                    рабочих дней.</br>
                                                    3.3. Покупатель, используя электронную почту магазин, согласен с
                                                    настоящими
                                                    Правилами купли-продажи и обязуется соблюдать их и не нарушать правовые
                                                    акты
                                                    Литовской Республики.</br>
                                                    4. Права и обязанности Продавца.</br>
                                                    4.1. Продавец обязуется обеспечить все условия для правильного
                                                    использования
                                                    электронной почты покупателем. услуги, предоставляемые магазином.</br>
                                                    4.2. Если Покупатель пытается повредить электронную почту Продавца Для
                                                    стабильности и безопасности работы магазина или нарушает свои
                                                    обязательства
                                                    Продавец имеет право ограничить или приостановить возможность
                                                    использования
                                                    электронной почты Покупателя немедленно и без предупреждения. магазине
                                                    или,
                                                    в исключительных случаях, отменить регистрацию Покупателя.</br>
                                                    4.3. Продавец обязуется соблюдать право Покупателя на неприкосновенность
                                                    частной жизни в отношении личной информации Покупателя, указанной в
                                                    электронном письме. в форме регистрации магазина.</br>
                                                    5. Заказ товаров/услуг, цены, порядок оплаты, сроки.</br>
                                                    5.1. электронная почта В магазине Покупатель может совершать покупки 24
                                                    часа
                                                    в сутки 7 дней в неделю.</br>
                                                    5.2. Договор вступает в силу с момента нажатия Покупателем кнопки
                                                    «Подтвердить заказ».</br>
                                                    5.3. Цены на товары/услуги по электронной почте в магазине и в
                                                    сформированном заказе указаны в евро, включая НДС.</br>
                                                    5.4. Покупатель оплачивает товар/услугу с помощью системы
                                                    интернет-банкинга
                                                    (Paysera).</br>
                                                    5.5. Только после получения оплаты за товар/услугу начинается
                                                    формирование
                                                    заказа и расчет срока поставки товара/услуги.</br>
                                                    6. Гарантии качества товаров/услуг.</br>
                                                    6.1. Каждое электронное письмо Подробная информация о товарах/услугах,
                                                    продаваемых в магазине, обычно указывается в описании товара,
                                                    приложенном к
                                                    каждому товару/услуге.</br>
                                                    6.2. Продавец предоставляет гарантию качества, действующую в течение
                                                    определенного периода времени на отдельные виды товаров/услуг,
                                                    конкретный
                                                    срок и иные условия которых указаны в описаниях таких
                                                    товаров/услуг.</br>
                                                    6.3. Если продавец не предоставляет гарантию качества на отдельные виды
                                                    товаров/услуг, применяется гарантия, предусмотренная соответствующими
                                                    правовыми актами.</br>
                                                    7. Возврат и обмен товара/услуги.</br>
                                                    7.1. Возврат товара/услуги Покупатель может сделать в течение 14
                                                    (четырнадцати) рабочих дней со дня доставки товара/услуги Покупателю,
                                                    сообщив об этом Продавцу посредством средств связи, указанных в разделе
                                                    контакты, с указанием наименования возвращаемого товара/услуги, номера
                                                    заказа и причины возврата.</br>
                                                    При расторжении договора продавец обязуется вернуть уплаченную
                                                    покупателем
                                                    сумму (некачественным товаром/услугой считается товар/услуга, не
                                                    соответствующий описанию товара/услуги в интернет-магазине) . В этом
                                                    случае
                                                    возврат товара/услуги организует продавец. По взаимному согласию
                                                    продавца и
                                                    покупателя некачественный товар/услуга может быть заменена качественным.
                                                    8. Ответственность покупателя и продавца.</br>
                                                    8.1. Покупатель несет полную ответственность за правильность
                                                    предоставленных
                                                    Покупателем персональных данных. В случае не предоставления Покупателем
                                                    достоверных персональных данных в регистрационной форме Продавец не
                                                    несет
                                                    ответственности за возникшие последствия и приобретает право требовать
                                                    от
                                                    Покупателя возмещения понесенных прямых убытков.</br>
                                                    8.2. Покупатель несет ответственность за действия, совершенные с
                                                    использованием данного электронного письма. в магазине.</br>
                                                    8.3. После регистрации Покупатель несет ответственность за передачу
                                                    своих
                                                    данных для входа третьим лицам. Если электронная почта услугами,
                                                    предоставляемыми магазином, пользуется третье лицо, связанное с эл.
                                                    магазине
                                                    с использованием данных для входа Покупателя, Продавец считает это лицо
                                                    Покупателем.</br>
                                                    8.4. Продавец освобождается от любой ответственности в случаях, когда
                                                    убытки
                                                    возникли по причине того, что Покупатель, несмотря на рекомендации
                                                    Продавца
                                                    и обязательства Покупателя, не ознакомился с настоящими Правилами, хотя
                                                    ему
                                                    была предоставлена ​​такая возможность.</br>
                                                    8.5. Если адрес электронной почты Продавца Магазин содержит ссылки на
                                                    адреса
                                                    электронной почты других компаний, учреждений, организаций или частных
                                                    лиц.
                                                    веб-сайтах, Продавец не несет ответственности за информацию или действия
                                                    на
                                                    них, не контролирует и не контролирует эти веб-сайты и не представляет
                                                    эти
                                                    компании и частных лиц.</br>
                                                    8.6. В случае причинения ущерба виновная Сторона возмещает другой
                                                    Стороне
                                                    прямые убытки.</br>
                                                    9. Заключительные положения.</br>
                                                    9.1. Настоящие Правила покупки и продажи товаров/услуг составлены в
                                                    соответствии с законами и правовыми актами Литовской Республики.</br>
                                                    9.2. Все разногласия, возникающие при выполнении настоящих Правил,
                                                    подлежат
                                                    разрешению путем переговоров. В случае недостижения соглашения споры
                                                    разрешаются в порядке, установленном законодательством Литовской
                                                    Республики.
                                                </p>
                                            @else
                                                <p>
                                                    1. General provisions.</br>
                                                    1.1. These rules for the purchase and sale of goods / services
                                                    (hereinafter
                                                    - the Rules) are a legal document binding on the Parties, which
                                                    determine
                                                    the rights, duties and responsibilities of the Buyer and the Seller when
                                                    the
                                                    Buyer purchases goods / services by e-mail. in the store.</br>
                                                    1.2. The seller reserves the right to change, amend or add to the rules
                                                    at
                                                    any time, taking into account the requirements set by legal acts. The
                                                    buyer
                                                    is informed by e-mail. on the store's website. When the buyer purchases
                                                    e-mail the store applies the Rules valid at the time of placing the
                                                    order.</br>
                                                    1.3. Buy e-mail the store has the right to:</br>
                                                    1.3.1. able-bodied natural persons, i.e. persons who have reached the
                                                    age of
                                                    majority, whose capacity is not limited by court order;</br>
                                                    1.3.2. minors between the ages of 14 and 18, only with the consent of
                                                    their
                                                    parents or guardians, except in cases where they dispose of their income
                                                    independently;</br>
                                                    1.3.3. legal entities;</br>
                                                    1.3.4. authorized representatives of all the above persons.</br>
                                                    1.4. By approving the rules, the seller also guarantees that, based on
                                                    the
                                                    rules 1.3. point, the Buyer has the right to purchase goods/services by
                                                    e-mail. in the store.</br>
                                                    1.5. The contract between the Buyer and the Seller is considered
                                                    concluded
                                                    from the moment the Buyer e-mails after creating a basket of
                                                    goods/services
                                                    in the store, familiarizing himself with the Seller's rules, click the
                                                    "Confirm order" button (see point 5 "Ordering goods/services, prices,
                                                    payment procedure, deadlines").</br>
                                                    1.6. Each contract concluded between the Buyer and the Seller is stored
                                                    electronically. in the store.</br>
                                                    2. Protection of personal data.</br>
                                                    2.1. Order goods/services by e-mail. In the store, the Buyer can
                                                    register by
                                                    using this e-mail. in the store - by entering the data requested during
                                                    registration;</br>
                                                    2.2. When ordering goods/services, the Buyer must specify the Buyer's
                                                    personal data necessary for the proper execution of the order in the
                                                    relevant information fields provided by the Seller.</br>
                                                    2.3. By approving these rules, the Buyer agrees that 2.2. The personal
                                                    data
                                                    of the Buyer provided in point would be processed in the electronic
                                                    sales of
                                                    goods/services. in the store, for the purposes of analysis of the
                                                    Seller's
                                                    activity and direct marketing.</br>
                                                    2.4. The buyer, registering by e-mail in the store and when ordering
                                                    goods/services, undertakes to store and not disclose login data to
                                                    anyone.</br>
                                                    3. Buyer's rights and obligations.</br>
                                                    3.1. The buyer has the right to purchase goods/services by e-mail. in
                                                    the
                                                    store of these Rules and other articles of this e-mail according to the
                                                    procedure specified in the store information sections.</br>
                                                    3.2. The buyer has the right to refuse the goods/services purchase -
                                                    sales
                                                    contract with e. store, notifying the Seller about it in writing (by
                                                    e-mail,
                                                    indicating the desired return of the product/service and its order
                                                    number),
                                                    if the product/service does not correspond to the e-mail description of
                                                    the
                                                    product/service provided in the store (is of poor quality) no later than
                                                    within 14 working days.</br>
                                                    3.3. The buyer, using e-mail shop, agrees with these purchase and sale
                                                    Rules
                                                    and undertakes to comply with them and not to violate the legal acts of
                                                    the
                                                    Republic of Lithuania.</br>
                                                    4. Seller's rights and obligations.</br>
                                                    4.1. The seller undertakes to provide all the conditions for the proper
                                                    use
                                                    of e-mail by the buyer. services provided by the store.</br>
                                                    4.2. If the Buyer tries to harm the Seller's email for the stability and
                                                    security of the store's work or violates its obligations, the Seller has
                                                    the
                                                    right to limit or suspend the Buyer's ability to use e-mail immediately
                                                    and
                                                    without warning. store or, in exceptional cases, cancel the Buyer's
                                                    registration.</br>
                                                    4.3. The Seller undertakes to respect the Buyer's privacy right to the
                                                    Buyer's personal information specified in the e-mail. in the store
                                                    registration form.</br>
                                                    5. Ordering goods/services, prices, payment procedure, deadlines.</br>
                                                    5.1. email In the store, the Buyer can buy 24 hours a day, 7 days a
                                                    week.</br>
                                                    5.2. The contract comes into force from the moment the Buyer clicks the
                                                    "Confirm order" button.</br>
                                                    5.3. Prices of goods/services by e-mail in the store and in the formed
                                                    order
                                                    are indicated in euros, including VAT.</br>
                                                    5.4. The buyer pays for goods/services using the online banking system
                                                    (Paysera).</br>
                                                    5.5. Only after receiving the payment for the goods/services, the order
                                                    begins to be formed and the deadline for the delivery of the
                                                    goods/services
                                                    begins to be calculated.</br>
                                                    6. Guarantees of the quality of goods/services.</br>
                                                    6.1. Each e-mail the details of the goods/services sold in the store are
                                                    generally indicated in the product description attached to each
                                                    good/service.</br>
                                                    6.2. The seller provides a quality guarantee valid for a certain period
                                                    of
                                                    time for certain types of goods/services, the specific term and other
                                                    conditions of which are specified in the descriptions of such
                                                    goods/services.</br>
                                                    6.3. If the seller does not provide a quality guarantee for certain
                                                    types of
                                                    goods/services, the guarantee provided by the relevant legal acts shall
                                                    apply.</br>
                                                    7. Return and exchange of goods/services.</br>
                                                    7.1. In order to return the goods/services, the Buyer may do so within
                                                    14
                                                    (fourteen) working days from the day of delivery of the goods/service to
                                                    the
                                                    Buyer, by informing the Seller through the means of communication
                                                    specified
                                                    in the contact section, indicating the name of the returned
                                                    goods/service,
                                                    the order number and the reasons for the return.</br>
                                                    Upon termination of the contract, the seller undertakes to return the
                                                    amount
                                                    paid by the buyer (a low-quality product/service is considered to be a
                                                    product/service that does not match the description of the
                                                    product/service
                                                    in the e-store). In this case, the return of the product/service is
                                                    organized by the seller. With the mutual agreement of the seller and the
                                                    buyer, a low-quality product / service can be replaced with a
                                                    high-quality
                                                    one.</br>
                                                    8. Liability of buyer and seller.</br>
                                                    8.1. The Buyer is fully responsible for the correctness of the personal
                                                    data
                                                    provided by the Buyer. If the Buyer does not provide accurate personal
                                                    data
                                                    in the registration form, the Seller is not responsible for the
                                                    resulting
                                                    consequences and acquires the right to demand compensation from the
                                                    Buyer
                                                    for direct losses incurred.</br>
                                                    8.2. The buyer is responsible for the actions performed using this
                                                    e-mail.
                                                    in the store.</br>
                                                    8.3. After registering, the Buyer is responsible for transferring his
                                                    login
                                                    data to third parties. If email the services provided by the store are
                                                    used
                                                    by a third person connected to e. store using the Buyer's login data,
                                                    the
                                                    Seller considers this person to be a Buyer.</br>
                                                    8.4. The Seller is released from any responsibility in cases where
                                                    losses
                                                    arise because the Buyer, regardless of the Seller's recommendations and
                                                    the
                                                    Buyer's obligations, did not familiarize himself with these Rules,
                                                    although
                                                    he was given such an opportunity.</br>
                                                    8.5. If the Seller's email the store contains links to the e-mail
                                                    addresses
                                                    of other companies, institutions, organizations or individuals.
                                                    websites,
                                                    the Seller is not responsible for the information or activities there,
                                                    does
                                                    not supervise or control those websites and does not represent those
                                                    companies and individuals.</br>
                                                    8.6. In the event of damage, the guilty Party compensates the other
                                                    Party
                                                    for direct losses.</br>
                                                    9. Final Provisions.</br>
                                                    9.1. These Rules for the purchase and sale of goods/services are drawn
                                                    up in
                                                    accordance with the laws and legal acts of the Republic of
                                                    Lithuania.</br>
                                                    9.2. All disagreements arising from the implementation of these Rules
                                                    shall
                                                    be resolved through negotiations. If an agreement cannot be reached,
                                                    disputes are resolved in accordance with the procedure established by
                                                    the
                                                    laws of the Republic of Lithuania.
                                                </p>
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
