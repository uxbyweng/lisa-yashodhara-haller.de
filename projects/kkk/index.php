<?php 
$metaTitle = "Projekt KKK | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Körper, Kinder, Kassensturz. Handlungsempfehlungen für die Umsetzung des Koalitionsvertrags (KKK)";
$metaKeyw = "kkk, kinder, kassensturz";
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
                    <h1 class="main-title">
                        KKK – <span>Körper</span>, Kinder, Kassensturz. 
                    </h1>
                    <h2>
                        Handlungsempfehlungen für die Umsetzung des Koalitionsvertrags
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
                            In einer Reihe von Policy Papers werden aktuelle Vorhaben der Ampelkoalition zu familienrechtlichen Fragen aus einer intersektionalen Perspektive analysiert und von hier aus Handlungsempfehlungen entwickelt.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                    2023-2024
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Gunda-Werner-Institut der Heinrich-Böll-Stiftung<br>
                                    <a href="www.gwi-boell.de/de/koerper-kinder-kassensturz" target="_blank">
                                        Link zu den Policy-Papers
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Autorin
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- MAIN CONTENT (left) -->
                <div class="col-lg-8 order-md-1">
                    
                    <?php
                    /* Gallery Component ----- */
                    $imageData = [
                        [
                            'path' => "/images/projects/Koerper-Kinder-Kassensturz.jpg",
                            'alt' => "Ein Mann und eine Frau stehen nebeneinander und heben ihre Shirts, um ihre Bäuche zu zeigen, Pixaby-Foto-ID: 1410705"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Politikempfehlungen zu familienrechtlichen Fragen
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <p>
                        Das Projekt verfolgt das Ziel, reproduktionspolitische Versprechen des Koalitionsvertrags der aktuellen Bundesregierung aus feministischer Perspektive kritisch zu beleuchten und die Debatte um konkrete Handlungsempfehlungen an politische Entscheidungsträger*innen voranzutreiben. 
                    </p>
                    
                    <p class="mb-50">
                        Im Koalitionsvertrag wird deutlich, wie vielfältig reproduktionsrelevante Fragestellungen in verschiedene Familien- und Sozialpolitiken eingewoben sind. Aus intersektional-feministischer Perspektive analysieren wir verschiedene reproduktionspolitische Ansätze des Koalitionsvertrags und befragen diese auf normative Engführungen, emanzipatorische Potentiale und liberale Fallstricke, insbesondere mit Blick auf Ungleichheitsverhältnisse und differentielle Regulierungen von Körpern, Selbstbestimmungsmöglichkeiten und die Verteilung von Lebenschancen.
                    </p>
                    
                    <h3 class="mb-20">
                        Hier können Sie die Policy-Paper kostenlos downloaden: 
                    </h3>
                    <ul class="mb-40">
                        <li>
                            <p>
                                <a href="https://www.gwi-boell.de/de/koerper-kinder-kassensturz" target="_blank">Policy-Paper-Reihe Körper, Kinder, Kassensturz | gwi-boell.de</a>
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
