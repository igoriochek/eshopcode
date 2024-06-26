@extends('layouts.app')

@section('title', __('menu.termsofservice'))

@section('content')
    <div class="axil-about-area about-style-1 axil-section-gap ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="about-content">
                        <span class="text-heading fs-3">
                            @if ($lang == 'lt')
                                1. Bendrosios nuostatos.<br />
                                1.1. Šios prekių / paslaugų pirkimo – pardavimo taisyklės (toliau – Taisyklės) yra
                                Šalims privalomas teisinis dokumentas, kuris nustato Pirkėjo ir Pardavėjo teises,
                                pareigas ir atsakomybę Pirkėjui įsigyjant prekes / paslaugas el. parduotuvėje.<br />
                                1.2. Pardavėjas pasilieka teisę bet kuriuo metu pakeisti, taisyti ar papildyti
                                taisykles, atsižvelgdamas į teisės aktų nustatytus reikalavimus. Pirkėjas informuojamas
                                el. parduotuvės tinklalapyje. Pirkėjui apsiperkant el. parduotuvėje taikomos Taisyklės,
                                galiojančios užsakymo pateikimo metu.<br />
                                1.3. Pirkti el. parduotuvėje turi teisę:<br />
                                1.3.1. veiksnūs fiziniai asmenys, t.y., asmenys sulaukę pilnametystės, kurių veiksnumas
                                nėra apribotas teismo tvarka;<br />
                                1.3.2. nepilnamečiai nuo 14 iki 18 metų amžiaus, tik turėdami tėvų arba rūpintojų
                                sutikimą, išskyrus tuos atvejus, kai jie savarankiškai disponuoja savo pajamomis;<br />
                                1.3.3. juridiniai asmenys;<br />
                                1.3.4. visų aukščiau nurodytų asmenų įgaliotieji atstovai.<br />
                                1.4. Pardavėjas, patvirtindamas taisykles, taip pat garantuoja, kad, remiantis taisyklių
                                1.3. punktu, Pirkėjas turi teisę pirkti prekes / paslaugas el. parduotuvėje.<br />
                                1.5. Sutartis tarp Pirkėjo ir Pardavėjo laikoma sudaryta nuo to momento, kai Pirkėjas
                                el. parduotuvėje suformavęs prekių / paslaugų krepšelį, susipažinęs su Pardavėjo
                                taisyklėmis, paspaudžia mygtuką „Patvirtinti užsakymą“ (žr. 5 punktą „Prekių / Paslaugų
                                užsakymas, kainos, atsiskaitymo tvarka, terminai“).<br />
                                1.6. Kiekviena sutartis, sudaryta tarp Pirkėjo ir Pardavėjo, yra saugoma el.
                                parduotuvėje.<br />
                                2. Asmens duomenų apsauga.<br />
                                2.1. Užsisakyti prekes / paslaugas el. parduotuvėje Pirkėjas gali užsiregistruodamas
                                šioje el. parduotuvėje – įvesdamas registracijoje prašomus duomenis;<br />
                                2.2. Pirkėjas, užsakydamas prekes / paslaugas, atitinkamuose Pardavėjo pateikiamuose
                                informacijos laukuose turi nurodyti užsakymo tinkamam įvykdymui būtinus Pirkėjo asmens
                                duomenis.<br />
                                2.3. Patvirtindamas šias taisykles Pirkėjas sutinka, jog 2.2. punkte pateikti Pirkėjo
                                asmens duomenys būtų tvarkomi prekių / paslaugų pardavimo el. parduotuvėje, Pardavėjo
                                veiklos analizės ir tiesioginės rinkodaros tikslais.<br />
                                2.4. Pirkėjas, užsiregistruodamas el. parduotuvėje bei užsakydamas prekes / paslaugas,
                                įsipareigoja saugoti ir niekam neatskleisti prisijungimo duomenų.<br />
                                3. Pirkėjo teisės ir įsipareigojimai.<br />
                                3.1. Pirkėjas turi teisę pirkti prekes / paslaugas el. parduotuvėje šių Taisyklių ir
                                kitose šios el. parduotuvės informacijos skiltyse nustatyta tvarka.<br />
                                3.2. Pirkėjas turi teisę atsisakyti prekių / paslaugų pirkimo – pardavimo sutarties su
                                el. parduotuve, pranešdamas Pardavėjui apie tai raštu (el. paštu, nurodant pageidaujamą
                                grąžinti prekę / paslaugą ir jos užsakymo numerį), jeigu prekė / paslauga neatitinka el.
                                parduotuvėje pateikto prekės / paslaugos aprašymo (yra nekokybiška) ne vėliau kaip per
                                14 darbo dienų.<br />
                                3.3. Pirkėjas, naudodamasis el. parduotuve, sutinka su šiomis pirkimo - pardavimo
                                Taisyklėmis ir įsipareigoja jų laikytis bei nepažeisti LR teisės aktų.<br />
                                4. Pardavėjo teisės ir įsipareigojimai.<br />
                                4.1. Pardavėjas įsipareigoja sudaryti visas sąlygas Pirkėjui tinkamai naudotis el.
                                parduotuvės teikiamomis paslaugomis.<br />
                                4.2. Jei Pirkėjas bando pakenkti Pardavėjo el. parduotuvės darbo stabilumui ir saugumui
                                ar pažeidžia savo įsipareigojimus, Pardavėjas turi teisę nedelsiant ir be perspėjimo
                                apriboti ar sustabdyti Pirkėjo galimybę naudotis el. parduotuve arba išskirtiniais
                                atvejais panaikinti Pirkėjo registraciją.<br />
                                4.3. Pardavėjas įsipareigoja gerbti Pirkėjo privatumo teisę į Pirkėjo priklausančią
                                asmeninę informaciją, nurodytą el. parduotuvės registracijos formoje.<br />
                                5. Prekių / Paslaugų užsakymas, kainos, atsiskaitymo tvarka, terminai.<br />
                                5.1. El. parduotuvėje Pirkėjas gali pirkti visą parą, 7 dienas per savaitę.<br />
                                5.2. Sutartis pradeda galioti nuo to momento, kai Pirkėjas paspaudžia mygtuką
                                "Patvirtinti užsakymą".<br />
                                5.3. Prekių / Paslaugų kainos el. parduotuvėje ir suformuotame užsakyme nurodomos
                                eurais, įskaitant PVM.<br />
                                5.4. Pirkėjas atsiskaito už prekes / paslaugas naudojantis internetinės bankininkystės
                                sistema (Paysera).<br />
                                5.5. Tik gavus apmokėjimą už prekes / paslaugas pradedamas formuoti užsakymas ir
                                pradedamas skaičiuoti prekių pristatymo / paslaugų suteikimo terminas.<br />
                                6. Prekių / Paslaugų kokybės, garantijos.<br />
                                6.1. Kiekvienos el. parduotuvėje parduodamos prekės / paslaugos duomenys bendrai
                                nurodomi prie kiekvienos prekės / paslaugos esančiame prekės aprašyme.<br />
                                6.2. Pardavėjas tam tikroms prekių / paslaugų rūšims suteikia tam tikrą laiką
                                galiojančią kokybės garantiją, kurios konkretus terminas ir kitos sąlygos nurodomos
                                tokių prekių / paslaugų aprašymuose.<br />
                                6.3. Pardavėjui tam tikroms prekių / paslaugų rūšims nesuteikus kokybės garantijos,
                                galioja garantija, numatyta atitinkamų teisės aktų.<br />
                                7. Prekių / paslaugų grąžinimas ir keitimas.<br />
                                7.1. Norėdamas grąžinti prekes / paslaugas, Pirkėjas gali tai padaryti per 14
                                (keturiolika) darbo dienų nuo prekių pristatymo / paslaugos suteikimo Pirkėjui dienos,
                                informuodamas Pardavėją kontaktų skyriuje nurodytomis susisiekimo priemonėmis, nurodant
                                grąžinamos prekės / paslaugos pavadinimą, užsakymo numerį ir grąžinimo priežastis.<br />
                                Nutraukiant sutartį, pardavėjas įsipareigoja grąžinti pirkėjo įmokėtą sumą (nekokybiška
                                preke / paslauga laikoma el. parduotuvėje prekės / paslaugos aprašymo neatitinkanti
                                prekė / paslauga). Prekės / paslaugos grąžinimą tokiu atveju organizuoja pardavėjas.
                                Esant bendram pardavėjo ir pirkėjo susitarimui, nekokybiška prekė / paslauga gali būti
                                pakeista į kokybišką.<br />
                                8. Pirkėjo ir pardavėjo atsakomybė.<br />
                                8.1. Pirkėjas yra visiškai atsakingas už Pirkėjo pateikiamų asmens duomenų teisingumą.
                                Jei Pirkėjas nepateikia tikslių asmens duomenų registracijos formoje, Pardavėjas
                                neatsako už dėl to atsiradusius padarinius ir įgyja teisę reikalauti iš Pirkėjo patirtų
                                tiesioginių nuostolių atlyginimo.<br />
                                8.2. Pirkėjas atsako už veiksmus, atliktus naudojantis šia el. parduotuve.<br />
                                8.3. Užsiregistravęs Pirkėjas atsako už savo prisijungimo duomenų perdavimą tretiesiems
                                asmenims. Jei el. parduotuvės teikiamomis paslaugomis naudojasi trečiasis asmuo,
                                prisijungęs prie el. parduotuvės naudodamasis Pirkėjo prisijungimo duomenimis,
                                Pardavėjas šį asmenį laikome Pirkėju.<br />
                                8.4. Pardavėjas atleidžiamas nuo bet kokios atsakomybės tais atvejais, kai nuostoliai
                                kyla dėl to, jog Pirkėjas, neatsižvelgdamas į Pardavėjo rekomendacijas ir Pirkėjo
                                įsipareigojimus, nesusipažino su šiomis Taisyklėmis, nors tokia galimybė jam buvo
                                suteikta.<br />
                                8.5. Jei Pardavėjo el. parduotuvėje yra nuorodos į kitų įmonių, įstaigų, organizacijų ar
                                asmenų el. tinklalapius, Pardavėjas nėra atsakingas už ten esančią informaciją ar
                                vykdomą veiklą, tų tinklapių neprižiūri, nekontroliuoja ir toms įmonėms bei asmenims
                                neatstovauja.<br />
                                8.6. Atsiradus žalai, kaltoji Šalis atlygina kitai Šaliai tiesioginius nuostolius.<br />
                                9. Baigiamosios nuostatos.<br />
                                9.1. Šios prekių / paslaugų pirkimo – pardavimo Taisyklės sudarytos vadovaujantis LR
                                įstatymais ir teisės aktais.<br />
                                9.2. Visi nesutarimai, kilę dėl šių Taisyklių vykdymo, sprendžiami derybų būdu.
                                Nepavykus susitarti, ginčai sprendžiami LR įstatymų nustatyta tvarka.<br />
                            @elseif ($lang == 'ru')
                                1. Общие положения.<br />
                                1.1. Настоящие правила купли-продажи товаров/услуг (далее – Правила) являются обязательным
                                для Сторон юридическим документом, определяющим права, обязанности и ответственность
                                Покупателя и Продавца при приобретении Покупателем товаров/услуг в электронной форме. почта.
                                в магазине.<br />
                                1.2. Продавец оставляет за собой право изменять, исправлять или дополнять правила в любое
                                время с учетом требований, установленных правовыми актами. Покупатель информируется по
                                электронной почте. на сайте магазина. Когда покупатель делает покупки по электронной почте
                                магазин применяет Правила, действующие на момент оформления заказа.<br />
                                1.3. Купить электронную почту в магазине имеет право:<br />
                                1.3.1. трудоспособные физические лица, то есть лица, достигшие совершеннолетия,
                                дееспособность которых не ограничена в судебном порядке;<br />
                                1.3.2. несовершеннолетние в возрасте от 14 до 18 лет - только с согласия их родителей или
                                опекунов, за исключением случаев, когда они самостоятельно распоряжаются своими
                                доходами;<br />
                                1.3.3. юридические лица;<br />
                                1.3.4. уполномоченные представители всех вышеперечисленных лиц.<br />
                                1.4. Утверждая правила, продавец также гарантирует, что на основании правил 1.3. пункт,
                                Покупатель имеет право приобретать товары/услуги по электронной почте. в магазине.<br />
                                1.5. Договор между Покупателем и Продавцом считается заключенным с момента отправки
                                Покупателем электронного письма после создания в магазине корзины товаров/услуг,
                                ознакомления с правилами Продавца, нажмите кнопку "Подтвердить заказ" (см. пункт 5 "Заказ
                                товаров/услуг, цены, порядок оплаты, сроки").<br />
                                1.6. Каждый договор, заключенный между Покупателем и Продавцом, хранится в электронном виде.
                                в магазине.<br />
                                2. Защита персональных данных.<br />
                                2.1. Заказ товаров/услуг по электронной почте. В магазине Покупатель может
                                зарегистрироваться, используя этот адрес электронной почты. в магазине - введя данные,
                                запрошенные при регистрации;<br />
                                2.2. При заказе товаров/услуг Покупатель обязан указать персональные данные Покупателя,
                                необходимые для надлежащего оформления заказа, в соответствующих информационных полях,
                                предоставленных Продавцом.<br />
                                2.3. Утверждая настоящие правила, Покупатель соглашается с тем, что 2.2. Персональные данные
                                Покупателя, указанные в пункте, будут обрабатываться при электронной продаже товаров/услуг.
                                в магазине, в целях анализа деятельности Продавца и прямого маркетинга.<br />
                                2.4. Покупатель, регистрирующийся по электронной почте в магазине и при заказе товаров/услуг
                                обязуется хранить и никому не разглашать данные для входа.<br />
                                3. Права и обязанности покупателя.<br />
                                3.1. Покупатель имеет право приобретать товары/услуги по электронной почте. в магазине
                                настоящих Правил и других статей этого письма в соответствии с порядком, установленным в
                                разделах информации о магазине.<br />
                                3.2. Покупатель вправе отказаться от заключения договора купли-продажи товаров/услуг с эл.
                                магазине, уведомив об этом Продавца в письменной форме (по электронной почте с указанием
                                желаемого товара/услуги, подлежащего возврату и его номера заказа), если товар/услуга не
                                соответствует адресу электронной почты описание товара/услуги, предоставленной в магазине
                                (ненадлежащего качества) не позднее, чем в течение 14 рабочих дней.<br />
                                3.3. Покупатель с помощью электронной почты store, соглашается с настоящими Правилами
                                купли-продажи и обязуется их соблюдать и не нарушать правовые акты Литовской
                                Республики.<br />
                                4. Права и обязанности продавца.<br />
                                4.1. Продавец обязуется обеспечить все условия для надлежащего использования электронной
                                почты покупателем. услуги, предоставляемые магазином.<br />
                                4.2. Если Покупатель пытается навредить электронной почте Продавца для стабильности и
                                безопасности работы магазина или нарушает свои обязательства, Продавец вправе немедленно и
                                без предупреждения ограничить или приостановить возможность использования Покупателем
                                электронной почты. хранить или, в исключительных случаях, отменить регистрацию
                                Покупателя.<br />
                                4.3. Продавец обязуется соблюдать право Покупателя на неприкосновенность частной жизни
                                личной информации Покупателя, указанной в электронном письме. в форме регистрации
                                магазина.<br />
                                5. Заказ товаров/услуг, цены, порядок оплаты, сроки.<br />
                                5.1. В эинтернет-магазине Покупатель может совершать покупки 24 часа в сутки, 7 дней в
                                неделю..<br />
                                5.2. Договор вступает в силу с момента нажатия Покупателем кнопки «Подтвердить заказ».<br />
                                5.3. Цены на товары/услуги по электронной почте в магазине и в сформированном заказе указаны
                                в евро с учетом НДС.<br />
                                5.4. Покупатель оплачивает товары/услуги с помощью системы онлайн-банкинга (Paysera).<br />
                                5.5. Только после получения оплаты за товары/услуги начинает формироваться заказ и начинает
                                рассчитываться срок поставки товаров/услуг.<br />
                                6. Качество товаров/услуг, гарантии.<br>
                                6.1 Подробная информация о каждом товаре/услуге, продаваемом в интернет-магазине, обычно
                                указывается в описании товара, прилагаемом к каждому товару/услуге.<br>
                                6.2 Продавец предоставляет гарантию качества на определенные виды товаров/услуг, действующую
                                в течение определенного периода времени, конкретный срок и другие условия которой указаны в
                                описаниях таких товаров/услуг.<br>
                                6.3 Если Продавец не предоставляет гарантию качества на определенные виды товаров/услуг,
                                применяется гарантия, предусмотренная соответствующим законодательством.<br>
                                7. Возврат и обмен товаров/услуг.<br>
                                7.1 Для того чтобы вернуть Товары/Услуги, Покупатель может сделать это в течение 14
                                (четырнадцати) рабочих дней с даты доставки Товаров/Услуг Покупателю, сообщив об этом
                                Продавцу по средствам связи, указанным в разделе контакты, указав наименование возвращаемых
                                Товаров/Услуг, номер заказа и причины возврата.<br>
                                В случае расторжения Договора Продавец обязуется вернуть сумму, уплаченную Покупателем
                                (товар/услуга, не соответствующий описанию товара/услуги в интернет-магазине, считается
                                некачественным). Возврат товара/услуги в таком случае должен быть организован продавцом. По
                                взаимному соглашению между продавцом и покупателем некачественный товар/услуга может быть
                                заменен на качественный.<br>
                                8. Обязанности покупателя и продавца.<br>
                                8.1 Покупатель несет полную ответственность за точность личных данных, предоставленных
                                Покупателем. Если Покупатель не предоставляет точные личные данные в регистрационной форме,
                                Продавец не несет ответственности за последствия этого и имеет право требовать от Покупателя
                                прямого возмещения убытков.<br>
                                8.2 Покупатель несет ответственность за действия, совершенные с использованием данного
                                интернет-магазина.<br>
                                8.3 После регистрации Покупатель несет ответственность за передачу своих регистрационных
                                данных третьим лицам. Если третье лицо пользуется услугами, предоставляемыми
                                интернет-магазином, войдя в интернет-магазин с использованием регистрационных данных
                                Покупателя, Продавец рассматривает это лицо как Покупателя.<br>
                                8.4 Продавец освобождается от ответственности в случаях, когда убытки вызваны тем, что
                                Покупатель не ознакомился с настоящими Условиями, несмотря на рекомендации Продавца и
                                обязательства Покупателя, даже если Покупателю была предоставлена возможность сделать
                                это.<br>
                                8.5 Если интернет-магазин Продавца содержит ссылки на электронные сайты других компаний,
                                учреждений, организаций или лиц, Продавец не несет ответственности за содержащуюся на них
                                информацию или осуществляемую на них деятельность и не поддерживает, не контролирует и не
                                представляет такие компании и лица.<br>
                                8.6 В случае ущерба виновная сторона возмещает другой стороне прямой ущерб.<br>
                                9. Заключительные положения.<br>
                                9.1 Настоящие Условия продажи и приобретения товаров/услуг составлены в соответствии с
                                законами и правилами Литовской Республики.<br>
                                9.2 Все разногласия, возникающие при выполнении настоящих Положений и условий, должны
                                решаться путем переговоров. В случае недостижения соглашения споры разрешаются в порядке,
                                установленном законодательством Литовской Республики.<br>
                            @else
                                1. General provisions.<br />
                                1.1. These rules for the purchase and sale of goods / services (hereinafter - the Rules) are
                                a legal document binding on the Parties, which determine the rights, duties and
                                responsibilities of the Buyer and the Seller when the Buyer purchases goods / services by
                                e-mail. in the store.<br />
                                1.2. The seller reserves the right to change, correct or add to the rules at any time,
                                taking into account the requirements set by legal acts. The buyer is informed by e-mail. on
                                the store's website. When the buyer is shopping by e-mail the store applies the Rules valid
                                at the time of placing the order.<br />
                                1.3. Buy e-mail in the store has the right:<br />
                                1.3.1. able-bodied natural persons, i.e. persons who have reached the age of majority, whose
                                capacity is not limited by court order;<br />
                                1.3.2. minors between the ages of 14 and 18, only with the consent of their parents or
                                guardians, except in cases where they dispose of their income independently;<br />
                                1.3.3. legal entities;<br />
                                1.3.4. authorized representatives of all the above persons.<br />
                                1.4. By approving the rules, the seller also guarantees that, based on the rules 1.3. point,
                                the Buyer has the right to purchase goods/services by e-mail. in the store.<br />
                                1.5. The contract between the Buyer and the Seller is considered concluded from the moment
                                the Buyer e-mails after creating a basket of goods/services in the store, familiarizing
                                himself with the Seller's rules, click the "Confirm order" button (see point 5 "Ordering
                                goods/services, prices, payment procedure, terms").<br />
                                1.6. Each contract concluded between the Buyer and the Seller is stored electronically. in
                                the store.<br />
                                2. Protection of personal data.<br />
                                2.1. Order goods/services by e-mail. In the store, the Buyer can register by using this
                                e-mail. in the store - by entering the data requested during registration;<br />
                                2.2. When ordering goods/services, the Buyer must specify the Buyer's personal data
                                necessary for the proper execution of the order in the relevant information fields provided
                                by the Seller.<br />
                                2.3. By approving these rules, the Buyer agrees that 2.2. The personal data of the Buyer
                                provided in point would be processed in the electronic sales of goods/services. in the
                                store, for the purposes of analysis of the Seller's activity and direct marketing.<br />
                                2.4. The buyer, registering by e-mail in the store and when ordering goods/services,
                                undertakes to store and not disclose login data to anyone.<br />
                                3. Buyer's rights and obligations.<br />
                                3.1. The buyer has the right to purchase goods/services by e-mail. in the store of these
                                Rules and other articles of this e-mail according to the order set in the store information
                                sections.<br />
                                3.2. The buyer has the right to refuse the goods/services purchase - sales contract with e.
                                store, notifying the Seller about it in writing (by e-mail, indicating the desired
                                product/service to be returned and its order number), if the product/service does not
                                correspond to the e-mail description of the product/service provided in the store (is of
                                poor quality) no later than within 14 working days.<br />
                                3.3. The buyer using e-mail store, agrees with these Purchase and Sale Rules and undertakes
                                to comply with them and not to violate the legal acts of the Republic of Lithuania.<br />
                                4. Seller's rights and obligations.<br />
                                4.1. The seller undertakes to provide all conditions for the proper use of e-mail by the
                                buyer. services provided by the store.<br />
                                4.2. If the Buyer tries to harm the Seller's e-mail for the stability and security of the
                                store's work or violates its obligations, the Seller has the right to immediately and
                                without warning limit or suspend the Buyer's ability to use e-mail. store or, in exceptional
                                cases, cancel the Buyer's registration.<br />
                                4.3. The Seller undertakes to respect the Buyer's privacy right to the Buyer's personal
                                information specified in the e-mail. in the store registration form.<br />
                                5. Ordering goods/services, prices, payment procedure, deadlines.<br />
                                5.1. In the e-shop, the Buyer can buy 24 hours a day, 7 days a week.<br />
                                5.2. The contract comes into force from the moment the Buyer clicks the "Confirm order"
                                button.</br>
                                5.3. Prices of goods/services by e-mail in the store and in the formed order are indicated
                                in euros, including VAT.<br />
                                5.4. The buyer pays for the goods/services using the online banking system (Paysera).<br />
                                5.5. Only after receiving the payment for the goods/services, the order begins to be formed
                                and the deadline for the delivery of the goods/services begins to be calculated.<br />
                                6. Quality of Goods/Services, Guarantees.<br>
                                6.1 The details of each product/service sold in the e-shop are generally set out in the
                                product description accompanying each product/service.<br>
                                6.2 The Seller shall provide a quality guarantee for certain types of goods/services, valid
                                for a certain period of time, the specific term and other conditions of which shall be
                                specified in the descriptions of such goods/services.<br>
                                6.3 If the Seller does not provide a quality guarantee for certain types of goods/services,
                                the guarantee provided for by the relevant legislation shall apply.<br>
                                7. Return and exchange of goods/services.<br>
                                7.1 In order to return the Goods/Services, the Buyer may do so within 14 (fourteen) working
                                days from the date of delivery of the Goods/Services to the Buyer, by informing the Seller
                                by the means of communication specified in the contact section, indicating the name of the
                                Goods/Services to be returned, the order number and the reasons for the return.<br>
                                In the event of termination of the Contract, the Seller undertakes to refund the amount paid
                                by the Buyer (a product/service that does not correspond to the description of the
                                product/service in the e-shop is considered to be of poor quality). The return of the
                                product/service in such a case shall be arranged by the seller. By mutual agreement between
                                the seller and the buyer, the defective product/service may be replaced by a quality
                                one.<br>
                                8. Responsibilities of the buyer and seller.<br>
                                8.1 The Buyer is fully responsible for the accuracy of the personal data provided by the
                                Buyer. If the Buyer fails to provide accurate personal data in the registration form, the
                                Seller shall not be liable for the consequences thereof and shall be entitled to claim
                                direct damages from the Buyer.<br>
                                8.2 The Buyer shall be liable for the actions carried out using this e-shop.<br>
                                8.3 Once registered, the Buyer is liable for the transmission of his/her login data to third
                                parties. If a third party uses the services provided by the e-shop by logging in to the
                                e-shop using the Buyer's login data, the Seller shall consider this person as the Buyer.<br>
                                8.4 The Seller shall be exempt from any liability in cases where the loss is caused by the
                                Buyer's failure to read these Terms and Conditions, notwithstanding the Seller's
                                recommendations and the Buyer's obligations, even though the Buyer was given the opportunity
                                to do so.<br>
                                8.5 If the Seller's e-shop contains links to the e-sites of other companies, institutions,
                                organisations or persons, the Seller is not responsible for the information contained
                                therein or the activities carried out therein and does not maintain, control or represent
                                such companies and persons.<br>
                                8.6 In the event of damage, the Party at fault shall indemnify the other Party against
                                direct damages.<br>
                                9. Final Provisions.<br>
                                9.1 These Terms and Conditions of Sale and Purchase of Goods/Services are made in accordance
                                with the laws and regulations of the Republic of Lithuania.<br>
                                9.2 All disagreements arising from the performance of these Terms and Conditions shall be
                                settled by negotiation. In the event of failure to reach an agreement, disputes shall be
                                settled in accordance with the procedure established by the laws of the Republic of
                                Lithuania.<br>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
