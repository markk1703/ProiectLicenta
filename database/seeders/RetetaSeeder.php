<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reteta;

class RetetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Creveti la cuptor cu unt, usturoi si patrunjel',
            'ingrediente'=>'500 gr creveti medii (cca 25 bucati), sare, fulgi de chili, 30 gr unt la temp. camerei, 1/4 legatura patrunjel, 2 catei usturoi',
            'mod_de_preparare'=>'Intr-un mojar se pune patrunjelul tocat si usturoiul cu putina sare si se piseaza bine pana aveti ceva similar cu o pasta. Daca nu reusiti sa striviti usor, picurati 1 lingurita de ulei de masline si continuati sa pisati.
            Adaugati untul peste pasta de usturoi si patrunjel si continuati sa pisati pana untul se coloreaz uniform.
            Curatati crevetii de cap si coji, lasati doar codita intacta. Despicati apoi fiecare crevete in jumatate pe partea dinspre spate. NU mergeti cu cutitul pana jos, cele doua jumatati trebuie sa ramana legate. Scoateti firisoul negru care se vede in interiorul crevetelui. Doar trageti de el, iese foarte usor.
            Asezati crevetii intr-o tava in care sa intre pe un singur strat, la distanta de 2 cm unul de altul. Asezati-i cu partea despicata in sus.
            Pe fiecare crevete puneti cate 1/4 de lingurita de unt. Untul ar trebui sa va ajunga la fix pentru cei 25 creveti. Cu dosul linguritei intindeti untul pe toata partea despicata. Presarati putina sare peste tot. Presarati si fulgi de chili.
            Intre timp incingeti cuptorul al 250C. Introduceti tava cu creveti pe nivelul 2 de sub grill-ul cuptorului (sa fie tava cam la o palma sub grill).
            Mutati cuptorul pe optiunea grill (caldura de sus) si lasati 3 minute, pana crevetii devin albiciosi pe partea despicata si portocalii pe cealalta parte si incep sa se deformeze usor.
            Scoateti crevetii pe platou, stoarceti suc de lamaie peste ei si presarati sare grunjoasa de mare. Serviti imediat cu sferturi de lamaie.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg',
            'tags'=>['creveti','unt']
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Salata de naut cu avocado si branza de capra',
            'ingrediente'=>'250 gr naut fiert, 50 gr branza de capra proaspata (cremoasa), 1 avocado, 1 ceapa rosie mica, 1/2 legatura patrunjel, 5 fire marar, coaja rasa de la 1/2 lamaie mica, 2 linguri suc de lamaie, 1-2 linguri ulei masline extravirgin, sare',
            'mod_de_preparare'=>'Se toaca ceapa cubulete marunte. Se pune in bol si se presara putina sare. Se maseaza cu degetele 15 secunde, cat sa se inmoaie un pic.
            Deasupra cepei se adauga nautul. Apoi puneti verdeturile tocate fin si razuiti coaja de lamaie.
            Sfaramarti branza deasupra. Adaugati avocado taiat cubulete. Stoarceti sucul de lamaie peste avocado. Presarati iar putina sare.
            Stropiti totul cu ulei de masline si amestecati. Dregeti de sare. Serviti imediat cu rosii cherry sau cu paine crocanta Wasa, paine taraneasca/prajita sau lipie.',
            'categorii'=>'cat1, cat2, cat3',
            'imagine_principala'=>'avatar.jpg',
            'tags'=>['naut','avocado','branza']
            ]);
        Reteta::create([
            'utilizator_id'=>'1',
            'denumire'=>'Budinca de ovaz cu cacao',
            'ingrediente'=>'200 gr fulgi de ovaz (fulgi normali, nu folositi fulgi fini), 150 gr pulpa de cartofi dulci copti, 2 oua, 35 gr cacao, 1 lingurita praf de copt, 1 priza de sare, 1/2 lingurita scortisoara, 50 ml ulei, 25 gr unt de migdale (sau alt unt de nuci), 100 gr zahar, 400 ml lapte (de vaca sau vegetal)',
            'mod_de_preparare'=>'Fulgii se cantaresc intr-un bol.
            In alt bol se fac cartofii dulciu piure, strivindu-i bine, bine cu furculita. Se adauga ouale si se amesteca cu telul pana la omogenizare.
            Se adauga cacaua, praful de copt, sarea, scortisoara si uleiul (am folosit uleiul de pe untul de migdale, cel care se aduna deasupra in borcan; puteti folosi orice ulei vegetal sau unt topit) si untul de migdale. Se amesteca iar cu telul pana aveti o compozitie ca de brownies.
            Se adauga zaharul si apoi treptat laptele. Amestecul va deveni destul de lichid, e ok asa.
            Se toarna acest amestec peste fulgii de ovaz si se omogenizeaza.
            Se toarna compozitia intr-un vas termorezistent si se coace la 175C timp de 45-55 minute. Verificati cu o scobitoare sa fie facuta in centru.
            Daca doriti, la final presarati bucatele de ciocolata peste budinca si mai lasati 1 minut la cuptor.
            E buna calda, imediat din cuptor sau la temperatura camerei. Se poate reincalzi.',
            'categorii'=>'c1, c2, c3',
            'imagine_principala'=>'avatar.jpg',
            'imagini'=>'1809788879.jpg',
            'tags'=>['ovaz']
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Papanasi',
            'ingrediente'=>'500 gr branza de vaci proaspata (foarte bine scursa, sa aiba bulgarasi), 100 gr zahar, 2 oua, 1/4 lingurita bicarbonat de sodiu, 1 esenta vanilie, 200 gr faina, smantana, dulceata',
            'mod_de_preparare'=>'Branza se amesteca cu zaharul si bicarbonatul. Se incorporeaza apoi ouale si vanilia, iar la sfarsit faina. Puteti amesteca scurt aluatul cu robotelul sau mixerul sa se omogenizeze mai bine!
            *daca branza e mai umeda s-ar putea sa mai aveti nevoie de 1 lingura de faina in compozitie; aluatul trebuie sa fie usor de format, sa nu fie prea lipicios.
            Se pune intr-o tiagie adanca mult ulei la incins.
            Se formeaza din aluat bile de dimensiunea interiorului pumnului.Se strapungebila cu degetul prin centru, apoi treceti bila prin faina. Usor, mariti gaura din mijloc si aplatizati putin colacul obtinut.
            Dati focul la mediu sub tigaie si prajiti papanasii pe ambele parti pana sunt rumeni (aprox 5 minute).
            Serviti papanasii prajiti cu smantana si dulceata.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg',
            'tags'=>['desert']
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Negresa',
            'ingrediente'=>'400 gr faina, 300 gr zahar, 1 pliculet praf de copt, 200 ml cafea preparata (espresso), 110 gr unt, 100 ml ulei, 50 gr cacao (cacao Schmidt am folosit), 2 oua, 100 ml lapte batut, 1 esenta vanilie sau rom (am pus o lingura de rom), 5 batoane Mars, 100 ml smantana pentru frisca',
            'mod_de_preparare'=>'Intr-un vas amestecati foarte bine faina, zaharul si praful de copt.
            Bateti ouale. Pregatiti laptele batut.
            Intr-o craticioara puneti cafeaua, untul, uleiul si cacaoa. Puneti la foc mic, amestecand tot timpul ca sa se omogenizeze amestecul. Cand ajunge la fierbere si da primul clocot, turnati acest sirop peste faina cu zahar. Amestecati rapid.
            Cand siropul e incorporat in mare, adaugati ouale batute. Amestecati iar energic si cand oul nu se mai vede adaugati laptele batut si esenta. Amestecati bine pana aluatul are o culoare omogena. Aluatul va avea consistenta unei lave groase care cade de pe lingura, dar incet.
            Turnati aluatul intr-o tava de 20 x 33 cm, tapetata cu hartie de copt pe care o ungeti cu putin unt. Nivelati aluatul in tava si bateti bine tava de masa sa se aseze uniform.
            * puteti folosi si o tava usor mai mare, fiindca negresele in tava mea au iesit destul de inalte.
            Dati la cuptor la 180C pentru 25 minute. Faceti testul cu scobitoarea pentru a fi siguri ca e gata.
            Scoateti-o din cuptor si lasati-o sa se raceasca.
            Preparam glazura: intr-o craticioara punem batoanele Mars maruntite si frisca. Punem pe foc mic si amestecam mereu pana ciocolata e topita complet. Cand e gata, o luam de pe foc si mai amestecam un pic in ea ca sa fie bine omogenizata si sa se dizolve toate acele bucatele mai albe din interiorul batonului Mars. O lasam inca 5 minute sa se racoreasca. Glazura trebuie sa fie doar calduta si sa se fi ingrosat un pic in acest timp.
            Intre timp prajitura s-a racit si ea, e doar calduta. Taiati-o cuburi de marimea dorita direct in tava. Turnati glazura peste ea si nivelati. Lasati sa se raceasca de tot.',
            'categorii'=>'ca1, ca2, ca3',
            'imagine_principala'=>'avatar.jpg',
            'tags'=>['desert']
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Legume la cuptor cu arpacas',
            'ingrediente'=>'1 dovlecel mic, 1 ardei gras rosu mic, 1 ceapa rosie mica, 3 felii radacina telina, 1 morcov mare, 1 pastarnac, 6 linguri cu varf arpacas fiert, 20 gr ghimbir, 2-3 linguri ulei, sare, piper negru, chili',
            'mod_de_preparare'=>'Se curata morcovii, ceapa, telina, pastarnacul. Ceapa se taie pestisori. Restul legumelor se taie betisoare nu extrem de subtiri, doar morcovii sa fie un pic mai subtiri decat restul fiindca se fac mai greu.
            Se imprastie legumele in tava cuptorului acoperita cu hartie de copt. Se pesara sare, piper negru, fulgi de chili. Se toarna 1 lingura de ulei. Se amesteca bine si apoi se niveleaza legumele in tava sa fie egal distribuite.
            Se coc la 200C, cam 35-40 minute.Verificati sa fie facuti morcovii si telina, daca ele sunt ok si restul sunt gata.
            Intr-o tigaie larga se incing 1-2 linguri de ulei si se adauga ghimbirul dat pe razatoarea mica. Se soteaza 30 secunde, apoi se adauga arpacasul fiert. Se soteaza rapid, la foc mare pana arpacasul e fierbinte. Se drege de sare.
            * daca nu aveti timp sa fierbeti arpacas, puteti sa-l inlocuiti cu bulgur mare fiert sau orez integral fiert.
            Cand legumele sunt gata, scoateti tava din cuptor. Turnati arpacasul aromatizat peste legume si amestecati usor. Rasniti piper negru si mai adaugati sare daca trebuie.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Salata cu somon marinat',
            'ingrediente'=>'350 gr somon file, 1 lamaie mare si zemoasa (e nevoie de 7-8 linguri suc de lamaie), 2 linguri otet (de mere sau sherry), 3 linguri ulei masline extravirgin, 4 fire marar, sare, fulgi de chili, piper negru,1 capatana salata verde, 4 fire ceapa verde tanara, 1 fenicul mai mic, 2 linguri suc de lamaie
            sare',
            'mod_de_preparare'=>'Se curata fileul de somon de piele. Cu un cutit super ascutit se taie pe latime fasii cat mai subtiri. Se aseaza fasiile pe un platou uso mai adanc, unele langa altele, dar fara sa le suprapuneti.
            Se amesteca 7-8 linguri suc de lamaie cu otetul si se toarna peste feliile de somon. Se maseaza usor cu mana ca sa ajunga lichidul peste tot. Se acopera cu folie de plastic si sa da la frigider cam 4 ore.
            Verificati ca feliile de peste sa isi fi schimbat culoarea peste tot, rupeti o bucata si verificati si in interior. Peste tot trebuie sa aveti culoarea roz-deschis a somonului gatit, sa nu mai vedeti zone portocalii. Veti simti ca feliile au devenit usor mai ferme, nu mai sunt asa delicate ca si cand erau crude. Practic somonul s-a gatit in acidul sucului de lamaie si otet. Daca inca mai vedeti zone portocalii, mai masati fasiile cu lichidul de pe ele si mai lasati la frigider pana sunt marinate de tot (verificati tot la jumatate de ora de acum).
            Treceti fasiile sub jet de apa, direct pe platou, trebuie doar sa se scurga lichidul in care s-au marinat. Presati apoi cu servetele de bucatarie sa absorbiti excesul de apa.
            Mutati fasiile de peste intr-un bol incapator (acum pot fi suprapuse). Presarati peste ele sare, fulgi de chili si rasniti piper negru dupa gust. Razuiti coaja de la 1/2 lamaie si adaugati mararul tocat fin. Turnati 3 linguri de ulei si amstecati. Acoperiti cu folie si pastrati la frigider pana la servire. Rezista asa cateva zile la frigider.
            Pregatiti salata doar in ziua servirii. Taiati feniculul felii cat de subtiri puteti. Presarati cu sare, masati cam 30 secunde si apoi lasati sa stea pana pregatiti restul ingredientelor.
            Taiati salata verde fasii subtiri si le asezati intr-un bol incapator. Taiati ceapa rondele si o presarati peste salata. Turnati deasupra feliile de fenicul. Presarati putina sare si apoi stropiti salata cu 2 linguri suc de lamaie. Amestecati usor.
            Adaugati somonul cu tot cu ulei peste salata si amestecati iar. Gustati de sare si suc de lamaie.
            Portionati salata in boluri sau o rasfirati pe un platou larg (pt un party cu autoservire). Serviti cu sferturi de lamaie si cu focaccia sau paine prajita.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'5',
            'denumire'=>'Inghetata de branza de capra cu pere caramelizate',
            'ingrediente'=>'600 ml smantana dulce pentru gatit (15%), 40 gr miere, 120 gr branza de capra maturata (sa va ramana 100 gr dupa curatarea de coaja), 4 galbenusuri, 50 gr zahar, 4 pere aromate mai mici (Williams; 300-350 gr dupa curatare), 40 gr unt, 40 gr zahar, 2 prize anason macinat, 1 priza scortisoara macinata, 50 ml brandy de mere',
            'mod_de_preparare'=>'Infierbantati smantana cu mierea si branza de capra sfaramata (curatata de coaja), incet, pana branza de topeste. Nu trebuie sa fiarba, doar sa fie fierbinte.
            * in loc de smantana dulce 15% puteti folosi jumatate smantana pentru frisca (35%) si jumatate lapte
            Separat frecati cu telul galbenusurile si zaharul. Incet, incepeti sa turnati amestecul de smantana (de la pasul 1) peste oua, timp in care amestecati neintrerupt cu telul. Dupa ce ati adaugat jumatate puteti adauga restul mai repede.
            Puneti amestecul pe foc mediu spre mic si continuati sa amestecati pana se ingroasa usor (ca un iaurt de baut). Nu dureaza mult, cam 3 minute. Daca aveti termometru, verificati sa ajunga la 84C si atunci luati oala de pe foc.
            * inghetata nu este foarte dulce, chiar se simte usor sarata de la branza; am facut-o asa ca sa mearga bine cu sosul dulce de pe pere; daca vreti sa o serviti cu alt sos, cu unul mai acrisor (de exemplu fructe de padure), puteti creste putin cantitatea de zahar sau miere
            Se lasa amestecul de inghetata sa se raceasca complet (daca va grabiti puteti plonja oala cu fundul in apa rece si o lasati 10-15 minute). Se da la frigider macar cateva ore (minim 5). Prefer sa mut amestecul intr-un vas cu cioc ca sa fie mai usor de turnat in masina de inghetata.
            Se prepara inghetata cu masina de inghetata urmand instructiunile masinii (la mine a durat 30 minute). Dupa ce e gata se pune intr-o caserola cu capac si se da la congelator 1 ora. Acum mie mi se pare ca are consistenta perfecta, dar asta depinde si de masina voastra.
            Cu putin iniante de a servi inghetata pregatiti perele. Nu recomand sa le pregatiti cu mai mult de 1/2 ora inainte, fiindca sosul e cu unt si se sleieste daca sta mult. Sosul si perele pot fi reincalzite, gustul va fi bun, dar perele isi pierd forma, se inmoaie si nu vor arata chiar asa bine pe farfurie ca si cand sunt proaspat preparate. Vor iesi 4-5 portii de pere din cantitatea data, mai mult nu se poate prepara intr-o tigaie de 25 cm diametrul. Daca vreti sa faceti mai multe portii deodata veti avea nevoie de o tigaie mai larga, in care perele sa stea pe un singur strat.
            Perele se taie in 4 si se curata in zona cotoarelor. Alegeti pere coapte, aromate, dar nu foarte moi. Evitati perele verzi sau foarte tari.
            Intr-o tigaie de aprox. 25 cm diametrul se topeste untul si se adauga zaharul, la foc mic. Cand zaharul e dizolvat se adauga perele cu taietura in jos si se caramelizeaza cam 15-20 minute. In acest timp intoarceti perele sa se faca pe toate partile. La final ele trebuie sa fie facute (sa intre usor fuculita in ele) dar inca sa isi pastreze forma. Cand sosul din tigaie are o culoare placut roscata, semn ca s-a caramelizat zaharul, faceti loc in centrul tigaii si adaugati aromele (anasonul si scortisoara) si miscati tigaia fata-spate, apoi circular, sa se dizolve aromele in caramel. Amestecati usor apoi perele sa se acopere si ele de arome. La final turnati brandy si mai fierbeti 1 minut, pana sosul e omogen. Nu-l lasati sa scada prea mult, ca sa aveti suficient pentru inghetata.
            Turnati continutul tigaii intr-o farfurie inalta si lasati sa se racoreasca.
            Serviti cate un glob mare de inghetata cu cateva felii de pere inca caldute si putin sos.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Friptura de miel',
            'ingrediente'=>'pulpa de miel cu os (1.6 kg), 3 catei usturoi, 2 linguri cu varf mustar cu seminte, 3 catei usturoi, 3 fire cimbru, 1 fir rozmarin, 8 fileuri ansoa in ulei de masline, coaja de la 1 lamaie, 2 linguri suc lamaie, 2 linguri sos de soia, 2 linguri ulei masline, piper',
            'mod_de_preparare'=>'Mixati in blender toate ingredientele pentru marinata (de la verdeturi rupeti frunzulitele de pe tulpina), pana obtineti o pasta.
            * nu se pune sare in marinata deoarece ansoa si sosul de soia sunt suficient de sarate
            In pulpa de miel spalata si uscata bine cu servetele faceti incizii cu un cutit bine ascutit si introduceti felii de usturoi.
            Frecati apoi pulpa pe ambele parti cu pasta obtinuta. Deasupra sa fie un strat generos de marinata. Puneti pulpa intr-un bol si acoperiti cu o folie. Aveti grija, folia sa nu atinga suprafata carnii ca sa nu strice crusta, de aceea e bine sa folositi un bol! Dati la frigider minim 4 ore.
            Scoateti pulpa si lasati jumatate de ora afara, sa ajunga la temperatura camerei.
            O asezati intr-o tava si o introduceti la cuptor la 220C pentru 20 minute. Coborati temparatura la 150C si mai lasati 2 ore. Tot la 30 minute stropiti-o cu sucul din tava
            Dupa acest timp friptura va fi facuta si suculenta si usor in sange doar in jurul osului. Daca o doriti mai in sange scadeti timpul de coacere. Acoperiti friptura cu folie de aluminiu si lasati sa stea 15 minute inainte de a o taia.
            * nu uitati sa ajustati timpul de coacere in functie de greutatea pulpei, a mea avea 1.6 kg',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'3',
            'denumire'=>'Placinta cu branza de oaie si leurda',
            'ingrediente'=>'6 foi de placinta, 350 gr telemea de oaie (nu foarte sarata), 150 gr branza tare maturata de oaie (de exemplu branza Horezu sau pecorino romano), 100 gr leurda (4 legaturi mai mici), 1 limeta (lime), 2 oua, piper negru, 150 gr iaurt grecesc (10% grasime), 100 ml lapte, 5 linguri ulei, 1 ou mare',
            'mod_de_preparare'=>'Se rad telemeaua si branza tare. Se taie coditele si apoi se toaca leurda.
            Se mixeaza manual sau in robot (cateva pulsuri scurte) branzeturile cu ouale batute pana compozitia arata legata. Se condimenteaza cu 1/4 lingurita de piper negru, coaja rasa de la limeta si sucul de la ea (2 linguri). Se adauga leurda si se amesteca manual.
            Pentru sos: se amesteca intr-un bol iaurtul cu laptele, uleiul si oul.
            Se pune hartie de copt pe fundul unei tavi de 30 x 20 cm sau usor mai mica (a mea are 18 x 28 cm si foile au intrat in tava usor sifonate).
            Se ia cate o foaie de placinta. Se unge pe jumatate cu sos (2-3 linguri). Se pliaza in doua. Se aseaza foaia in tava. Se unge deasupra cu alte 2-3 linguri de sos. Se repeta cu inca o foaie. Acum aveti 4 straturi in tava cu sos intre fiecare.
            Intindeti deasupra jumatate din umplutura.
            Asezati deasupra iar 4 straturi de foi unse, exact cum ati facut la pasul 5.
            Intindeti deasupra restul de umplutura.
            Asezati deasupra alte 4 straturi de foi unse.
            Deasupra ultimei foi turnati restul de sos.
            Lasati placinta sa stea pana se incalzeste cuptorul la 200C.
            Coaceti placinta timp de 35-40 minute, pana e rumena deasupra si umflata. Se lasa sa se racoreasca 10-15 minute, apoi se poate taia in 4 (pentru portii mari) sau in 24 patrate (pentru platoul cu aperitive) cu un cutit zimtat. E buna calduta sau la temperatura camerei. Se poate reincalzi.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'2',
            'denumire'=>'Salata de broccoli si conopida',
            'ingrediente'=>'100 gr buchetele broccoli, 100 gr buchetele conopida, 1 lingura ceapa rosie tocata, 3 linguri parmezan razuit (sau cascaval), 1 lingura cu varf seminte de floarea soarelui (prajite), 5 felii subtiri jambon (sau bacon; cca 50 gr), maioneza dintr-un galbenus, 1 lingura otet de orez, 1 lingura suc de lamaie',
            'mod_de_preparare'=>'Se taie buchetelele de broccoli si conopida bucati mici. Se amesteca cu ceapa tocata marunt.
            Pentru dressing se prepara maioneza dupa reteta de aici si cand e gata se drege cu otet si suc de lamaie. Se toarna dressingul peste legume si se amesteca bine. E necesara maioneza doar cat sa lege un pic legumele, nu mai multa.
            Se prajesc feliile de jambon intr-o tigaie fara grasime pana devin crocante. Se rup bucatele mici.
            Se adauga jambonul, semintele si parmezanul peste salata. Se condimenteaza cu putin piper negru macinat. Se amesteca bine. Se drege de sare doar daca e cazul (in principiu parmezanul, semintele si baconul sunt destul de sarate).
            Este buna imediat, dar si dupa ce sta. Se poate pastra la frigider. Semintele si baconul se vor inmuia daca o lasati sa stea, dar asta nu va afecta gustul, doar textura. Puteti sa adaugati aceste ingrediente doar in momentul servirii.',
            'categorii'=>'categ1, categ2, categ3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'5',
            'denumire'=>'Supa crema de telina',
            'ingrediente'=>'1 telina radacina (cca 650 gr), 2 morcovei (cca 120 gr), 1 praz (partea alba, cca 150 gr), 1 ceapa mare, 3 1/2 cani supa de vita (supa de pui sau apa pentru varianta de post), 250 gr ciuperci, 2 oua fierte tari (optional), 1 lingurita sare, 2 lingurite piper, 4 linguri ulei',
            'mod_de_preparare'=>'Se toaca ceapa. Se taie morcovii si prazul rondele. Se taie telina cuburi nu foarte mari.
            Se incing bine 2 linguri ulei si se caleste ceapa pana devine sticloasa. Se adauga morcovii, prazul si telina si se mai caleste totul, amestecand des, cca 5 minute.
            Se condimenteaza legumele cu 1 lingurita sare si 2 prize piper si se stinge totul cu supa de vita (sau supa de pui sau apa; eu am folosit apa in care am dizolvat 7 cuburi concentrate de vita pregatite in casa). Se aduce la fierbere si se lasa la fiert la foc mediu pentru cca 20-30 minute, pana legumele sunt fierte.
            In acest timp, pregatim "crutoanele" de ciuperci. Se incing foarte bine cele 2 linguri de ulei ramase si se prajesc in el ciupercile taiate feliute, la foc mediu spre mare (vrem sa se prajeasca, nu sa se inabuse). Se prajesc pana devin usor rumene si crocante. Se scot din tigaie si se presara putina sare pe ele.
            Cand legumele sunt fierte se strecoara de supa (dar pastrati supa!) si se pun in robotel. Se mixeaza bine timp de 1 minut, apoi incet incepem sa adaugamn supa, pana supa-crema capata consistenta pe care o dorim. Eu nu am adaugat chiar toata supa, mi-a ramas cam 1/2 cana.
            Se serveste supa crema "ninsa" cu galbenus de ou trecut prin sita (daca nu tineti post) si "crutoane" de ciuperci. Bineinteles se poate servi si in forma clasica, cu crutoane de paine.',
            'categorii'=>'c1, c2, c3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'4',
            'denumire'=>'Tarta fina cu mere si crema de migdale',
            'ingrediente'=>'1 aluat foietaj, 55 gr migdale fara coaja macinate marunt, 55 gr zahar pudra, 55 gr unt la temp. camerei, 1/4 baton vanilie (sau 1/4 lingurita pasta de vanilie), 1 lingura brandy de mere, 10 gr faina alba, 1 ou, 3 mere Golden Delicious, 40 gr unt, 40 gr zahar (folositi un plic de zahar vanilat), 50 ml brandy de mere',
            'mod_de_preparare'=>'Se decupeaza 3 discuri de aprox 14 cm diametru din aluatul foeitaj. Se inteapa cu furculita peste tot si se dau la frigider pana pregatiti restul.
            Crema: se freaca cu mixerul untul cu zaharul pudra (daca folositi zahar pudra vanilat, nu mai adaugati pastaie de vanilie) si miezul de la vanilie pana devine cremos (cca 3 minute). Se adauga in fir subtire oul batut, mixand continuu pana se incorporeaza. Se adauga brandy si apoi migdalele macinate si se mixeaza pana se incorporeaza. La final se incorporeza faina. Va rezulta o crema de migdale groasa, care sta pe lingura.
            Merele: Se curata merele de coaja si li se scoate cotorul cu aparatul special. Se taie in doua si se aseaza cu taietura in jos pe masa de lucru. Se feliaza merele.
            Intr-o tigaie se topeste untul cu zaharul si se adauga feliile de mere. Se soteaza, amestecand des pana merele sunt moi (intre 5 si 10 minute). Daca doriti sa le caramelizati le puteti lasa mai mult, pan incep sa se inchida la culoare. Se adauga brandy-ul si se fierbe la foc mic, pana sosul din tigaie arata ca un sirop (nu dureaza mult, cam 1-2 minute). Se scot merele pe o farfurie, lasand in tigaie sosul.
            Incingeti cuptorul la 190C si lasati si tava in cuptor, sa fie fierbinte cand asezati tartele. Am observat ca daca pun tartele in tava fierbinte zona de sub umplutura se coace mai bine.
            Se aseaza fiecare bucata de aluat pe hartie de copt. Se ruleaza marginea fiecarui disc de aluat spre interior si se preseaza de jur imprejur cu dintii unei furculite.
            In mijloc se pune cate 1/3 din crema de migdale. Daca doriti, puteti pune crema intr-un spritz de patiserie, astfel veti portiona crema mai usor si egal. Incepeti din centru si faceti cercuri concentrice pana ajungeti la margine.
            Asezati felii de mere deasupra (in evantai sau circular) suprapunandu-le un pic. Cu ajutorul hartiei de dedesubt mutati tartele pe tava fierbinte.
            Coaceti tartele cam 20-25 minute, pana marginea e umflata si rumena. Scoateti tartele din cuptor si le ungeti cu sosul din tigaie (pe care il reincalziti daca e cazul).
            Serviti tartele caldute sau la temperatura camerei. Sunt bune cu sos de vanilie sau un glob de inghetata.',
            'categorii'=>'cat1, cat2, cat3',
            'imagine_principala'=>'avatar.jpg'
            ]);
        Reteta::create([
            'utilizator_id'=>'4',
            'denumire'=>'Supă cremă de usturoi cu năut',
            'ingrediente'=>"8 căpățâni usturoi, 250 grame năut fiert, 1 tijă țelină apio (sau 1 bucată mică de țelină – rădăcină), 1/4 linguriță pudră cimbrișor, 1 lingură ulei măsline extravirgin, 150 grame iaurt grecesc (optional), 50 grame cheddar ras, 1,5 l apă sau supă de legume, sare și piper – după gust",
            'mod_de_preparare'=>'Se curăță cățeii de usturoi și se lasă deoparte. Se înfierbântă apa/supa de legume și se fierbe țelina, împreună cu cimbrișorul și puțină sare. Se adaugă năutul și usturoiul și se mai lasă pe foc încă 5  min. Se stinge focul, se lasă 5-10 min să se răcească, după care se mixează totul cu blenderul vertical, ori în blender, până se obține o cremă fină.Se adaugă uleiul de măsline și iaurtul grecesc și se mixează din nou câteva secunde, pentru omogenizare. Supa cremă de usturoi cu năut se poate servi imediat, decorată cu puțin ulei de măsline, cheddar ras și cimbrișor.',
            'categorii'=>'supă, supă cremă',
            'imagine_principala'=>'avatar.jpg'
            ]);

        Reteta::create([
            'utilizator_id'=>'6',
            'denumire'=>'Hummus cremos cu avocado',
            'ingrediente'=>"2 conserve Năut, 1 linguriță bicarbonat de sodiu, 60 g tahini, 60 ml ulei de măsline, 2 linguri Zeamă de lămâie, 1 bucată Avocado, sare, piper, 2 căței usturoi, 1 linguriță chimen",
            'mod_de_preparare'=>'Scurgem năutul din conservă și păstrăm lichidul.Îl putem folosi mai târziu pentru a ajuta consistența hummus-ului. Curățăm boabele de năut de pielițe, îndepărtând cât mai multe. Spălăm apoi bine năutul și îl punem la fiert în apă cu bicarbonat. Lăsăm să fiarbă 5 minute la foc mare, apoi scurgem din nou năutul. Punem în blender năutul, avocado curățat de coajă, uleiul de măsline, tahini, usturoiul trecut prin presă, sare și piper, zeamă de lămâie. Amestecăm foarte bine, la viteză mare.Din când în când oprim blenderul și amestecăm cu spatula, astfel încât să nu rămână bucăți de năut pe pereții vasului. În funcție de consistența pe care o dorim, putem adăuga apă din conserva de năut sau ulei de măsline.',
            'categorii'=>'hummus, vegan',
            'imagine_principala'=>'avatar.jpeg'
            ]);
    }
}
