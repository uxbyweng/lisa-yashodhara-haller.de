<?php 
$metaTitle = "Projekt PRiNa | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Politiken der Reproduktion (PRiNa)";
$metaKeyw = "Reproduktion, Feminismus, Geschlecht, Norm, Elternschaft, Regulation";
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
                        <span>PRiNa</span> – Politiken der Reproduktion, interdisziplinäre Nachwuchsforscher*innengruppe
                    </h1>
                    <h2>
                        Umkämpfte Forschungsperspektiven und Praxisfelder
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
                            Das Netzwerk trägt zu einem Ausbau des Themenfelds „Politiken der Reproduktion“ in Wissenschaft und Gesellschaft bei.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Laufzeit
                                </div>
                                <div class="sb-text">
                                    unbegrenzt
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Justus-Liebig-Universität Gießen
                                    <br><a href="https://www.uni-giessen.de/de/fbz/zentren/ggs/prina" target="_blank">Link zu PRiNa</a>
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
                            'path' => "/images/projects/PRiNajpg.jpg",
                            'alt' => "Buchcover: Politiken der Reproduktion - Umkämpfte Forschungsperspektiven und Praxisfelder"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Interdisziplinäre Nachwuchs&shy;forscher*&shy;innengruppe
                                </h2>
                            </div>
                        </div>
                    </div>
                    <p>
                        In dem Netzwerk PRiNa wird mit dem inhaltlichen Fokus auf die „Politiken der Reproduktion“ ein Forschungsgebiet aufgegriffen, das in besonderer Weise die gesellschaftliche Konstruktion und Strukturierung der Geschlechterverhältnisse betrifft.
                    </p>
                    <p class="mb-80">
                        Nicht nur in wissenschaftlichen Diskursen, sondern auch in Politik und Gesellschaft haben Themen aus dem Feld „Politiken der Reproduktion“ eine neue Brisanz erhalten und sind Gegenstand neuer Kämpfe und gesellschaftlicher Aushandlungen.
                    </p>
                    <h3 class="mb-20">
                        Die Debatten der dem Netzwerk angehörigen Wissenschaftler*innen können Sie kostenfrei hier einsehen:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                <a href="https://www.transcript-verlag.de/978-3-8376-5272-7/politiken-der-reproduktion/?c=311000219" target="_blank">Politiken der Reproduktion- Umkämpfte Forschungsperspektiven und Praxisfelder | transcript-verlag.de</a>
                            </p>
                        </li>

                    </ul>
                    <p class="mb-40">
                        Zur weiteren inhaltlichen Vernetzung von Wissenschaftler*innen im Bereich der Politiken der Reproduktion, die im Themenfeld „Reproduktive Gerechtigkeit“ forschen, wurde ein DFG Antrag Wissenschaftliche Netzwerke erarbeitet.
                    </p>
                    <p class="mb-50">
                        Beantragt bei der DFG Deutschen Forschungsgemeinschaft.
                    </p>
                </div>
            </div>
        </div>
    </div> 
</div> 




	
<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>
