<?php 
$metaTitle = "Projekt LAA | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Liebe, Arbeit, Anerkennung – Anerkennung und Ungleichheit in Doppelkarriere-Paaren (LAA)";
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
                        <span>LAA</span> - Liebe, Arbeit, Anerkennung -
                    </h1>
                    <h2>
                        Anerkennung und Ungleichheit in Doppelkarriere-Paaren
                    </h2>
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
                            Im Zuge gesellschaftlicher Modernisierung durch die steigende Erwerbstätigkeit von Frauen sowie durch eine Entgrenzung von ‚Arbeit’ und ‚Leben’ wird die Gültigkeit des männlichen Familienernährer- und des weiblichen Hausfrauenmodells geprüft.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    WZB Wissenschaftszentrum Berlin für Sozialforschung
                                    <br><a href="https://www.wzb.eu/de/forschung/beendete-forschungsprogramme/liebe-arbeit-anerkennung" target="_blank">Link zum Projekt</a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Projektleitung
                                </div>
                                <div class="sb-text">
                                    Prof. Dr. Christine Wimbauer
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Beschäftigt als studentische Hilfskraft für die Durchführung der Diplomarbeit
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                    2006 – 2010
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Förderung
                                </div>
                                <div class="sb-text">
                                    DFG Deutsche Forschungsgemeinschaft
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
                            'path' => "/images/projects/img_2008_laa_xl.jpg",
                            'alt' => "Team Business Research Office",
                            'caption' => "© Photo by @jasongoodman_youxventures on unsplash.com"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <!-- ZWISCHENÜBERSCHRIFT -->
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                   Wie beeinflussen gesellschaftlichen Anerkennungsstrukturen die Anerkennungschancen in Paarbeziehungen?
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <!-- ABSATZ 01 -->
                    <p>
                        Das Projekt „‚Liebe’, (Erwerbs-)Arbeit, Anerkennung – Anerkennung und Ungleichheit in Doppelkarriere-Paaren“ fragt nach Anerkennungschancen in modernen Paarbeziehungen, insbesondere in Doppelkarriere-Paaren – und nach deren Verhältnis zu gesellschaftlichen Anerkennungsstrukturen. Neuere theoretische wie auch empirisch fundierte Überlegungen gehen von einer Pluralisierung und Entgrenzung gesellschaftlicher Anerkennungsforen und -formen aus. Im Zuge gesellschaftlicher Modernisierung wird, so die Grundannahme, durch die steigende Erwerbstätigkeit von Frauen sowie durch eine Entgrenzung von ‚Arbeit’ und ‚Leben’ die Gültigkeit des männlichen Familienernährer- und des weiblichen Hausfrauenmodells samt damit einhergehender Sphärentrennung in Frage gestellt. 
                    </p>
                    
                    <!-- ABSATZ 02 -->
                    <p>
                        Was bedeutet dies für intersubjektive und gesellschaftliche Anerkennungsverhältnisse? Geht damit eine Pluralisierung, Entgrenzung und Egalisierung intersubjektiver Anerkennungschancen innerhalb von Paarbeziehungen und von gesellschaftlichen Anerkennungsforen einher? Welche Anerkennungschancen bestehen in modernen Zwei-Verdiener-Paaren und insbesondere in Dual Career Couples, für welche Handlungen, Eigenschaften und Fähigkeiten finden Partner in solchen Paaren intersubjektiv Wertschätzung? Wie geht diese wechselseitige Anerkennung vonstatten? Zeigen sich hier geschlechtsspezifische Ungleichheiten? Wie beeinflussen welche gesellschaftlichen Anerkennungsstrukturen die intersubjektiven Anerkennungschancen in Paarbeziehungen? Und welche Konsequenzen ergeben sich aus diesen Antworten für gesellschaftliche Anerkennungsverhältnisse? 
                    </p>
                    
                    <!-- ABSATZ 03 -->
                    <p class="mb-80">
                        Diese Fragen werden im Projekt auf drei Analyseebenen bearbeitet: 1. Analyse der in wohlfahrtsstaatliche Institutionen eingelassenen paarbezogenen Anerkennungsordnung sowie deren Veränderungen angesichts des gegenwärtigen Sozialstaatsumbaus; 2. Analyse des Umgangs mit Dual Career Couples in Arbeitsorganisationen; 3. Empirische Untersuchung der Anerkennungschancen und - strukturen in Dual Career Couples. 4. In der abschließenden Synthese wird nach den theoretischen Konsequenzen der empirischen Ergebnisse für gesellschaftliche Anerkennungsverhältnisse gefragt.
                    </p>
                    
                    <!-- VERÖFFENTLICHUNGEN ZUM THEMA -->
                    <h3 class="mb-20">
                        Die Ergebnisse meiner Teiluntersuchung können Sie hier einsehen:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                Arbeitspapier 18 der Emmy-Noether-Nachwuchsgruppe, Liebe`, (Erwerbs-)Arbeit, Anerkennung – Anerkennung und Ungleichhheit in Doppelkarriere-Paaren am Wissenschaftszentrum Berlin für Sozialforschung (WZB). DFG-Projekt WI 214/2-1.<br>
                                <a href="https://www.researchgate.net/publication/291697056_Die_Reform_des_Unterhaltsrechts_-_Ein_Paradigmenwechsel_in_der_deutschen_Existenzsicherung_vom_Familienernahrer_zum_adult_worker_model">Die Reform des Unterhaltsrechts - Ein Paradigmenwechsel in der deutschen Existenzsicherung vom Familienernährer zum adult worker model? | researchgate.net</a>
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
