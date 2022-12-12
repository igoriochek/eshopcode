@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'termsofservice',
        'secondPageName' => __('menu.termsofservice'),
        'hasThirdPage' => false
    ])
    <div class="container product-section my-4">

        @if($lang=="lt")
            <h3 class="mb-4">ELEKTRONINĖS PREKYBOS TAISYKLĖS</h3>

            <p>1. Bendrosios nuostatos.<br/>
                1.1. Šios prekių / paslaugų pirkimo – pardavimo taisyklės (toliau – Taisyklės) yra Šalims privalomas teisinis dokumentas, kuris nustato Pirkėjo ir Pardavėjo teises, pareigas ir atsakomybę Pirkėjui įsigyjant prekes / paslaugas el. parduotuvėje.<br/>
                1.2. Pardavėjas pasilieka teisę bet kuriuo metu pakeisti, taisyti ar papildyti taisykles, atsižvelgdamas į teisės aktų nustatytus reikalavimus. Pirkėjas informuojamas el. parduotuvės tinklalapyje. Pirkėjui apsiperkant el. parduotuvėje taikomos Taisyklės, galiojančios užsakymo pateikimo metu.<br/>
                1.3. Pirkti el. parduotuvėje turi teisę:<br/>
                1.3.1. veiksnūs fiziniai asmenys, t.y., asmenys sulaukę pilnametystės, kurių veiksnumas nėra apribotas teismo tvarka;<br/>
                1.3.2. nepilnamečiai nuo 14 iki 18 metų amžiaus, tik turėdami tėvų arba rūpintojų sutikimą, išskyrus tuos atvejus, kai jie savarankiškai disponuoja savo pajamomis;<br/>
                1.3.3. juridiniai asmenys;<br/>
                1.3.4. visų aukščiau nurodytų asmenų įgaliotieji atstovai.<br/>
                1.4. Pardavėjas, patvirtindamas taisykles, taip pat garantuoja, kad, remiantis taisyklių 1.3. punktu, Pirkėjas turi teisę pirkti prekes / paslaugas el. parduotuvėje.<br/>
                1.5. Sutartis tarp Pirkėjo ir Pardavėjo laikoma sudaryta nuo to momento, kai Pirkėjas el. parduotuvėje suformavęs prekių / paslaugų krepšelį, susipažinęs su Pardavėjo taisyklėmis, paspaudžia mygtuką „Patvirtinti užsakymą“ (žr. 5 punktą „Prekių / Paslaugų užsakymas, kainos, atsiskaitymo tvarka, terminai“).<br/>
                1.6. Kiekviena sutartis, sudaryta tarp Pirkėjo ir Pardavėjo, yra saugoma el. parduotuvėje.<br/>
                2. Asmens duomenų apsauga.<br/>
                2.1. Užsisakyti prekes / paslaugas el. parduotuvėje Pirkėjas gali užsiregistruodamas šioje el. parduotuvėje – įvesdamas registracijoje prašomus duomenis;<br/>
                2.2. Pirkėjas, užsakydamas prekes / paslaugas, atitinkamuose Pardavėjo pateikiamuose informacijos laukuose turi nurodyti užsakymo tinkamam įvykdymui būtinus Pirkėjo asmens duomenis.<br/>
                2.3. Patvirtindamas šias taisykles Pirkėjas sutinka, jog 2.2. punkte pateikti Pirkėjo asmens duomenys būtų tvarkomi prekių / paslaugų pardavimo el. parduotuvėje, Pardavėjo veiklos analizės ir tiesioginės rinkodaros tikslais.<br/>
                2.4. Pirkėjas, užsiregistruodamas el. parduotuvėje bei užsakydamas prekes / paslaugas, įsipareigoja saugoti ir niekam neatskleisti prisijungimo duomenų.<br/>
                3. Pirkėjo teisės ir įsipareigojimai.<br/>
                3.1. Pirkėjas turi teisę pirkti prekes / paslaugas el. parduotuvėje šių Taisyklių ir kitose šios el. parduotuvės informacijos skiltyse nustatyta tvarka.<br/>
                3.2. Pirkėjas turi teisę atsisakyti prekių / paslaugų pirkimo – pardavimo sutarties su el. parduotuve, pranešdamas Pardavėjui apie tai raštu (el. paštu, nurodant pageidaujamą grąžinti prekę / paslaugą ir jos užsakymo numerį), jeigu prekė / paslauga neatitinka el. parduotuvėje pateikto prekės / paslaugos aprašymo (yra nekokybiška) ne vėliau kaip per 14 darbo dienų.<br/>
                3.3. Pirkėjas, naudodamasis el. parduotuve, sutinka su šiomis pirkimo - pardavimo Taisyklėmis ir įsipareigoja jų laikytis bei nepažeisti LR teisės aktų.<br/>
                4. Pardavėjo teisės ir įsipareigojimai.<br/>
                4.1. Pardavėjas įsipareigoja sudaryti visas sąlygas Pirkėjui tinkamai naudotis el. parduotuvės teikiamomis paslaugomis.<br/>
                4.2. Jei Pirkėjas bando pakenkti Pardavėjo el. parduotuvės darbo stabilumui ir saugumui ar pažeidžia savo įsipareigojimus, Pardavėjas turi teisę nedelsiant ir be perspėjimo apriboti ar sustabdyti Pirkėjo galimybę naudotis el. parduotuve arba išskirtiniais atvejais panaikinti Pirkėjo registraciją.<br/>
                4.3. Pardavėjas įsipareigoja gerbti Pirkėjo privatumo teisę į Pirkėjo priklausančią asmeninę informaciją, nurodytą el. parduotuvės registracijos formoje.<br/>
                5. Prekių / Paslaugų užsakymas, kainos, atsiskaitymo tvarka, terminai.<br/>
                5.1. El. parduotuvėje Pirkėjas gali pirkti visą parą, 7 dienas per savaitę.<br/>
                5.2. Sutartis pradeda galioti nuo to momento, kai Pirkėjas paspaudžia mygtuką „Patvirtinti užsakymą.<br/>
                5.3. Prekių / Paslaugų kainos el. parduotuvėje ir suformuotame užsakyme nurodomos eurais, įskaitant PVM.<br/>
                5.4. Pirkėjas atsiskaito už prekes / paslaugas naudojantis internetinės bankininkystės sistema (Paysera).<br/>
                5.5. Pristatymo terminai. Pristatymo terminas 5 dienos. Dėl didelio užsakymo skaičiaus gali vėluoti pristatymo terminas iki 14 dienų.<br/>
                6. Prekių / Paslaugų kokybės, garantijos.<br/>
                6.1. Kiekvienos el. parduotuvėje parduodamos prekės / paslaugos duomenys bendrai nurodomi prie kiekvienos prekės / paslaugos esančiame prekės aprašyme.<br/>
                6.2. Pardavėjas tam tikroms prekių / paslaugų rūšims suteikia tam tikrą laiką galiojančią kokybės garantiją, kurios konkretus terminas ir kitos sąlygos nurodomos tokių prekių / paslaugų aprašymuose.<br/>
                6.3. Pardavėjui tam tikroms prekių / paslaugų rūšims nesuteikus kokybės garantijos, galioja garantija, numatyta atitinkamų teisės aktų.<br/>
                7. Prekių / paslaugų grąžinimas ir keitimas.<br/>
                7.1. Norėdamas grąžinti prekes / paslaugas, Pirkėjas gali tai padaryti per 14 (keturiolika) darbo dienų nuo prekių pristatymo / paslaugos suteikimo Pirkėjui dienos, informuodamas Pardavėją kontaktų skyriuje nurodytomis susisiekimo priemonėmis, nurodant grąžinamos prekės / paslaugos pavadinimą, užsakymo numerį ir grąžinimo priežastis.<br/>
                Nutraukiant sutartį, pardavėjas įsipareigoja grąžinti pirkėjo įmokėtą sumą (nekokybiška preke / paslauga laikoma el. parduotuvėje prekės / paslaugos aprašymo neatitinkanti prekė / paslauga). Prekės / paslaugos grąžinimą tokiu atveju organizuoja pardavėjas. Esant bendram pardavėjo ir pirkėjo susitarimui, nekokybiška prekė / paslauga gali būti pakeista į kokybišką.<br/>
                8. Pirkėjo ir pardavėjo atsakomybė.<br/>
                8.1. Pirkėjas yra visiškai atsakingas už Pirkėjo pateikiamų asmens duomenų teisingumą. Jei Pirkėjas nepateikia tikslių asmens duomenų registracijos formoje, Pardavėjas neatsako už dėl to atsiradusius padarinius ir įgyja teisę reikalauti iš Pirkėjo patirtų tiesioginių nuostolių atlyginimo.<br/>
                8.2. Pirkėjas atsako už veiksmus, atliktus naudojantis šia el. parduotuve.<br/>
                8.3. Užsiregistravęs Pirkėjas atsako už savo prisijungimo duomenų perdavimą tretiesiems asmenims. Jei el. parduotuvės teikiamomis paslaugomis naudojasi trečiasis asmuo, prisijungęs prie el. parduotuvės naudodamasis Pirkėjo prisijungimo duomenimis, Pardavėjas šį asmenį laikome Pirkėju.<br/>
                8.4. Pardavėjas atleidžiamas nuo bet kokios atsakomybės tais atvejais, kai nuostoliai kyla dėl to, jog Pirkėjas, neatsižvelgdamas į Pardavėjo rekomendacijas ir Pirkėjo įsipareigojimus, nesusipažino su šiomis Taisyklėmis, nors tokia galimybė jam buvo suteikta.<br/>
                8.5. Jei Pardavėjo el. parduotuvėje yra nuorodos į kitų įmonių, įstaigų, organizacijų ar asmenų el. tinklalapius, Pardavėjas nėra atsakingas už ten esančią informaciją ar vykdomą veiklą, tų tinklapių neprižiūri, nekontroliuoja ir toms įmonėms bei asmenims neatstovauja.<br/>
                8.6. Atsiradus žalai, kaltoji Šalis atlygina kitai Šaliai tiesioginius nuostolius.<br/>
                9. Baigiamosios nuostatos.<br/>
                9.1. Šios prekių / paslaugų pirkimo – pardavimo Taisyklės sudarytos vadovaujantis LR įstatymais ir teisės aktais.<br/>
                9.2. Visi nesutarimai, kilę dėl šių Taisyklių vykdymo, sprendžiami derybų būdu. Nepavykus susitarti, ginčai sprendžiami LR įstatymų nustatyta tvarka.<br/>
            </p>
        @elseif ($lang == "ru")
            <h3 class="mb-4">ПРАВИЛА ЭЛЕКТРОННОЙ ТОРГОВЛИ</h3>

            <p>
                1. Общие положения.<br/>
                1.1 Настоящие Положения и условия продажи товаров/услуг (далее "Положения и условия") являются обязательным для сторон юридическим документом, в котором изложены права, обязанности и ответственность Покупателя и Продавца при покупке Покупателем товаров/услуг в интернет-магазине.<br/>
                1.2 Продавец оставляет за собой право в любое время изменять, дополнять или изменять Правила с учетом требований законодательства. Покупатель должен быть проинформирован об этом на сайте интернет-магазина. Когда Покупатель совершает покупки в интернет-магазине, применяются Правила, действующие на момент размещения заказа.<br/>
                1.3 Право совершать покупки в интернет-магазине имеют следующие лица:<br/>
                1.3.1. дееспособные физические лица, т.е. лица, достигшие совершеннолетия и чья дееспособность не была ограничена по решению суда;<br/>
                1.3.2. несовершеннолетние в возрасте от 14 до 18 лет, только с согласия их родителей или опекунов, если они не являются самостоятельными в плане дохода;<br/>
                1.3.3. юридические лица;<br/>
                1.3.4. уполномоченные представители всех вышеперечисленных организаций.<br/>
                1.4 Принимая Правила, Продавец также гарантирует, что в соответствии с пунктом 1.3 Правил Покупатель имеет право приобретать товары/услуги в интернет-магазине.<br/>
                1.5 Договор между Покупателем и Продавцом считается заключенным с момента, когда Покупатель, создав корзину товаров/услуг в интернет-магазине и ознакомившись с правилами Продавца, нажимает на кнопку "Подтвердить заказ" (см. пункт 5, "Заказ товаров/услуг, цены, порядок оплаты, сроки").<br/>
                1.6 Каждый договор, заключенный между Покупателем и Продавцом, хранится в электронном магазине.<br/>
                2. Защита персональных данных.<br/>
                2.1 Покупатель может заказать товары/услуги в интернет-магазине, зарегистрировавшись в интернет-магазине и введя данные, запрашиваемые при регистрации;<br/>
                2.2 При заказе товаров/услуг Покупатель обязан указать личные данные Покупателя, необходимые для надлежащего исполнения заказа, в соответствующих информационных полях, предоставленных Продавцом.<br/>
                2.3 Принимая настоящие Условия, Покупатель соглашается на обработку персональных данных Покупателя, указанных в п. 2.2, для целей продажи товаров/услуг в интернет-магазине, для целей анализа деятельности Продавца и для целей прямого маркетинга.<br/>
                2.4 Зарегистрировавшись в интернет-магазине и заказав товары/услуги, Покупатель обязуется защищать и никому не разглашать данные для входа в систему.<br/>
                3. Права и обязанности Покупателя.<br/>
                3.1 Покупатель имеет право приобретать товары/услуги в интернет-магазине в соответствии с процедурой, изложенной в настоящих Условиях и других информационных разделах данного интернет-магазина.<br/>
                3.2 Покупатель имеет право отказаться от договора о покупке товаров/услуг с интернет-магазином, письменно уведомив продавца (по электронной почте, с указанием возвращаемого товара/услуги и номера заказа), если товар/услуга не соответствует описанию товара/услуги, представленному в интернет-магазине (является некачественным) не позднее, чем в течение 14 рабочих дней.<br/>
                3.3 Используя интернет-магазин, Покупатель соглашается с настоящими Условиями продажи и покупки и обязуется соблюдать их и не нарушать законодательство Литовской Республики.<br/>
                4. Права и обязанности продавца.<br/>
                4.1 Продавец обязуется обеспечить все условия для надлежащего использования Покупателем услуг, предоставляемых интернет-магазином.<br/>
                4.2 Если Покупатель пытается подорвать стабильность и безопасность интернет-магазина Продавца или нарушает свои обязательства, Продавец имеет право ограничить или приостановить доступ Покупателя к интернет-магазину или, в исключительных случаях, отменить регистрацию Покупателя, немедленно и без предупреждения.<br/>
                4.3 Продавец обязуется соблюдать право Покупателя на неприкосновенность частной жизни в отношении принадлежащей Покупателю личной информации, указанной в регистрационной форме электронного магазина.<br/>
                5. Заказ товаров/услуг, цены, порядок оплаты, сроки.<br/>
                5.1 Покупатель может совершать покупки в интернет-магазине 24 часа в сутки, 7 дней в неделю.<br/>
                5.2 Договор начинает действовать с момента нажатия Покупателем кнопки "Подтвердить заказ".<br/>
                5.3 Цены на Товары/Услуги в интернет-магазине и в форме заказа указаны в евро, включая НДС.<br/>
                5.4 Покупатель оплачивает Товары/Услуги с помощью системы онлайн-банкинга (Paysera).<br/>
                5.5 Сроки поставки. Срок поставки 5 дней. В связи с большим количеством заказов доставка может быть задержана до 14 дней.<br/>
                6. Качество товаров/услуг, гарантии.<br/>
                6.1 Подробная информация о каждом товаре/услуге, продаваемом в интернет-магазине, обычно указывается в описании товара, прилагаемом к каждому товару/услуге.<br/>
                6.2 Продавец предоставляет гарантию качества на определенные виды товаров/услуг, действующую в течение определенного периода времени, конкретный срок и другие условия которой указаны в описаниях таких товаров/услуг.<br/>
                6.3 Если Продавец не предоставляет гарантию качества на определенные виды товаров/услуг, применяется гарантия, предусмотренная соответствующим законодательством.<br/>
                7. Возврат и обмен товаров/услуг.<br/>
                7.1 Для того чтобы вернуть Товары/Услуги, Покупатель может сделать это в течение 14 (четырнадцати) рабочих дней с даты доставки Товаров/Услуг Покупателю, сообщив об этом Продавцу по средствам связи, указанным в разделе контакты, указав наименование возвращаемых Товаров/Услуг, номер заказа и причины возврата.<br/>
                В случае расторжения Договора Продавец обязуется вернуть сумму, уплаченную Покупателем (товар/услуга, не соответствующий описанию товара/услуги в интернет-магазине, считается некачественным). Возврат товара/услуги в таком случае должен быть организован продавцом. По взаимному соглашению между продавцом и покупателем некачественный товар/услуга может быть заменен на качественный.<br/>
                8. Обязанности покупателя и продавца.<br/>
                8.1 Покупатель несет полную ответственность за точность личных данных, предоставленных Покупателем. Если Покупатель не предоставляет точные личные данные в регистрационной форме, Продавец не несет ответственности за последствия этого и имеет право требовать от Покупателя прямого возмещения убытков.<br/>
                8.2 Покупатель несет ответственность за действия, совершенные с использованием данного интернет-магазина.<br/>
                8.3 После регистрации Покупатель несет ответственность за передачу своих регистрационных данных третьим лицам. Если третье лицо пользуется услугами, предоставляемыми интернет-магазином, войдя в интернет-магазин с использованием регистрационных данных Покупателя, Продавец рассматривает это лицо как Покупателя.<br/>
                8.4 Продавец освобождается от ответственности в случаях, когда убытки вызваны тем, что Покупатель не ознакомился с настоящими Условиями, несмотря на рекомендации Продавца и обязательства Покупателя, даже если Покупателю была предоставлена возможность сделать это.<br/>
                8.5 Если интернет-магазин Продавца содержит ссылки на электронные сайты других компаний, учреждений, организаций или лиц, Продавец не несет ответственности за содержащуюся на них информацию или осуществляемую на них деятельность и не поддерживает, не контролирует и не представляет такие компании и лица.<br/>
                8.6 В случае ущерба виновная сторона возмещает другой стороне прямой ущерб.<br/>
                9. Заключительные положения.<br/>
                9.1 Настоящие Условия продажи и приобретения товаров/услуг составлены в соответствии с законами и правилами Литовской Республики.<br/>
                9.2 Все разногласия, возникающие при выполнении настоящих Положений и условий, должны решаться путем переговоров. В случае недостижения соглашения споры разрешаются в порядке, установленном законодательством Литовской Республики.<br/>
            </p>

        @else
            <h3 class="mb-4">ELECTRONIC COMMERCE RULES</h3>

            <p>
                1. General provisions.<br/>
                1.1 These Terms and Conditions of Sale of Goods/Services (hereinafter referred to as the "Terms and Conditions") are a binding legal document for the Parties, which sets out the rights, obligations and responsibilities of the Buyer and the Seller when the Buyer purchases goods/services on the e-shop.<br/>
                1.2 The Seller reserves the right to change, amend or supplement the Rules at any time, taking into account the statutory requirements. The Buyer shall be informed on the e-shop website. When the Buyer shops in the e-shop, the Rules in force at the time of placing the order shall apply.<br/>
                1.3 The following shall be entitled to make purchases in the e-shop:<br/>
                1.3.1. able-bodied natural persons, i.e. persons who have reached the age of majority and whose legal capacity has not been restricted by court order;<br/>
                1.3.2. minors between the ages of 14 and 18, only with the consent of their parents or guardians, unless they are self-sufficient in terms of income;<br/>
                1.3.3. legal persons;<br/>
                1.3.4. authorised representatives of all of the above.<br/>
                1.4 By adopting the Rules, the Seller also warrants that, in accordance with clause 1.3 of the Rules, the Buyer is entitled to purchase goods/services from the e-shop.<br/>
                1.5 The contract between the Buyer and the Seller shall be deemed to have been concluded from the moment the Buyer, after having created a basket of goods/services in the e-shop and having read the Seller's rules, clicks on the "Confirm Order" button (see clause 5, "Ordering of goods/services, prices, payment procedure, terms").<br/>
                1.6 Every contract concluded between the Buyer and the Seller is stored in the e-shop.<br/>
                2. Protection of personal data.<br/>
                2.1 The Buyer may order goods/services in the e-shop by registering in the e-shop by entering the data requested in the registration;<br/>
                2.2 When ordering goods/services, the Buyer must specify the Buyer's personal data necessary for the proper execution of the order in the relevant information fields provided by the Seller.<br/>
                2.3 By accepting these Terms and Conditions, the Buyer agrees to the processing of the Buyer's personal data provided in Clause 2.2 for the purposes of the sale of goods/services in the e-shop, for the purposes of the analysis of the Seller's activities and for direct marketing purposes.<br/>
                2.4 By registering on the e-shop and ordering goods/services, the Buyer undertakes to protect and not to disclose the login data to anyone.<br/>
                3. Buyer's rights and obligations.<br/>
                3.1 The Buyer shall have the right to purchase goods/services in the e-shop in accordance with the procedure set out in these Terms and Conditions and other information sections of this e-shop.<br/>
                3.2 The Buyer has the right to withdraw from the contract for the purchase of goods/services with the e-shop by notifying the Seller in writing (by e-mail, indicating the product/service to be returned and the order number) if the product/service does not correspond to the description of the product/service provided in the e-shop (it is of low quality) not later than within 14 working days.<br/>
                3.3 By using the e-shop, the Buyer agrees to these Terms and Conditions of Sale and Purchase and undertakes to comply with them and not to violate the legislation of the Republic of Lithuania.<br/>
                4. Seller's rights and obligations.<br/>
                4.1 The Seller undertakes to provide all the conditions for the Buyer to properly use the services provided by the e-shop.<br/>
                4.2 If the Buyer attempts to undermine the stability and security of the Seller's e-shop or violates his/her obligations, the Seller shall have the right to restrict or suspend the Buyer's access to the e-shop or, in exceptional cases, to cancel the Buyer's registration, immediately without warning.<br/>
                4.3 The Seller undertakes to respect the Buyer's right to privacy with regard to the personal information belonging to the Buyer, as indicated in the e-shop registration form.<br/>
                5. Ordering of Goods/Services, prices, payment procedure, terms.<br/>
                5.1 The Buyer may make purchases in the e-shop 24 hours a day, 7 days a week.<br/>
                5.2 The Contract shall commence from the moment the Buyer clicks on the "Confirm Order" button.<br/>
                5.3 The prices of the Goods/Services in the e-shop and in the order form are quoted in Euros, including VAT.<br/>
                5.4 The Buyer shall pay for the Goods/Services using the online banking system (Paysera).<br/>
                5.5 Delivery times. Delivery time 5 days. Due to the large number of orders, delivery may be delayed by up to 14 days.<br/>
                6. Quality of Goods/Services, Guarantees.<br/>
                6.1 The details of each product/service sold in the e-shop are generally set out in the product description accompanying each product/service.<br/>
                6.2 The Seller shall provide a quality guarantee for certain types of goods/services, valid for a certain period of time, the specific term and other conditions of which shall be specified in the descriptions of such goods/services.<br/>
                6.3 If the Seller does not provide a quality guarantee for certain types of goods/services, the guarantee provided for by the relevant legislation shall apply.<br/>
                7. Return and exchange of goods/services.<br/>
                7.1 In order to return the Goods/Services, the Buyer may do so within 14 (fourteen) working days from the date of delivery of the Goods/Services to the Buyer, by informing the Seller by the means of communication specified in the contact section, indicating the name of the Goods/Services to be returned, the order number and the reasons for the return.<br/>
                In the event of termination of the Contract, the Seller undertakes to refund the amount paid by the Buyer (a product/service that does not correspond to the description of the product/service in the e-shop is considered to be of poor quality). The return of the product/service in such a case shall be arranged by the seller. By mutual agreement between the seller and the buyer, the defective product/service may be replaced by a quality one.<br/>
                8. Responsibilities of the buyer and seller.<br/>
                8.1 The Buyer is fully responsible for the accuracy of the personal data provided by the Buyer. If the Buyer fails to provide accurate personal data in the registration form, the Seller shall not be liable for the consequences thereof and shall be entitled to claim direct damages from the Buyer.<br/>
                8.2 The Buyer shall be liable for the actions carried out using this e-shop.<br/>
                8.3 Once registered, the Buyer is liable for the transmission of his/her login data to third parties. If a third party uses the services provided by the e-shop by logging in to the e-shop using the Buyer's login data, the Seller shall consider this person as the Buyer.<br/>
                8.4 The Seller shall be exempt from any liability in cases where the loss is caused by the Buyer's failure to read these Terms and Conditions, notwithstanding the Seller's recommendations and the Buyer's obligations, even though the Buyer was given the opportunity to do so.<br/>
                8.5 If the Seller's e-shop contains links to the e-sites of other companies, institutions, organisations or persons, the Seller is not responsible for the information contained therein or the activities carried out therein and does not maintain, control or represent such companies and persons.<br/>
                8.6 In the event of damage, the Party at fault shall indemnify the other Party against direct damages.<br/>
                9. Final Provisions.<br/>
                9.1 These Terms and Conditions of Sale and Purchase of Goods/Services are made in accordance with the laws and regulations of the Republic of Lithuania.<br/>
                9.2 All disagreements arising from the performance of these Terms and Conditions shall be settled by negotiation. In the event of failure to reach an agreement, disputes shall be settled in accordance with the procedure established by the laws of the Republic of Lithuania.<br/>
            </p>
        @endif

    </div>
@endsection
