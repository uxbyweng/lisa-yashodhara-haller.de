<?php 
$metaTitle = "Projekt GagS | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Projekt GagS: Infos zum Projekt Gemeinschaftliche oder Alleinausübung der gemeinsamen elterlichen Sorge?";
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
                        <span>GagS</span> - Gemeinschaftliche oder Alleinausübung der gemeinsamen elterlichen Sorge?
                    </h1>
                    <h2>
                        Ein internationaler Vergleich der Rechtsregeln und ihr Einfluss auf die Verhandlungsmacht
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
                            Ein Ländervergleich der international-rechtlichen Regelungen zur elterlichen Sorge unter Berücksichtigung der Geschlechterperspektive.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Stiftung Universität Hildesheim
                                    <br><a href="https://www.uni-hildesheim.de/mom-projekt/gemeinschaftliche-oder-alleinausuebung-der-gemeinsamen-elterlichen-sorge-ein-internationaler-vergleich-der-rechtsregeln-und-ihr-einfluss-auf-verhandlungsmacht/" target="_blank">Link zum Projekt</a>
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Projektleitung
                                </div>
                                <div class="sb-text">
                                    Prof. Dr. Kirsten Scheiwe
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit
                                </div>
                                <div class="sb-text">
                                    Wissenschaftliche Projektdurchführung mit Sevda Evcil
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Förderung
                                </div>
                                <div class="sb-text">
                                   Förderlinie des Niedersächsischen Ministeriums für Wissenschaft und Kultur
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
                            'path' => "/images/projects/img_2017_gags_xl.jpg",
                            'alt' => "Vintage photo of a woman in a fur hat and coat, a child in winter attire, and a bridled horse.",
                            'caption' => "© Photo: unknown"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <!-- ZWISCHENÜBERSCHRIFT -->
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Analyse und Auswirkungen der Regelungen zur gemeinsamen elterlichen Sorge
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <!-- ABSATZ 01 -->
                    <p>
                        Die deutschen Regeln der Ausübung der gemeinsamen elterlichen Sorge betonen stark die Gemeinschaftlichkeit der Ausübung (§ 1627 BGB) und verlangen die gemeinsame rechtliche Vertretung des Kindes (§ 1629 Abs.1 S.2 BGB). Daraus resultiert ein Einigungszwang (§ 1627 S.2 BGB). Bei Uneinigkeit der Eltern in Angelegenheiten, die für das Kind von erheblicher Bedeutung sind, bleibt nur der Weg zum Familiengericht. Dieser Grundsatz gilt auch bei Getrenntleben der Eltern; nur Angelegenheiten des täglichen Lebens kann ein Elternteil allein entscheiden, während auch getrennt lebende Eltern in Angelegenheiten von erheblicher Bedeutung in gegenseitigem Einvernehmen handeln müssen (§ 1687 BGB).
                    </p>
                    
                    <!-- ABSATZ 02 -->
                    <p>
                        Seit die gemeinsame elterliche Sorge 1998 zum Regelfall geworden ist, wird bei Meinungsverschiedenheiten getrennt lebender Eltern immer häufiger vor den Familiengerichten darüber gestritten, wer die Entscheidung treffen kann und was Angelegenheiten des alltäglichen Lebens sind. Bei Getrenntleben der Eltern zeigen sich Nachteile des deutschen Modells der starken Betonung der gemeinschaftlichen Ausübung gemeinsamer Sorge.
                    </p>
                    
                    <!-- ABSATZ 03 -->
                    <p>
                        Der Einigungszwang bringt es mit sich, dass bei Uneinigkeit ein Elternteil eine Vetoposition erlangt und wichtige Entscheidungen blockieren kann. Viele europäische Rechtsordnungen haben ein anderes Modell der Ausübung gemeinsamer Sorge gewählt, die Alleinhandlungsmacht jedes Elternteils mit Widerspruchsmöglichkeit des anderen durch Anrufung des Gerichts (Länder der romanischen Rechtsordnung, Norwegen, England). Die Verhandlungsmacht und die Konfliktpunkte werden anders verteilt, denn es handelt sich nicht um eine Blockadeposition, sondern um eine (häufig nachträgliche) Korrekturmöglichkeit.
                    </p>
                    
                    <!-- ABSATZ 04 -->
                    <p>
                        Die Vor- und Nachteile dieser Regelungen sind international vergleichend bisher nicht erforscht worden; es fehlt darüber hinaus empirische Forschung darüber, wie sich die Unterschiede dieser rechtlichen Regelungen in der Praxis der Ausübung gemeinsamer elterlicher Sorge in vergleichbaren Konfliktsituationen auswirken. In Deutschland werden die geltenden Ausübungsregeln kaum hinterfragt, obwohl sie ursprünglich (nur) für verheiratete Eltern konzipiert wurden und seit 1958 zur Gleichberechtigung der im Familienrecht diskriminierten Mutter eines ehelichen Kindes beitragen sollten. Solange nach einer Scheidung in der Regel nur einem Elternteil die elterliche Sorge übertragen wurde, um das Kind nicht durch elterliche Uneinigkeit zu belasten, warf dies kaum Probleme auf. Das hat sich seit 1998 geändert.
                    </p>
                    
                    <!-- ABSATZ 05 -->
                    <p class="mb-80">
                        Demgegenüber kann das Modell der unabhängigen Ausübung mit Widerspruchsmöglichkeit durchaus Vorteile bieten - auch deshalb, weil es die Öffnung für ‚mehr als zwei Eltern‘ erleichtert. Aus Genderperspektive ist rechtsvergleichend zu untersuchen und machttheoretisch zu reflektieren, welche Auswirkungen die beiden Grundtypen der Regelung auf die Verhandlungspositionen der Beteiligten haben. Ein späteres empirisches international vergleichendes Forschungsprojekt soll vorbereitet werden.
                    </p>
                    
                </div>
                
            </div>
        </div>
    </div> 
</div> 




	
<?php 
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/footer.php" );
?>
