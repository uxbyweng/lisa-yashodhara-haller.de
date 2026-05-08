<?php 
$metaTitle = "Projekt VEIL | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Values, Equality & Differences in Liberal Democracies (VEIL)";
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
                        <span>VEIL</span> - Werte, Gleichheit und Unterschiede in liberalen Demokratien
                    </h1>
                    <h2>
                        Kopftuchdebatten in Europa
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
                            Das VEIL-Projekt erforscht die europäischen Debatten um das Kopftuch für muslimische Frauen und deren Einfluss auf liberale Werte und Geschlechternormen.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Otto-Suhr-Institut für Politikwissenschaft der Freien Universität Berlin
                                   <br><a href="https://cordis.europa.eu/project/id/28555/reporting/es" target="_blank">Link zum Projekt</a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Projektleitung
                                </div>
                                <div class="sb-text">
                                   PD Dr. Sabine Berghahn
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                               Studentische Mitarbeit
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                 2006 - 2007
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
                            'path' => "/images/projects/img_2007_veil_xl.jpg",
                            'alt' => "Portrait einer jungen Frau mit Kopftuch",
                            'caption' => "© Photo by @mruqi on unsplash.com"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Eine geschlechterkritische Analyse der europäischen Kopftuchdebatte
                                </h2>
                            </div> 
                        </div>
                    </div>
                    <p>
                        Im Rahmen des EU-Projekts „VEIL“ untersuchten Forscher aus acht europäischen Ländern die komplexen Debatten und gesetzlichen Regelungen bezüglich der Kopf- und Körperbedeckung von muslimischen Frauen. In Deutschland, wo rund 1,6 Millionen muslimische Frauen leben, hat die Debatte über das Kopftuch eine besondere Brisanz. Sie entzündet sich an Fragen seiner Symbolik: Ist es Ausdruck von Religiosität, Frauenunterdrückung oder einer Abgrenzung zur westlichen Kultur? In Deutschland begann die Auseinandersetzung 1998 mit dem Fall Fereshta Ludin, einer Lehrerin, der wegen ihres Kopftuchs eine Stelle verwehrt wurde. Das Bundesverfassungsgericht kam zu einem ambivalenten Kompromiss, der den Bundesländern erlaubt, eigene Kopftuchverbote zu erlassen, sofern sie eine „abstrakte“ Gefahr für die staatliche Neutralität oder den Schulfrieden sehen.
                    </p>
                    <p class="mb-80">
                        In der Folge erließen acht der 16 Bundesländer Gesetze zum Kopftuchverbot, die in zwei Modelle unterteilt werden können: ein „christlich-abendländisches“ und ein strikt säkulares. Während das säkulare Modell alle religiösen Symbole verbietet, erlaubt das christlich-abendländische christliche und jüdische Symbole. Beide Ansätze sind rechtlich und politisch umstritten und lassen die garantierte Religionsfreiheit sowie das Gleichheitsgebot des Grundgesetzes außer Acht. Die andere Hälfte der Bundesländer bleibt bei einer „offenen“ Neutralität, die religiöse Bekundungen erlaubt. Europa insgesamt tendiert zu einer rechtlichen Duldung des Kopftuchtragens, mit Ausnahmen in Ländern mit strikter säkularer Tradition wie Frankreich und der Türkei.
                    </p>
                </div>
                
            </div>
        </div>
    </div> 
</div> 




	
<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>
