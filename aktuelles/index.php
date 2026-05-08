<?php 
$metaTitle = "Aktuelles | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Gesprächsabend zum Thema Neue Wege in der Familienfinanzierung im Bildungswerk der Heinrich Böll Stiftung";
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
                    <p class="blog-pubish-date">
                        30. August 2023
                    </p>
                    <h1 class="main-title">
                        <span>Vortrag:</span> Finanzierung von Familien neu denken
                    </h1>
                    <h2>
                        Gesprächsabend am 19. Okt. 2023 im Bildungswerk der Heinrich Böll Stiftung zu Kindergrundsicherung und Elterngeld
                    </h2>
                </div>
            </div>
        </div>
    </div> 
</div> 


<!-- 
=============================================
    DETAILS  
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
                            Am 19. Oktober 2023 veranstaltet das Bildungswerk Berlin eine Diskussion über sozial&shy;politische Maßnahmen aus dem Koalitions&shy;vertrag von SPD, FDP und Grünen. Schwerpunkte sind Kinder&shy;grund&shy;sicherung und Elterngeld.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Datum
                                </div>
                                <div class="sb-text">
                                    Donnerstag, 19. Oktober 2023
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Uhrzeit
                                </div>
                                <div class="sb-text">
                                    19:00 - 21:00 Uhr
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Ort
                                </div>
                                <div class="sb-text">
                                    Bildungswerk Berlin der Heinrich-Böll-Stiftung, Olivaer Platz 16, 10707 Berlin
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Link
                                </div>
                                <div class="sb-text">
                                    <a href="https://programm.bildungswerk-boell.de/index.php?kathaupt=11&knr=23-1003&kursname=Finanzierung+von+Familien+neu+denken+Kindergrundsicherung+und+Elterngeld" target="_blank">
                                        programm.bildungswerk-boell.de
                                    </a>
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
                            'path' => "/aktuelles/koerper-kinder-kassensturz_800x450.jpg",
                            'alt' => "Vortrag Ankündigung, Heinrich Böll Stiftung",
                            'caption' => "
                            © Photo by @weng"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Finazierung von Familien neu denken
                                </h2>
                            </div> 
                        </div>
                    </div>
                    <p>
                        Am 19. Oktober 2023 lädt das Bildungswerk Berlin der Heinrich-Böll-Stiftung zu einer spannenden Diskussionsveranstaltung im Rahmen der Reihe "Körper, Kinder, Kassensturz" ein. Es  werden politische Handlungsempfehlungen zu den bedeutendsten sozialpolitischen Vorhaben aus dem aktuellen Koalitionsvertrag von SPD, FDP und Bündnis 90/Die Grünen erörtert: die Kindergrundsicherung und das Elterngeld stehen dabei im Fokus.
                    </p>
                    <p>
                        Unter der Leitung von Prof. Dr. rer. pol. Lisa Yashodhara Haller, Wissenschaftliche Mitarbeiterin am Institut für Sozialforschung (IfS) der Goethe-Universität Frankfurt am Main, wird die Veranstaltung die Verknüpfungen zwischen staatlicher Lenkung unserer kapitalistischen Wirtschaft und scheinbar persönlichen Entscheidungen im Alltag beleuchten. Mit ihrer fundierten empirischen Forschung zeigt Haller, wie politische Steuerungsabsichten in individuellen Handlungen, Einstellungen und Lebensgestaltungen greifbar werden.
                    </p>
                    <p class="mb-50">
                        Die Veranstaltung ist kostenlos und findet am Donnerstag, 19. Oktober 2023 von 19:00 - 21:00 Uhr im Bildungswerk Berlin der Heinrich-Böll-Stiftung am Olivaer Platz 16 in 10707 Berlin statt. Sie wird durch Mittel der Stiftung Deutsche Klassenlotterie Berlin ermöglicht. Anmeldungen sind bis zum 19. Oktober 2023 möglich.
                    </p>
                    <h3 class="mb-20">
                        Link zur Veranstaltung: 
                    </h3>
                    <p>
                        <a href="#" target="_blank">
                            Finanzierung von Familien neu denken | gwi-boell.de
                        </a>
                    </p>
                </div> 
            </div>
        </div>
    </div> 
</div> 


<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>