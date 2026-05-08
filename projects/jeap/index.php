<?php 
$metaTitle = "Projekt JEAP | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Junge Erwachsene zwischen Aktivierung und Prekarisierung (JEAP)";
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/header.php" );
?>

<!-- 
=============================================
    TITLE
============================================== 
-->
<div class="position-relative pt-200 lg-pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-60 lg-mb-40">
                    <?php echo generate_breadcrumb(); ?>
                    <h1 class="main-title mb-20">
                        <span>JEAP</span> - Junge Erwachsene zwischen Aktivierung und Prekarisierung
                    </h1>
                </div>
            </div>
        </div>
    </div> 
</div> 


<!-- 
=============================================
    PROJECT DETAILS  
============================================== 
-->
<div class="pt-70 pb-50 lg-pb-10 md-pt-10">
    <div class="project-desctiption">
        <div class="container">
            <div class="row">
                
                <!-- SIDEBAR (right) -->
                <div class="col-lg-4 order-md-2">
                    <div class="sidebar ms-xl-5">
                        <h3 class="sb-title">
                            Info
                        </h3>
                        <p class="border-bottom pb-30 mb-30">
                            Interdisziplinäre Nachwuchsforscher*innengruppe, die den aktivierenden Sozialstaat und seine Auswirkungen auf benachteiligte Gruppen in gesellschaftlichen Umbrüchen analysiert.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Universität Kassel
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Projektleitung
                                </div>
                                <div class="sb-text">
                                    Prof. Dr. Mechthild Bereswill
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Promotion
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                    2009–2014
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Förderung
                                </div>
                                <div class="sb-text">
                                    Hans-Böckler-Stiftung
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- MAIN CONTENT (left) -->
                <div class="col-lg-8 order-md-1">
                    
                    <!-- SEITENBILD -->
                    <?php
                    $imageData = [
                        [
                            'path' => "/images/projects/JEAP.jpg",
                            'alt' => "Collage of cityscape, young migrant near empty plate, job interview scene, tug of war with bureaucracy, and research book at bottom."
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <!-- ZWISCHENÜBERSCHRIFT -->
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Auswirkungen und Herausforderungen durch den Wandel des Sozialstaats
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <!-- ABSATZ 01 -->
                    <p>
                       Der aktivierende Sozialstaat ist derzeit Gegenstand vieler Analysen. Dieses neue Paradigma sozialstaatlichen Handelns steht im Kontext raumgreifender Transformationen und Umbrüche innerhalb entwickelter kapitalistischer Gesellschaften, in deren Verlauf sich gesellschaftliche Kohäsionsmuster neuformieren. Das ehemals typische, von Wachstumsgewissheit geprägte Zusammenwirken von Markt, Staat und Familie befindet sich in einem beschleunigten Wandlungsprozess. 
                    </p>
                    
                    <!-- ABSATZ 02 -->
                    <p>
                        Die Gleichzeitigkeit von Prekarisierungstendenzen am Arbeitsmarkt und dem Fortbestehen von Erwerbsarbeit als zentralem Integrationsmodus für gesellschaftliche Teilhabe birgt in zunehmendem Maße ein Marginalisierungsrisiko, von dem insbesondere Menschen betroffen sind, die von einer Vergesellschaftung durch Erwerbsarbeit entweder temporär oder aber beständig ausgeschlossen sind. Auffallend ist, dass von diesen Menschen auf der einen Seite immer höhere Eigenverantwortung verlangt wird, während andererseits die Restriktionen, denen sie unterliegen, zunehmen.  In der Folge kommt es zu einer Neugewichtung von Rechten und Pflichten im Verhältnis zwischen Subjekten und staatlichen Institutionen.
                    </p>
                    
                    <!-- ABSATZ 03 -->
                    <p>
                        Die in der interdisziplinären Nachwuchsforscherinnengruppe versammelten Projekte nähern sich dieser Entwicklung aus verschiedenen Blickwinkeln. Gemeinsam ist ihnen nicht nur die Verknüpfung von Makro- und Mikroebene, sondern auch die Verbindung der Analyse von gesellschaftlichen und institutionellen Rahmenbedingungen mit den Deutungen und Umgangsweisen der betroffenen Subjekte. Im Fokus der qualitativen Untersuchungen stehen junge Frauen, Männer und Familien sowohl mit als auch ohne Migrationsgeschichte, die als sozial benachteiligt gelten. 
                    </p>
                    
                    <!-- ABSATZ 04 -->
                    <p>
                        Da sie stärker und typischer als andere gesellschaftliche Gruppen von den gegenwärtigen Transformationsprozessen betroffen sind, soll an ihnen exemplarisch erforscht werden, welche Herausforderungen für Gesellschaft und Subjekt der wohlfahrtsstaatliche Wandel in der zunehmend brüchiger werdenden Erwerbsgesellschaft mit sich bringt. Dazu gehört eine Analyse der sich verschiebenden geschlechtsgebundenen Ungleichheit und nicht zuletzt der Normalität einer Einwanderungsgesellschaft.
                    </p>
                    
                    <!-- ABSATZ 05 -->
                    <p>
                        Die Untersuchung nähert sich dem Problem von zwei Seiten: Zum einen wird untersucht, wie die Akteure versuchen, im Kontext ihres Alltagshandelns eine aktive Aneignung ihrer Lebensbedingungen zu erreichen.  Zum anderen wird die Wirkungsweise von institutionellen Interventionen und staatlichen Regulierungsversuchen auf diese Akteure analysiert, wie etwa die Maßnahmen der Hilfe und Kontrolle, die den Übergang junger Menschen in Arbeit flankieren.
                    </p>
                    
                    <!-- ABSATZ 06 -->
                    <p>
                        Die Nachwuchsforscherinnengruppe geht insbesondere folgenden Fragen nach:  Wie wirken die Interventionen des aktivierenden Sozialstaates vor dem Hintergrund einer krisenhaften Wirtschaftsentwicklung? Welche Deutungsmuster bezüglich des wohlfahrtstaatlichen Wandels lassen sich auf Seiten der Akteure aufzeigen? Welche Handlungsstrategien im Umgang mit der staatlichen Regulierung werden individuell und innerhalb familialer Lebensformen entwickelt? Wie gestalten sich Bewältigungsprozesse vor dem Hintergrund jeweiliger biographischer Ressourcen? Wie werden diese Prozesse von den Einzelnen im eigenen Umfeld kommuniziert und interpretiert? Nicht zuletzt wird zu fragen sein, ob der allgegenwärtigen rhetorischen Forderung nach größerer Geschlechtergerechtigkeit tatsächliche Veränderungen entsprechen oder ob nicht vielmehr das Gegenteil der Fall ist, etwa weil Widersprüche entlang neuer – unvorhergesehener – Konfliktlinien entstanden sind.
                    </p>
                    
                    <!-- ABSATZ 07 -->
                    <p class="mb-80">
                        Die Nachwuchsforscherinnengruppe versammelt unter der wissenschaftlichen Leitung von Frau Prof. Dr. Bereswill vier Promotionsvorhaben, die eine empirisch begründete Theoriebildung zum Ziel haben. Der breit angelegte Blick auf das Handlungsvermögen der Subjekte, wie es sich im deutschen System der Existenzsicherung realisieren kann, verweist auf eine Forschungslücke, zu der es erst wenige Befunde gibt.
                    </p>
                    
                    <!-- VERÖFFENTLICHUNGEN ZUM THEMA -->
                    <h3 class="mb-20">
                        Hier können Sie die Monographien einsehen, die aus dem Projekt entstanden sind:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                Lisa Yashodhara Haller: Elternschaft im Kapitalismus. Staatliche Einflussfaktoren auf die Arbeitsteilung junger Eltern<br>
                                <a href="https://www.campus.de/buecher-campus-verlag/wissenschaft/soziologie/elternschaft_im_kapitalismus-14263.html" target="_blank">Elternschaft im Kapitalismus | campus.de</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                Carmen Figlesthaler: Bloß keine Lücke im Lebenslauf. Institutionelle Interventionen und Ausgrenzungsrisiken im Übergang in Arbeit aus Perspektive junger Erwachsener<br>
                                <a href="https://www.beltz.de/fachmedien/soziologie/produkte/details/36954-bloss-keine-luecke-im-lebenslauf.html" target="_blank">Bloß keine Lücke im Lebenslauf | beltz.de</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                Franz Zahradnik: Junge arbeitslose Männer in der Sanktionsspirale<br>
                                <a href="https://www.beltz.de/fachmedien/sozialpaedagogik_soziale_arbeit/produkte/details/37297-junge-arbeitslose-maenner-in-der-sanktionsspirale.html" target="_blank">Junge arbeitslose Männer in der Sanktionsspirale | beltz.de</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                Júlia Wéber:  Zugehörigkeit und Teilhabe junger Frauen im Übergang in die Arbeitswelt. Institutionelle Interventionen der Jugendhilfe und Arbeitsvermittlung aus Adressatinnen-Sicht<br>
                                <a href="https://shop.budrich.de/produkt/zugehoerigkeit-und-teilhabe-junger-frauen-im-uebergang-in-die-arbeitswelt/" target="_blank">Zugehörigkeit und Teilhabe junger Frauen im Übergang in die Arbeitswelt | shop.budrich.de</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                Marko Perels: Prekarisierung im Lebenszusammenhang Potenziale der deutsch-türkischen Einwanderungsgesellschaft<br>
                                <a href="https://www.beck-shop.de/perels-prekarisierung-lebenszusammenhang/product/31480090" target="_blank">Prekarisierung im Lebenszusammenhang | beck-shop.de</a>
                            </p>
                        </li>
                        
                        <li class="mt-20">
                            <p>
                                Gesammelte Ergebnisse: Subjektive Verarbeitungen von Aktivierung in prekären Lebenslagen. Subjective coping with activation in precarious life cours.<br>
                                <a href="https://link.springer.com/article/10.1007/s12592-015-0205-y" target="_blank">Subjektive Verarbeitungen von Aktivierung in prekären Lebenslagen | link.springer.com</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                Sammelband der Nachwuchsgruppe:  Wechselverhältnisse im Wohlfahrtsstaat. Dynamiken gesellschaftlicher Justierungsprozesse<br>
                                <a href="https://www.dampfboot-verlag.de/shop/artikel/wechselverhaeltnisse-im-wohlfahrtsstaat" target="_blank">Wechselverhältnisse im Wohlfahrtsstaat | dampfboot-verlag.de</a>
                            </p>
                        </li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
    </div> 
</div> 




	
<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>
