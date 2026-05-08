<?php 
$metaTitle = "Projekt MOM | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Infos zum Projekt Macht und Ohnmacht der Mutterschaft (MOM)";
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
                        <span>MOM</span> - Macht und Ohnmacht der Mutterschaft.
                    </h1>
                    <h2>
                        Die geschlechterdifferente Regulierung von Elternschaft im Recht, ihre Legitimation und Kritik aus gendertheoretischer Sicht
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
                            Traditionelle Annahmen der Geschlechterdifferenzen werden in den rechtlichen Regelungen zur Mutter und Vaterschaft untersucht und in Bezug auf aktuelle Gesellschaftsentwicklungen kritisch hinterfragt.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    Stiftung Universität Hildesheim
                                    <br><a href="https://www.uni-hildesheim.de/mom-projekt/" target="_blank">Link zum Projekt</a>
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
                                    Projektkoordinatorin
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
                    
                    <?php
                    /* Image Gallery Component ----- */
                    $imageData = [
                        [
                            'path' => "/images/projects/img_2018_mom_xl.jpg",
                            'alt' => "Schwarzweißfoto auf dem eine Mutter ihr neugeborenes Baby im Arm hält",
                            'caption' => "© Foto by @svalenas on unsplash.com"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Rechtliche Regelungen rund um die Mutter und Vaterschaft
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <p>
                        Während Vaterschaften im Recht ein vielfach diskutiertes Thema sind, gilt Mutterschaft weitgehend als etwas ‚Selbstverständliches‘. Die rechtlichen Regelungen der Mutterschaft im deutschen Recht sind von einem einfachen Konzept geprägt: Mutter eines Kindes ist ‚die Frau, die es geboren hat‘ (§ 1591 BGB). Praktiken, die dazu führen, dass mehrere Frauen als Mutter eines Kindes in Frage kommen, wie Leihmutterschaft und Eizellspende, sind in Deutschland verboten; begründet werden diese Verbote ausdrücklich mit der Intention, eine „gespaltene Mutterschaft“ zu vermeiden (im Gegensatz zur Vaterschaft). Auch die Anfechtung der Mutterschaft ist rechtlich ausgeschlossen.
                    </p>
                    <p>
                        Gleichzeitig hat sich im Recht die Tendenz zur formalen Gleichheit von Mutter und Vater als Eltern(teile) durchgesetzt – aber nicht vollständig. Wichtige Unterschiede zwischen Mutterschaft und Vaterschaft bleiben im Abstammungsrecht und im Sorgerecht.
                    </p>
                    
                    <p>
                        Besonders deutlich zeigt sich die geschlechterdifferente Konstruktion von Elternschaft immer dann, wenn Kinder in einer eingetragenen Lebenspartnerschaft aufwachsen und die Partner_innen eine gemeinsame Elternschaft anstreben. In Deutschland können sie mittlerweile über die Stiefkind- oder Sukzessivadoption gemeinsam Eltern werden, andere Optionen, wie die gemeinschaftliche Adoption oder die gemeinsame Elternschaft nach Samenspende, bleiben ihnen jedoch verschlossen.
                    </p>
                    
                    <p>
                        Während die Diskussionen um gleichgeschlechtliche Elternschaft und die Entwicklungen der Reproduktionsmedizin die jahrzehntelange Annahme, dass ein Kind rechtlich zwei verschiedengeschlechtliche Eltern haben müsse, in Frage gestellt haben, bleibt eine weitere Grundannahme des Familienrechts – dass ein Kind nur zwei und nicht mehr Elternteile haben könne – weitgehend unhinterfragt bestehen. Zur Annahme der Dichotomie von Vater- und Mutterschaft gehört auch die Begrenzung auf maximal zwei Elternteile und der weitgehende Ausschluss von ‚sozialen Eltern‘ als rechtlichen Eltern.
                    </p>
                    
                    <p class="mb-80">
                        Die Beschäftigung mit dem Begriff der Mutterschaft ist aus der Perspektive der Rechtswissenschaft und der Legal Gender Studies relevant, weil (1) Mutterschaft einer der wenigen verbliebenen Lebensbereiche ist, in denen im Abstammungsrecht noch einige geschlechterdifferente Regelungen bestehen und bis vor relativ kurzer Zeit weitgehend unhinterfragt geblieben sind; (2) dies vor dem Hintergrund des Grundsatzes des Gleichbehandlung der Geschlechter (Art. 3 Abs. 2, 3 S. 1 GG) kritisch zu hinterfragen ist; (3) dies zudem durch neuere gesellschaftliche und technische Entwicklungen massiv in Frage gestellt wird (Leihmutterschaft, Eizellspende, Embryoadoption „doppelte Mutterschaft“ nach Stiefkindadoption durch den/die Lebenspartner_in); (4) das Recht auf diese Herausforderungen in Deutschland bislang nur zögerlich und punktuell reagiert. Das Forschungsprojekt analysiert und hinterfragt kritisch den rechtswissenschaftlichen Diskurs zu Mutterschaft aus transdisziplinärer und rechtsvergleichender Perspektive, um der spezifischen kulturellen Verortung von Mutterschaft in Recht und Gesellschaft Rechnung zu tragen. Durch eine Vertiefung des Dialogs zwischen Gender Studies und Rechtswissenschaft soll das Forschungsfeld „Legal Gender Studies“ weiterentwickelt und gestärkt werden.
                    </p>
                    
                    <h3 class="mb-20">
                        Die Ergebnisse des Projektes können Sie hier einsehen:
                    </h3>
                    <ul class="mb-40">
                        <li>
                            <p>
                                <a href="https://www.uni-hildesheim.de/mom-projekt/" target="_blank">MOM Projektseite | uni-hildesheim.de</a>
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
