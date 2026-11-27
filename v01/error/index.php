<?php
// Relaunch v01 – Fehlerseite (404). Echter Statuscode 404, nicht indexierbar (docs/todo-gesamtliste.md, H5).
http_response_code(404);
$metaTitle = 'Seite nicht gefunden | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Diese Seite gibt es nicht (mehr). Starten Sie erneut von der Startseite aus.';
$robots    = 'noindex,follow';
$navActive = '';
require dirname(__DIR__) . '/includes/header.php';
?>
<section class="v01-error-wrap">
    <div class="v01-container v01-error">
        <div class="v01-error__text">
            <p class="v01-eyebrow">Fehler 404</p>
            <h1 class="v01-h1 v01-h1--page">Upps! Du bist am falschen Ort.</h1>
            <p class="v01-lead">Können Sie nicht finden, was Sie brauchen? Nehmen Sie sich einen Moment Zeit und starten Sie erneut von der Startseite aus.</p>
            <a class="v01-btn v01-btn--primary" href="<?= v01_url('home') ?>">Zur Startseite <?= v01_arrow() ?></a>
            <ul class="v01-error__links" aria-label="Oder direkt zu">
                <li><a class="v01-link" href="<?= v01_url('profil') ?>">Profil</a></li>
                <li><a class="v01-link" href="<?= v01_url('forschung') ?>">Forschung</a></li>
                <li><a class="v01-link" href="<?= v01_url('publikationen') ?>">Publikationen</a></li>
                <li><a class="v01-link" href="<?= v01_url('lehre') ?>">Lehre</a></li>
                <li><a class="v01-link" href="<?= v01_url('kontakt') ?>">Kontakt</a></li>
            </ul>
        </div>
        <figure class="v01-error__art">
            <img src="/images/v01/illustration-broken-bike.svg" width="800" height="522" alt="Illustration: ein kaputtes Fahrrad">
        </figure>
    </div>
</section>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
