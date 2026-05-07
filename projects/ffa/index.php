<?php 
$metaTitle = "Projekt FFA | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Projekt FFA: Infos zum Projekt FEMINISMUS Fragen und Antworten (FFA)";
$metaKeyw = "Feminismus, Gender-Pay-Gap, Fragen und Antworten, Broschüre";
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
                        FFA – <span>FEMINISMUS</span> Fragen und Antworten 
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
                            Was ist Feminismus? Was wird als Gender-Pay-Gap bezeichnet? Und welche Bedeutung hat Feminismus für Männer? Diese Fragen-Antworten-Reihe geht diesen und 24 weiteren Fragen zum Themenbereich nach.        
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                    2022-2023
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Berliner Landeszentrale für politische Bildung
                                    <br><a href="https://www.berlin.de/politische-bildung/publikationen/broschueren/2023-05_lpb_feminismus_bf.pdf" target="_blank">Link zur Broschüre</a>
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
                            'path' => "/images/projects/img_2023_ffa_xl.jpg",
                            'alt' => "Policy-Paper-Reihe Körper"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Bröschüre mit 27 Fragen zum Feminismus
                                </h2>
                            </div> 
                        </div>
                    </div>
                    <p>
                        Feministisch, antifeministisch, heteronormativ – Begriffe wie diese finden immer häufiger Verwendung. Aber wofür stehen sie genau, und was beinhaltet ein intersektionaler Feminismus eigentlich? In der Broschüre der Berliner Landeszentrale für politische Bildung beantwortet die Autorin Lisa Yashodhara Haller 27 Fragen, rund um das Thema Feminismus.
                    </p>
                    <p class="mb-50">
                        Wie alle Eigenpublikationen gibt es die Broschüre kostenlos in der Berliner Landeszentrale für politische Bildung.
                    </p>
                    <h3 class="mb-20">
                        Hier können Sie die Broschüre kostenfrei downloaden:
                    </h3>
                    <ul class="mb-40">
                        <li>
                            <p>
                                <a href="/downloads/2023-05_lpb_feminismus_bf.pdf" target="_blank">Feminismus Fragen und Antworten | PDF</a>
                            </p>
                        </li>
                    </ul>
                    <p class="mb-50">
                        Gefördert von der Berliner Landeszentrale für politische Bildung.
                    </p>
                </div> 
            </div>
        </div>
    </div> 
</div> 




<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>
