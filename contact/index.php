<?php 
$metaTitle = "Kontakt | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Kontaktieren Sie Prof. Dr. Lisa Yashodhara Haller für aktuelle Blogbeiträge zu Sozialpolitik, Elternschaft und Geschlechterdynamiken.";
$metaKeyw = "Kontakt, Sozialpolitik, Elternschaft, Geschlechterdynamiken, Gender, staatliche Steuerung, Kapital, Familienpolitik";
include( $_SERVER[ "DOCUMENT_ROOT" ] . "/includes/header.php" );
?>

		
<!-- 
=============================================
    KONTAKT FORMULAR
============================================== 
-->
<div class="inner-banner-three text-center p-30">
    <div class="bg-wrapper text-center">
        <div class="container">
            <h1 class="main-title tx-dark fw-bold">
                Kontakt

            </h1>
            <p class="fs-20 mt-30 lg-mt-20">
                Möchten Sie, dass ich einen Vortrag oder einen Workshop für Ihr Unternehmen oder Ihre Konferenz halte? Benötigen Sie Beratung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht? 
            </p>
        </div>
        <div class="container">
            <div class="contact-section-two text-start mt-80 lg-mt-60">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-style-three md-mb-60">
                            <form action="contact.php" id="contact-form" data-toggle="validator">
                                <div class="messages"></div>
                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <input type="text" placeholder="Ihr Name*" name="name" required="required" data-error="Name ist erforderlich.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-50">
                                            <input type="email" placeholder="E-Mail-Adresse*" name="email" required="required" data-error="Eine gültige E-Mail-Adresse ist erforderlich.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <textarea placeholder="Ihre Nachricht*" name="message" required="required" data-error="Bitte hinterlassen Sie mir eine Nachricht."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!-- Vor dem Absenden-Button -->
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>
                                                <input type="checkbox" name="privacy" required="required" data-error="Sie müssen die Datenschutzerklärung akzeptieren.">
                                                Ich habe die <a href="/privacy/">Datenschutzerklärung</a> gelesen und akzeptiere sie
                                            </label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-twentyOne fw-500 tran3s d-block">
                                            Mitteilung senden
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <!--form action="contact.php" id="contact-form" data-toggle="validator">
                                <div class="messages"></div>
                                <div class="row controls">
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <input type="text" placeholder="Ihr Name*" name="name" required="required" data-error="Name ist erforderlich.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-50">
                                            <input type="email" placeholder="E-Mail-Adresse*" name="email" required="required" data-error="Eine gültige E-Mail-Adresse ist erforderlich.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <textarea placeholder="Ihre Nachricht*" name="message" required="required" data-error="Bitte hinterlassen Sie mir eine Nachricht."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group-meta form-group mb-30">
                                            <label>
                                                <input type="checkbox" name="privacy" required="required" data-error="Sie müssen die Datenschutzerklärung akzeptieren.">
                                                Ich habe die <a href="/privacy/">Datenschutzerklärung</a> gelesen und akzeptiere sie
                                            </label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-twentyOne fw-500 tran3s d-block">
                                            Mitteilung senden
                                        </button>
                                    </div>
                                </div>
                            </form-->
                    </div>
                    <div class="col-xl-4 col-lg-5 ms-auto wow fadeInRight">
                        <div class="address-block-three d-flex mb-70 lg-mb-40 mt-20">
                            <img src="/images/contact/lisa_contact_250x250.jpg" alt="Dr. Lisa Yashodhara Haller" class="rounded-3">
                        </div> 
                        <div class="address-block-three d-flex mb-70 lg-mb-40">
                            <div class="icon"><img src="/images/icon/icon_162.svg" alt=""></div>
                            <div class="text">
                                <h5 class="title">Academic Networks</h5>
                                <a href="https://www.researchgate.net/profile/Lisa-Haller" target="_blank">researchgate.net</a><br>
                                <a href="https://orcid.org/0000-0001-5094-207X" target="_blank">OrcID</a><br>
                                <a href="mailto:L.Haller@em.uni-frankfurt.de" target="_blank">E-Mail</a>
                            </div>
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
