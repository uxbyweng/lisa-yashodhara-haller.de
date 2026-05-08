<?php  
$metaTitle = "Projekt CMP | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Projekt CMP: Fragebogen zur Kindesunterhaltspolitik – finanzielle Verpflichtungen von Eltern gegenüber nicht im selben Haushalt lebenden Kindern.";
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
                        <span>CMP</span> - Unterhaltsrichtlinien für Kinder, gemeinsame Betreuung und neue familiäre Verpflichtungen Sorge?
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
                            German sub-project on the regulation of child maintenance, which deals with the financial obligations of parents towards children who do not live in the same household.
                        </p>
                        <div class="row">
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Institution
                                </div>
                                <div class="sb-text">
                                    University of Turku Finland
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Projektleitung
                                </div>
                                <div class="sb-text">
                                    Prof. Dr. Mia Hakovirta
                                </div>
                            </div>
                            <div class="col-12 mb-30">
                                <div class="sb-title">
                                    Tätigkeit:
                                </div>
                                <div class="sb-text">
                                    Wissenschaftlichen Durchführung des deutschen Projektes
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
                            'path' => "/images/projects/img_2020_cmp_xl.jpg",
                            'alt' => "Vintage photo of a woman in a fur hat and coat, a child in winter attire, and a bridled horse.",
                            'caption' => "© Photo by @jmuniz on unsplash.com"
                        ]
                    ];
                    render_gallery($imageData);
                    ?>
                    
                    <!-- ZWISCHENÜBERSCHRIFT -->
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="mb-40 pt-70 lg-pt-30 lg-mb-30">
                                <h2 class="main-title">
                                    Child Maintenance in Germany
                                </h2>
                            </div> 
                        </div>
                    </div>
                    
                    <!-- ABSATZ 01 -->
                    <p>
                        <strong>Schwerpunkt</strong><br>
                        Dieser Fragebogen betrifft die Unterhaltsregelung für Kinder in Ihrem Land. Unter Kindesunterhalt verstehen wir das System, mit dem Eltern ihren finanziellen Verpflichtungen gegenüber Kindern nachkommen, mit denen sie nicht zusammenleben. Diese finanziellen Verpflichtungen entstehen, wenn die Eltern nach einer Scheidung oder Trennung getrennt leben oder nie zusammengelebt haben.
                    </p>
                    
                    <!-- ABSATZ 02 -->
                    <p class="mb-80">
                       <strong>Geltungsbereich</strong><br>
                        Es geht uns um regelmäßige Zahlungen zur finanziellen Unterstützung, die wir als Kindesunterhaltspflichten bezeichnen. Dieser Begriff bezieht sich auf den Geldbetrag, den der gebietsfremde Elternteil zahlen muss (oder zu zahlen bereit ist). In manchen Fachliteratur oder Ländern wird dies auch als Auszeichnung oder Orden bezeichnet. In den meisten Ländern wird das Unterhaltssystem für Kinder eine Kombination aus privaten freiwilligen Vereinbarungen, formellen Vereinbarungen von Gerichten und formellen Vereinbarungen anderer Organisationen oder Agenturen sein. Wir suchen Informationen zu all diesen Themen. Wir möchten verstehen, wie die formelle Verpflichtung in verschiedenen Situationen gemäß den Gesetzen, Vorschriften oder der gängigen Praxis Ihres Landes aussehen würde, unabhängig davon, ob der andere Elternteil oder das andere Kind das Geld tatsächlich erhält oder nicht.
                    </p>
                    
                    <!-- VERÖFFENTLICHUNGEN ZUM THEMA -->
                    <h3 class="mb-20">
                        Veröffentlichungen zum deutschen Unterhaltsrecht:
                    </h3>
                    <ul class="mb-80">
                        <li>
                            <p>
                                <u>Haller, Lisa Yashodhara (2022):</u><br>
                                <strong>Unterhalt.</strong> In: Lisa Yashodhara Haller, Alicia Schlender (Hrsg.) Handbuch Feministische Perspektiven auf Elternschaft. Opladen: Barbara Budrich Verlag, S.149-162.<br>
                                <a href="https://shop.budrich.de/produkt/handbuch-feministische-perspektiven-auf-elternschaft/" target="_blank">Handbuch Feministische Perspektiven auf Elternschaft | shop.budrich.de</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                <u>Haller, Lisa Yashodhara (2022):</u><br>
                                <strong>Who cares? </strong> Das neue Unterhaltsrecht vor alten Fragen. In: Recht der Jugend und des Bildungswesens (RdBJ) Familienrechtliche Entwicklungen, 59 (4). Berlin. Berliner Wissenschafts- Verlag, S. 422-439.<br>
                                <a href="/downloads/0034-1312-2011-4-422.pdf" target="_blank">Haller, Who cares? Das neue Unterhaltsrecht vor alten Fragen | PDF</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                <u>Haller, Lisa Yashodhara; Henninger, Annette; Wimbauer, Christine (2011): </u><br>
                                <strong>Die Reduzierung der Kinderarmut als Rechentrick?</strong> Die Situation Unterhaltsberechtigter nach der Reform des Unterhaltsrechts. In: Zeitschrift für Sozialreform (ZSR), 57 (1). Stuttgart. Lucius & Lucius. S. 27-52.<br>
                                <a href="https://www.degruyter.com/document/doi/10.1515/zsr-2011-0103/html" target="_blank">Die Verringerung von Kinderarmut als Rechentrick? | degruyter.com</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                <u>Haller, Lisa Yashodhara (2010):</u><br>
                                Unterm Strich: <strong>Die Auswirkungen der Rangfolgenänderung im neuen Unterhaltsrecht.</strong> In: Kirsten Scheiwe, Maria Wersig (Hrsg.) Einer zahlt und eine betreut? Rollenbilder im Kindesunterhaltsrecht im Wandel. Schriften zum Familien- und Erbrecht. Bd. 1. Baden-Baden: Nomos. S. 215-234.<br>
                                <a href="/downloads/1001213920.pdf" target="_blank">Einer zahlt und eine betreut? |  PDF</a>
                            </p>
                        </li>
                        <li class="mt-20">
                            <p>
                                <u>Haller, Lisa Yashodhara (2010):</u><br>
                                <strong>Die Reform des Unterhaltsrechts und ihre geschlechterpolitischen Implikationen.</strong>  In: Diana Auth, Eva Buchholz, Stefanie Janczyk (Hrsg.) Selektive Emanzipation. Analysen zur Gleichstellungs- und Familienpolitik. Opladen. Barbara Budrich Verlag. S. 173-194.<br>
                                <a href="https://shop.budrich.de/produkt/selektive-emanzipation/" target="_blank">Selektive Emanzipation. | shop.budrich.de</a>
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
