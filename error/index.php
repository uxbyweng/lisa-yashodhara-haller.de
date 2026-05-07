<?php
$metaTitle = "Error 404 | Prof. Dr. Lisa Yashodhara Haller";
$metaDesc = "Opps! you’r on the wrong place.";
$metaKeyw = "Error, 404, Fehler";
include($_SERVER["DOCUMENT_ROOT"] . "/includes/header.php");
?>

<!-- 
=====================================================
    Hero Banner
=====================================================
-->
<div class="position-relative pt-200 lg-pt-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="md-mb-60">
                    <?php echo generate_breadcrumb(); ?>
                    <h1 class="main-title fw-bold tx-dark m0">
                        <span>Upps!</span> Du bist am falschen Ort.
                    </h1>
                    <p class="text-lg pt-60 pb-60 lg-pt-30 lg-pb-30">
                        Können Sie nicht finden, was Sie brauchen? Nehmen Sie sich einen Moment Zeit und starten Sie erneut von der Homepage aus.
                    </p>
                    <a href="/" class="btn-one fs-18 fw-500">
                        Zur Startseite
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-8 col-sm-10 ms-auto">
                <div class="img-meta-two d-inline-block position-relative pb-50">
                    <img src="/images/error/illustration_broken_bike.svg" alt="" class="m-auto" loading="lazy">
                    <img src="/images/shape/shape_16.svg" alt="" class="shapes shape-two" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>

<img src="/images/shape/shape_178.svg" alt="" class="shapes shape-one w-100 md-mb-60" loading="lazy">




<?php
include($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");
?>