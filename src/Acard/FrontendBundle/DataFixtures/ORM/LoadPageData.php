<?php

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\Page;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $pages = array();

        $mainPage = array('name' => 'main', 'is_editable' => false, 'meta_description' => "This is main page of acard webpage", 'meta_keywords' => 'acard, main, page', 'page_template' => $this->getReference('page-template-main'), 'url_title' => 'index', 'text' => 'This is index.html page');
        $aboutPage = array('name' => 'about', 'is_editable' => true, 'meta_description' => "This is about page of acard webpage", 'meta_keywords' => 'acard, about, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'o-kampanii', 'text' => 'This is o-kampanii.html page');
        $aboutPage['text'] = <<<TXT
                <header class="page-content-header">
                    O kampanii
                </header>
                <article>
                    <h2 class="violet">Kampania Ciśnienie na Życie</h2>
                    <p class="lead">
                        Przeprowadzenie 200 000 pomiarów ciśnienia tętniczego, wsparcie obchodów Światowego Dnia Serca i sporządzenie raportu na temat czynników ryzyka chorób układu krążenia.
                    </p>
                    <p class="violet">
                        To tylko niektórez zadań ogólnopolskiej kampanii społecznej Ciśnienie na życie, organizowanej przez Grupę Polpharma. Przedstawiciele akcji będą zachęcać Polaków do troski o zdrowie.
                    </p>
                    <img src="/bundles/acardfrontend/img/about.jpg" alt="O kampanii">
                    <p>
                        Akcja Ciśnienie na życie ma uświadomić Polakom, jakie ryzyko niesie ze sobą brak profilaktyki schorzeń układu krążenia. Jak bowiem wynika z badania przeprowadzonego przez PBS w listopadzie 2012 roku Nadciśnienie tętnicze - czy wiemy o nim wszystko?, wiele osób po pięćdziesiątym roku życia nie zamierza diagnozować stanu swojego zdrowia. Co więcej, wśród badanych dominują złe nawyki żywieniowe oraz brak ruchu. Tymczasem z danych Polskiego Towarzystwa Kardiologicznego wynika, że choroby układu sercowo-naczyniowego odpowiadają za 48% zgonów w Polsce. Każdego dnia z powodu tych schorzeń umiera w naszym kraju prawie 500 osób.
                    </p>
                    <hr>
                    <br>
                    <p>
                        <b>Jednym z głównych zadań kampanii będzie przeprowadzenie 200 000 pomiarów ciśnienia krwi.</b> Za każdy wykonany pomiar ciśnienia Grupa Polpharma przekaże złotówkę na rzecz Kliniki Zdrowego Serca w Zabrzu. Badania będą wykonywane w centrach handlowych, letnich i zimowych kurortach, a także podczas masowych wydarzeń sportowych, pielgrzymek oraz na ważnych konferencjach. Kampania Ciśnienie na życie zawita też na uniwersytety trzeciego wieku, by przekonać aktywnych seniorów do regularnych badań układu krążenia.
                    </p>
                    <br>
                    <br>
                    <p>
                        Przekonanie osób z grupy ryzyka do działań profilaktycznych to wielka szansa zmniejszenia wskaźnika przedwczesnej umieralności wciąż aktywnych osób poniżej 65 roku życia, który pomimo nowoczesnej medycyny należy w Polsce wciąż do najwyższych w Europie. Możliwość wykonania badania oraz konsultacji jego wyniku w miejscu codziennej aktywności, to istotna wartość naszej kampanii Ciśnienie na życie – komentuje prof. Marian Zembala, dyrektor Śląskiego Centrum Chorób Serca w Zabrzu, opiekun merytoryczny kampanii Ciśnienie na życie.
                    </p>
                    <img src="/bundles/acardfrontend/img/about2.jpg" alt="o kampanii">
                    <p>
                        Działania kampanii Ciśnienie na życie będą trwać do końca 2013 roku. Akcję zwieńczy sporządzenie raportu Serce Polaka, w którym wykorzystane zostaną dane z tysięcy pomiarów ciśnienia tętniczego. Istotnym przedsięwzięciem będzie także wsparcie najbliższych obchodów Światowego Dnia Serca, które przypadają 29 września 2013 roku.
                    </p>
                </article>
TXT;

        $acardPage = array('name' => 'acard', 'is_editable' => true, 'meta_description' => "This is acard page of acard webpage", 'meta_keywords' => 'acard, acard, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'acard', 'text' => 'This is acard.html page', 'wrapper_css_class');
        $acardPage['text'] = <<<TXT
            <header class="page-content-header">
                Acard
            </header>
            <article>
                <p class="lead">
                    Lek ACARD zawiera kwas acetylosalicylowy, który hamuje zlepianie się (agregację) płytek krwi.
                </p>
                <p class="violet">
                    Lek przeznaczony jest do długotrwałego, profilaktycznego stosowania w chorobach, które grożą powstaniem zakrzepów i zatorów w naczyniach krwionośnych.
                </p>
                <br>
                <p>
                    Lek ACARD stosuje się:
                </p>
                <ul>
                    <li>w zapobieganiu zawałowi serca u osób dużego ryzyka;</li>
                    <li>w świeżym zawale serca lub podejrzeniu świeżego zawału serca;</li>
                    <li>w niestabilnej chorobie wieńcowej;</li>
                    <li>w zapobieganiu powtórnemu zawałowi serca;</li>
                    <li>po zabiegach chirurgicznych lub interwencyjnych na naczyniach, np. wszczepieniu
                    pomostów aortalno-wieńcowych, plastyce naczyń wieńcowych;</li>
                    <li>w zapobieganiu napadom przejściowego niedokrwienia mózgu i niedokrwiennego udaru mózgu oraz po ich przebyciu;</li>
                    <li>u osób z zarostową miażdżycą tętnic obwodowych;</li>
                    <li>w zapobieganiu zakrzepicy naczyń wieńcowych u pacjentów z wieloma czynnikami ryzyka;</li>
                    <li>w zapobieganiu zakrzepicy żylnej i zatorowi płuc u pacjentów długotrwale
                    unieruchomionych.</li>
                </ul>
                <hr />
                <span class="drug-name">ACARD 75mg</span>
                <img src="/bundles/acardfrontend/img/acard75.jpg" alt="ACARD 75mg" class="packshot">
                <hr />
                <span class="drug-name">ACARD 150mg</span>
                <img src="/bundles/acardfrontend/img/acard150.jpg" alt="ACARD 150mg" class="packshot">
                <hr />
                <span class="more-info">
                    Więcej informacji o leku znajdziesz na stronie <a href="http://www.acard.pl" target="_blank">www.acard.pl</a>
                </span>
                <hr>
            </article>
TXT;

        $kalendariumPage = array('name' => 'calendar', 'is_editable' => false, 'meta_description' => "This is kalendarium page of acard webpage", 'meta_keywords' => 'acard, kalendarium, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'kalendarium', 'text' => 'This is kalendarium.html page');

        $kontaktPage = array('name' => 'contact', 'is_editable' => true, 'meta_description' => "This is kontakt page of acard webpage", 'meta_keywords' => 'acard, kontakt, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'kontakt', 'text' => 'This is kontakt.html page');
        $kontaktPage['text'] = <<<TXT
          <header class="page-content-header">
            Kontakt
          </header>
          <article>
            <h2 class="violet">Kampania Ciśnienie na Życie</h2>
            <p class="lead">
                W przypadku pytań  dotyczących kampanii „Ciśnienie na życie” prosimy o kierowanie wiadomości na adres email:
                <br>
                <br>
                <a href="mailto:cisnienienazycie@polpharma.com">cisnienienazycie@polpharma.com</a>.
            </p>
          </article>
TXT;


        $nadcisnieniePage = array('name' => 'hypertension', 'is_editable' => true, 'meta_description' => "This is nadcisnienie page of acard webpage", 'meta_keywords' => 'acard, nadcisnienie, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'nadcisnienie', 'text' => 'This is nadcisnienie.html page');
        $nadcisnieniePage['text'] = <<<TXT
            <header class="page-content-header">
                O nadciśnieniu tętniczym
            </header>
            <article>
                <h2 class="violet">Nadciśnienie</h2>
                <p class="lead">
                        Choroba układu krążenia polegająca na stałym lub okresowym podwyższeniu ciśnienia tętniczego krwi powyżej wartości prawidłowych, czyli > 140/90 mmHg.
                </p>
                <p class="violet">

                    Szczególnie narażone na rozwój nadciśnienia tętniczego są osoby w wieku > 50 r.ż., z nadwagą lub otyłością, oraz u których w rodzinie występowało nadciśnienie tętnicze. Regularna kontrola ciśnienia tętniczego stwarza możliwość wczesnego wykrycia i podjęcia odpowiedniego leczenia nadciśnienia tętniczego.
                </p>
                <br>
                <p>
                    Niewykryte bądź nieleczone nadciśnienie tętnicze zwiększa ryzyko wystąpienia zdarzeń sercowo-naczyniowych takich jak: zawał serca, udar mózgu a także chorób nerek i uszkodzenia narządu wzroku.
                </p>
                <img src="/bundles/acardfrontend/img/about.jpg" alt="O kampanii">
                <h2 class="violet">Zawał serca</h2><br>
                <p>
                    Zawał serca to zespół kliniczny spowodowany ustaniem przepływu krwi przez tętnicę wieńcową (naczynie krwionośne zaopatrujące serce np. w tlen) wskutek jej zamknięcia przez np. miażdżycę lub zakrzep. Konsekwencją tego jest uszkodzenie (martwica) mięśnia sercowego, co może doprowadzić do niewydolności serca, zatrzymania jego pracy i nagłej śmierci.
                </p>
                <br>
                <h2 class="violet">Jakie są objawy zawału serca? </h2><br>
                <p>
                Ból w klatce piersiowej, w okolicy mostka, promieniujący do żuchwy lub okolicy barków; często - uczucie duszności, zimne poty, zasłabnięcie, uczucie lęku.
                </p>
                <br>
                <h2 class="violet">Udar mózgu</h2>
                <br>
                <p>
                    Udar mózgu to nagłe wystąpienie zaburzeń czynności mózgu, trwających dłużej niż 24 godziny (o ile wcześniej nie doprowadzą do zgonu), spowodowanych zaburzeniami w mózgowym przepływie krwi. Najczęstszą przyczyną udaru jest niedrożność naczyń mózgowych wywołana zakrzepami i miażdżycą naczyń prowadząca do niedokrwienia tkanek mózgowych. Udar mózgu jest stanem zagrożenia życia, wymaga szybkiego rozpoznania i natychmiastowego leczenia.
                </p>
                <br>
                <h2 class="violet">Jakie są objawy udaru mózgu?</h2><br>
                <p>
                    Ból głowy, drętwienie kończyn, zaburzenia widzenia, trudności w mowie lub rozumieniu słów; Utrata przytomności, upadek, paraliż części ciała, drgawki, zawroty głowy, wymioty.
                </p>
                <br>
                <h2 class="violet">Jak uchronić się przed zawałem serca i udarem mózgu?</h2><br>
                <p>
                    Prowadź zdrowy styl życia, ogranicz spożycie produktów pochodzenia zwierzęcego, jedz dużo warzyw i owoców, nie zaniedbuj codziennej aktywności fizycznej; Kontroluj ciśnienie tętnicze, stężenie cholesterolu, wagę ciała, dbaj o obwód w talii; Porzuć nałogi: zrezygnuj z palenia tytoniu i ogranicz ilość spożywanego alkoholu; Regularnie kontroluj stan swojego zdrowia, rozmawiaj o wszelkich wątpliwościach ze swoim lekarzem rodzinnym.
                </p>
                <hr>
                <p class="lead">
                    Istnieją metody zmniejszania ryzyka wystąpienia zawału serca i udaru mózgu. Jedną z nich jest stosowanie doustnych leków zmniejszających krzepliwość krwi, np. kwasu acetylosalicylowego, w niskich dawkach. Poproś lekarza o ocenę Twojego ryzyka sercowo-naczyniowego i zapytaj, czy możesz stosować Acard w dawkach kardioprotekcyjnych 75 mg lub 150 mg.
                </p>
                <hr>
            </article>
TXT;

        $wieksercaPage = array('name' => 'heart-age', 'is_editable' => true, 'meta_description' => "This is wiekserca page of acard webpage", 'meta_keywords' => 'acard, wiekserca, page', 'page_template' => $this->getReference('page-template-page'), 'url_title' => 'wiek-serca', 'text' => 'This is wiekserca.html page');
        $wieksercaPage['text'] = <<<TXT
            <header class="page-content-header">
                Wiek serca
            </header>
            <article>
                <h2 class="violet">Innowacyjne badanie</h2>
                <p class="lead">
                    Kampania „Ciśnienie na życie” zbada wiek serca Polaków za pomocą innowacyjnej aplikacji, stworzonej przez ekspertów Gdańskiego Uniwersytetu Medycznego.
                </p>
                <p class="violet">
                    Grupa Polpharma w ramach kampanii „Ciśnienie na życie” wprowadziła nowe badanie – pierwsze na taką skalę w Europie badanie wieku serca. Z pomocą lekarzy, pielęgniarek oraz specjalnie przygotowanej aplikacji, organizatorzy kampanii prowadzą badanie przesiewowe, dzięki któremu Polacy będą mogli sprawdzić, ile lat mają ich serca. Badanie to jest niezwykle istotne ze statystycznego punktu widzenia.
                </p>
                <br>
                <p>
                    Z danych Polskiego Towarzystwa Kardiologicznego wynika, że choroby układu sercowo-naczyniowego odpowiadają za 48% zgonów w Polsce. Niestety ponad 65% kobiet i 76% mężczyzn przyznaje, że nie wykonuje regularnie pomiarów ciśnienia tętniczego krwi. Niecałe 10% badanych zdecydowało się regularnie mierzyć ciśnienie ze względów profilaktycznych.
                </p>
                <img src="/bundles/acardfrontend/img/wiekserca1.jpg" alt="Wiek serca">
                <h2 class="violet">Jak to działa?</h2>
                <br>
                <p>
                    Za zgodą naukowców z Boston University, autorów algorytmu FHS, eksperci Gdańskiego Uniwersytetu Medycznego, opracowali na potrzeby kampanii „Ciśnienie na życie” aplikację, która podczas badania u osób w wieku 30-74 lata, może za pomocą kilku prostych pomiarów i pytań określić tzw. wiek serca względem metrykalnego wieku pacjenta. Aplikacja powstała w oparciu o wyniki The Framingham Heart Study i publikację R. D’Agostino i wsp. Circulation1 oraz prace badawcze zespołu dra hab. T. Zdrojewskiego z Gdańskiego Uniwersytetu Medycznego. Wyniki badań zostaną przedstawione w raporcie „Serce Polaka”.
                    <br>
                    <br>
                    „Pielęgniarka lub lekarz po zbadaniu ciśnienia tętniczego krwi, zmierzeniu obwodu brzucha oraz przeprowadzeniu wywiadu dotyczącego przebytych chorób i przyjmowanych leków, może jednym kliknięciem sprawdzić wiek serca pacjenta” – komentuje dr hab. T. Zdrojewski, koordynator badania NATPOL 2011. „Obecnie aplikacja będzie narzędziem wykorzystywanym podczas badań w ramach kampanii „Ciśnienie na życie”, ale w przyszłości może także ułatwić pracę lekarzom, a przede wszystkim pomoże pacjentom lepiej zrozumieć stan swojego zdrowia oraz wykryć czynniki ryzyka wystąpienia zawału serca czy udaru mózgu” – dodaje.
                    <br>
                    <br>
                    Wyniki pomiarów są wprowadzane do systemu, a każdy przebadany otrzymuje dodatkowo informację nt. swojego wyniku wraz z jego interpretacją oraz własną książeczkę pomiarów. Na podstawie zebranych danych można ocenić, czy serce badanego jest szczególnie narażone na wystąpienie schorzeń układu sercowo-naczyniowego, takich jak zawał czy udar.
                </p>
                <br>
                <h2 class="violet">Co wpływa na wiek naszego serca? </h2><br>
                <p>
                    Serce dorosłego Polaka i Polki jest średnio o 8 lat starsze niż oni sami – takie wnioski wynikają z ostatniego, innowacyjnego badania NATPOL 2011, analizującego zdrowie Polaków. Na wiek serca wpływają różne czynniki, których często pacjenci nie biorą pod uwagę – tryb życia, stres, dieta, występowanie w przeszłości zdarzeń kardiologicznych (u pacjenta lub w rodzinie pacjenta). Może to prowadzić do nadciśnienia tętniczego, otyłości, podwyższenia poziomu cholesterolu we krwi, a w konsekwencji spowodować udar mózgu lub zawał serca. Dlatego w ramach kampanii „Ciśnienie na życie”, pielęgniarki na stoiskach w całej Polsce za pomocą specjalnie przygotowanej aplikacji prowadzą szczegółowy wywiad, który pozwala określić wiek serca danej osoby i wykryć potencjalne czynniki ryzyka wystąpienia zawału serca i udaru mózgu.
                </p>
                <img src="/bundles/acardfrontend/img/wiekserca2.jpg" alt="Wiek serca">
                <h2 class="violet">Serca starsze niż pacjent – i co dalej?</h2><br>
                <p>
                    Aplikacja „wiek serca” pozwala stwierdzić, czy u pacjenta istnieje zwiększone ryzyko zachorowania na zawał serca lub udar mózgu. Występuje ono wtedy, gdy obliczony wiek serca jest wyższy od wieku metrykalnego. Dobra wiadomość – wiek serca można obniżyć! Może to uczynić każdy, kto zmieni dietę i styl życia na bardziej zdrowy oraz w razie potrzeby, będzie skutecznie leczył tzw. czynniki ryzyka zawałów serca i udarów mózgu, takie jak nadciśnienie tętnicze, wysoki cholesterol, otyłość lub cukrzyca, palenie, brak aktywności fizycznej i stres.
                </p>
                <br>
                <p class="lead">
                    Rady jak najskuteczniej poradzić sobie z ww. czynnikami ryzyka każdy pacjent może uzyskać u swojego lekarza rodzinnego.
                </p>
                <p>
                    „Istotnym jest, aby pacjenci przede wszystkim z grup ryzyka zrozumieli konieczność wprowadzenia zmian profilaktycznych w swoim życiu. Pokazanie wieku serca pacjentów pozwoli w prosty sposób uświadomić wszystkim przebadanym, że nawet jeżeli nie wystąpił u nich incydent kardiologiczny, to w każdej chwili może do niego dojść. Zależy nam także na zaktualizowaniu naszej wiedzy na temat zdrowia układu sercowo-naczyniowego Polaków” – komentuje prof. Marian Zembala, dyrektor Śląskiego Centrum Chorób Serca w Zabrzu, opiekun merytoryczny kampanii „Ciśnienie na życie”.
                </p>
            </article>
TXT;

        $pages[] = $mainPage;
        $pages[] = $aboutPage;
        $pages[] = $acardPage;
        $pages[] = $kalendariumPage;
        $pages[] = $kontaktPage;
        $pages[] = $nadcisnieniePage;
        $pages[] = $wieksercaPage;

        foreach($pages as $page) {
            $pageEntity = new Page();
            $pageEntity->setIsEditable($page['is_editable']);
            $pageEntity->setMetaDescription($page['meta_description']);
            $pageEntity->setMetaKeywords($page['meta_keywords']);
            $pageEntity->setMetaTitle("Acard - " . $pageEntity->getMetaDescription());
            $pageEntity->setPageTemplate($page['page_template']);
            $pageEntity->setUrlTitle($page['url_title']);
            $pageEntity->setText($page['text']);
            $pageEntity->setWrapperCssClass(array_key_exists('wrapper_css_class', $page) ? $page['wrapper_css_class'] : null);
            $pageEntity->setName($page['name']);

            $manager->persist($pageEntity);
        }

        $manager->flush();
    }


    public function getOrder()
    {
        return 2;
    }
}