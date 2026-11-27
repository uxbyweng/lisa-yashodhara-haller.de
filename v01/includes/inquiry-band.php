<?php
/**
 * Relaunch v01 – kompakter Anfrage-Streifen für Unterseiten (Vorträge, Workshops, Beratung).
 * Optional vor dem Einbinden setzen: $bandTitle, $bandText.
 */
$bandTitle = $bandTitle ?? 'Vorträge, Workshops und Beratung';
$bandText  = $bandText  ?? 'Für Konferenzen, Fachverbände, Unternehmen und Einrichtungen der Sozialen Arbeit, zu Sozialpolitik, Elternschaft und Geschlecht.';
?>
<section class="v01-section v01-section--rose v01-section--lined-rose v01-section--compact">
    <div class="v01-container v01-band">
        <div class="v01-band__text">
            <p class="v01-eyebrow">Für Veranstalter*innen</p>
            <h2 class="v01-h2 v01-h2--md"><?= htmlspecialchars($bandTitle, ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="v01-band__lead"><?= htmlspecialchars($bandText, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="v01-band__actions">
            <a class="v01-btn v01-btn--primary" href="<?= v01_url('kontakt') ?>">Anfrage senden</a>
            <a class="v01-link mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a>
        </div>
    </div>
</section>
