<?php 
$metaTitle = "Projekt GKJV | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Konzeptualisierung eines Beratungsinstruments zur Sensibilisierung der Multiplikator*innen. ";
$metaKeyw = "Gleichstellung, GKJV, Kinder, Jugendhilfe, Vorarlberg, Familie, Beratung";
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
                        <span>GKJV</span> – Gleichstellungsorientierte Kinder- und Jugendhilfe Vorarlberg.
                    </h1>
                    <h2>
                        Konzeptualisierung eines Beratungsinstruments zur Sensibilisierung der Multiplikator*innen
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
                            Gleich&shy;stellungs&shy;orientierte Kinder- und Jugend&shy;hilfe Vorarlberg. Konzept&shy;uali&shy;sierung eines Beratungs&shy;instruments zur Sensi&shy;bili&shy;sierung der Multiplikator*innen.

                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Datum
                                </div>
                                <div class="sb-text">
                                    2021
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Organisation
                                </div>
                                <div class="sb-text">
                                     <a href="https://www.femail.at/" target="_blank">
                                        FEMAIL Vorarlberg
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Projektleitung
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
                            'path' => "/images/projects/img_2021_gkjv_xl.jpg",
                            'alt' => "Eine Gruppe Menschen, die auf einer Wiese im Kreis stehen",
                            'caption' => "© Photo by @??? on unsplash.com"
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
                        Im Projekt GKJV wird ein Beratungsinstrument für elternbezogene Beratungsangebote entwickelt. Es sensibilisiert sowohl die beratenden Fachkräfte als auch die beratenen Eltern in Bezug auf die Zuschreibung von Versorgungsleistungen, die im Alltag junger Familien anfällt. Damit Sensibilisiert das Projekt für Gleichstellungsaspekte in der Kinder- Jugendhilfe.
                    </p>
                    <p class="mb-50">
                        In Anschluss an die Erhebungsmethode zur Generierung interaktiver Paardiskussionen aus Hallers erster Untersuchung zu den <a href="https://www.google.de/books/edition/Elternschaft_im_Kapitalismus/yo9jDwAAQBAJ?hl=de&gbpv=1&dq=lisa+yashodhara+haller&printsec=frontcover" target="_blank">staatlichen Einflussfaktoren auf die Arbeitsteilung junger Eltern</a> wird die Methode in Kooperation mit den zentralen Vertreter*innen der Kinder- und Jugendhilfe Vorarlberg weiterentwickelt. Dabei werden folgende Fragen bearbeitet: Wie kann das Erhebungsinstrument „Familienpolitisches Brettspiel“ zum Reflexions- und Beratungsinstrument für Fachkräfte der psychosozialen Berufe umgewandelt werden? Wie gestaltet sich das Brettspiel für die familienpolitischen Rahmenbedingungen? Wie kann die elterliche Arbeitsteilung reflexiver Gegenstand der Beratung werden?
                    </p>
                    <h3 class="mb-20">
                        Die Inputs zu den digitalen Workshops können Sie hier einsehen:
                    </h3>
                    <!-- 3er VIDEO KOMBI -->
                    <div class="row mb-40">
                        <div class="col-sm-4">
                            <?php youtube_video('q9OKfC6cDv8', 1); ?>
                        </div>
                        <div class="col-sm-4">
                            <?php youtube_video('uYD4HW7dd_g', 2); ?>
                        </div>
                        <div class="col-sm-4">
                            <?php youtube_video('q9OKfC6cDv8', 1); ?>
                        </div>
                    </div>
                    <h3 class="mb-20">
                        Die Projektergebnisse können Sie hier einsehen:
                    </h3>
                    <ul class="mb-40">
                        <li>
                            <p>
                                <a href="/downloads/siö_216_1-2022_web.pdf" target="_blank">Gleichstellung als Mandat der Sozialen Arbeit | PDF</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <a href="/downloads/Haller,+Hefel_Gleichstellung+als+soziale+Innovation.pdf" target="_blank">Das familienpolitische Brettspiel als Werkzeug der Beratung | PDF</a>
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