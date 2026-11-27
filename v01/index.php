<?php
// Relaunch v01 – Startseite (Phase 1: Dummy, Inhalte folgen in Phase 2)
$metaTitle = 'Prof. Dr. Lisa Yashodhara Haller – Sozialpolitik, Soziale Dienste, Elternschaft';
$metaDesc  = 'Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste an der Hochschule Neubrandenburg. Forschung, Lehre und Beratung zu Sozialpolitik, Familien- und Geschlechterverhältnissen.';
$navActive = '';
require __DIR__ . '/includes/header.php';
?>
<section class="v01-hero">
    <div class="v01-container v01-hero__inner">
        <div class="v01-hero__text">
            <p class="v01-eyebrow">Sozialpolitik · Soziale Dienste · Elternschaft</p>
            <h1 class="v01-h1">Prof. Dr. Lisa Yashodhara Haller</h1>
            <p class="v01-lead">Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste. Sie forscht, lehrt und berät zu Sozialpolitik, der Ökonomie sozialer Dienste sowie zu Familien- und Geschlechterverhältnissen.</p>
            <div class="v01-hero__actions">
                <a class="v01-btn v01-btn--primary" href="<?= v01_url('publikationen') ?>">Publikationen</a>
                <a class="v01-btn v01-btn--ghost" href="<?= v01_url('kontakt') ?>">Vortrag oder Workshop anfragen</a>
            </div>
            <a class="v01-hero__org" href="https://www.hs-nb.de/" target="_blank" rel="noopener noreferrer" aria-label="Hochschule Neubrandenburg (öffnet in neuem Tab)">
                <img src="/images/v01/logo-hs-neubrandenburg.svg" width="200" height="52" alt="Hochschule Neubrandenburg – University of Applied Sciences">
            </a>
        </div>
        <figure class="v01-hero__figure">
            <picture>
                <source type="image/webp" srcset="/images/v01/hero-lisa-haller.webp">
                <img src="/images/v01/hero-lisa-haller.jpg" width="1313" height="1641" alt="Porträt von Lisa Yashodhara Haller" fetchpriority="high">
            </picture>
        </figure>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
