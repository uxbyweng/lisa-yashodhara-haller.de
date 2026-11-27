<?php
// Relaunch v01 – Impressum. Text unverändert aus /imprint/index.php (Stand 27.11.2026), Layout mit den Bausteinen des neuen Designs.
// Offen: Anschrift/Angaben an die neue Stelle (Hochschule Neubrandenburg) anpassen, juristisch prüfen lassen (docs/todo-gesamtliste.md).
$metaTitle = 'Impressum | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Impressum von Prof. Dr. Lisa Yashodhara Haller: Angaben zur Anbieterin, inhaltlichen Verantwortung, Urheberrecht und Haftung.';
$navActive = '';
require dirname(__DIR__) . '/includes/header.php';
?>
<section class="v01-pagehead v01-pagehead--simple v01-pagehead--legal">
    <div class="v01-container v01-pagehead__inner v01-pagehead__inner--simple">
        <?= v01_breadcrumb([['Impressum']]) ?>
        <p class="v01-eyebrow">Rechtliches</p>
        <h1 class="v01-h1 v01-h1--page">Impressum</h1>
    </div>
</section>

<section class="v01-section v01-section--lined-top v01-section--legal">
    <div class="v01-container">
        <article class="v01-legal">
            <h2>Anbieterin</h2>
            <p>
                <strong>Prof. Dr. Lisa Yashodhara Haller</strong><br>
                Berlin<br>
                Deutschland
            </p>

            <h2>Inhaltlich Verantwortliche</h2>
            <p>Inhaltlich Verantwortliche gemäß § 18 Abs. 2 ist Dr. Lisa Yashodhara Haller</p>

            <h2>Urheberrecht</h2>
            <p>Der gesamte Inhalt dieser Website unterliegt dem Urheberrechtsschutz.</p>
            <p>Jegliche Veränderung, Vervielfältigung, Verbreitung oder öffentliche Wiedergabe der Website oder von Teilen hiervon, gleich in welcher Art und Weise, bedarf der vorherigen schriftlichen Genehmigung durch den Autor.</p>

            <h2>Haftungshinweis</h2>
            <p>Trotz sorgfältiger inhaltlicher Kontrolle übernehmen wir keine Haftung für die Inhalte externer Links. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich.</p>

            <h2>Webdesign &amp; Webentwicklung</h2>
            <p>Karsten Weng, <a href="https://www.weng.eu" target="_blank" rel="noopener noreferrer">WENG.EU<span class="v01-sr"> (öffnet in neuem Tab)</span></a></p>
        </article>
    </div>
</section>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
