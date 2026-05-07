<?php 
$metaTitle = "Projekt MASTER | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Template als Grundlage für Projekt Seiten (MASTER)";
$metaKeyw = "[Projekt-Keyword 1], [Projekt-Keyword 2], [Projekt-Keyword 3]";
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
                        Projekt <span>Master</span> Überschrift
                    </h1>
                    <h2>
                        Projekt Master Unterüberschrift
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
                            Info-Text zum Projekt-Thema dieser Seite, mit maximal 150 - 170 Zeichen bzw. 20 - 30 Wörtern, der zur kurzen Info dienen soll, worum es bei diesem Projekt geht.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Datum
                                </div>
                                <div class="sb-text">
                                    Januar, 2000
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Auftraggeber
                                </div>
                                <div class="sb-text">
                                    Organisation
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
                    /* path = relativer Bildpfad
                    /* alt = Altermativ-Text für Bild
                    /* 1 Bild = Einbindung als einzelnen Bild
                    /* 2 od. mehr Bilder = Einbindung als Slider */
                    $imageData = [
                        [
                            'path' => "/images/placeholder/img_91.jpg",
                            'alt' => "Beschreibung des 1. Bildes "
                        ],
                        [
                            'path' => "/images/placeholder/img_91.jpg",
                            'alt' => "Beschreibung des 2. Bildes"
                        ],
                        [
                            'path' => "/images/placeholder/img_91.jpg",
                            'alt' => "Beschreibung des 3. Bildes"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Masterprojekt: Fokus auf Innovation und Kreativität
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <p>
                        Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße. Ich bin allein und freue mich meines Lebens in dieser Gegend, die für solche Seelen geschaffen ist wie die meine.
                    </p>
                    
                    <p>
                        Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße. Ich bin allein und freue mich meines Lebens in dieser Gegend, die für solche Seelen geschaffen ist wie die meine.
                    </p>
                                        
                    <p>
                        Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße. Ich bin allein und freue mich meines Lebens in dieser Gegend, die für solche Seelen geschaffen ist wie die meine.
                    </p>
                    
                    <!-- 
                    ### 3er Bild Kombination ###
                    * 2 Bilder à 460x400 px
                    * 1 Bild à 960x510 px
                    * Wenn nicht benötigt, einfach entfernen
                    * Links auf den Bildern öffnen das Bild in eine Lightbox etwas vergrößert.
                    * Links können auch einfach entfernt werden.
                    -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-meta mt-30 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                <a class="fancybox d-block" data-fancybox="" href="/images/placeholder/img_89.jpg" tabindex="-1">
                                    <img src="/images/placeholder/img_89.jpg" alt="Bildbeschreibung Bild 01" class="lazy-img w-100">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="img-meta mt-30 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                                <a class="fancybox d-block" data-fancybox="" href="/images/placeholder/img_90.jpg" tabindex="-1">
                                    <img src="/images/placeholder/img_90.jpg" alt="Bildbeschreibung Bild 02" class="lazy-img w-100">
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="img-meta mt-30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <a class="fancybox d-block" data-fancybox="" href="/images/placeholder/img_91.jpg" tabindex="-1">
                                    <img src="/images/placeholder/img_91.jpg" alt="Bildbeschreibung Bild 03" class="lazy-img w-100">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Masterprojekt: Fokus auf Innovation und Kreativität
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <p>
                        Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße. Ich bin allein und freue mich meines Lebens in dieser Gegend, die für solche Seelen geschaffen ist wie die meine.
                    </p>
                    
                    <p>
                        Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße. Ich bin allein und freue mich meines Lebens in dieser Gegend, die für solche Seelen geschaffen ist wie die meine.
                    </p>
                    
                    <div class="mb-50"></div>
                    
                    <h3 class="row mb-20">
                        1 Video zum Thema:
                    </h3>
                    
                    <!-- 
                    =============================================
                        YOUTUBE | 1 VIDEO 
                    ============================================== 
                    -->
                    <?php 
                    // YouTube-ID und Startzeit als Parameter 
                    youtube_video('YtzVA6RSR_o', 1193); 
                    ?>

                    <div class="mb-50"></div>
                    
                    <!-- 
                    =============================================
                        YOUTUBE | 3 VIDEOS  
                    ============================================== 
                    -->
                    <h3 class="row mb-20">
                        3 Videos zum Thema:
                    </h3>
                    <div class="row mb-60">
                        <div class="col-md-4 mb-20">
                            <?php youtube_video('q9OKfC6cDv8', 0001); ?>
                        </div>
                        <div class="col-md-4 mb-20">
                            <?php youtube_video('uYD4HW7dd_g', 0002); ?>
                        </div>
                        <div class="col-md-4 mb-20">
                            <?php youtube_video('q9OKfC6cDv8', 0002); ?>
                        </div>
                    </div>
                    
                </div> 

            </div>
        </div>
    </div> 
</div> 




<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>