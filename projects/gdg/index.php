<?php 
$metaTitle = "Projekt GDG | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Geschäftsstelle Dritter Gleichstellungsbericht der Bundesregierung. (GDG)";
$metaKeyw = "Gleichstellungsbericht, Bundesregierung, geschlechtergerecht , Digitalisierung";
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
                        <span>GDG</span> – Dritter Gleichstellungsbericht der Bundesregierung. 
                    </h1>
                    <h2>
                        Digitalisierung geschlechtergerecht gestalten
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
                            Im Dritter Gleichstellungsbericht der Bundesregierung analysieren Expert:innen Auswirkungen, Chancen und Risiken des digitalen Wandels auf Frauen und Männer und geben Handlungsempfehlungen für eine inklusive, gerechte Digitalisierung.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Bundesministerium für Familie, Senioren, Frauen und Jugend
                                    <br><a href="https://www.dritter-gleichstellungsbericht.de/" target="_blank">Link zum Gleichstellungsbericht</a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Vorsitz der Kommission:
                                </div>
                                <div class="sb-text">
                                    Prof. Dr. Aysel Yollu-Tok
                                </div>
                            </div> 
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Wissenschaftliche Mitarbeiterin in der Geschäftsstelle für den Dritten Gleichstellungsbericht
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN CONTENT (left) -->
                <div class="col-lg-8 order-md-1">
                    <?php
                    /* Image Gallery Component ----- */
                    $imageData = [
                        [
                            'path' => "/images/projects/img_2021_gdg_xl.jpg",
                            'alt' => "Buchcover: Politiken der Reproduktion - Umkämpfte Forschungsperspektiven und Praxisfelder"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Wie kann Digitalisierung geschlechtergerecht gestaltet werden?
                                </h2>
                            </div> 
                        </div>
                    </div>
                    <p>
                        Der Dritte Gleichstellungsbericht besteht aus dem Gutachten einer unabhängigen Sachverständigenkommission, einer Stellungnahme der Bundesregierung zum Gutachten und einer Rezeptionsanalyse zum Zweiten Gleichstellungsbericht. Der Bericht beschäftigt sich mit der Frage, wie die Digitalisierung geschlechtergerecht gestaltet werden kann. 
                    </p>
                    <p class="mb-80">
                        Die Kommission stellt in ihrem Gutachten dar, welche Auswirkungen, Chancen und Risiken der digitale Wandel auf das Leben von Frauen und Männern hat – und wie sie sich zwischen den Geschlechtern unterscheiden. Zudem gibt sie Empfehlungen, wie eine an Gleichstellung orientierte Digitalisierung gestaltet werden könnte, um Verwirklichungschancen für alle Menschen zu bieten.
                    </p>
                    <h3 class="mb-20">
                        Den dritten Gleichstellungsbericht können Sie hier herunterladen:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                <a href="/downloads/dritter-gleichstellungsbericht-bundestagsdrucksache-data.pdf" target="_blank">Dritter Gleichstellungsbericht | PDF</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="/downloads/dritter-gleichstellungsbericht-eine-zusammenfassung-des-gutachtens-deutsch-data.pdf" target="_blank">Dritter Gleichstellungsbericht (Kurzfassung) | PDF</a>
                            </p>
                        </li>
                    </ul>
                    <h3 class="mb-20">
                        Weiterführende Links zum Thema:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                <a href="https://www.bmfsfj.de/bmfsfj/ministerium/berichte-der-bundesregierung/dritter-gleichstellungsbericht" target="_blank">www.bmfsfj.de/ [...] /dritter-gleichstellungsbericht</a>
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
