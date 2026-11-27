<?php
// Relaunch v01 – Lehre. Daten: v01/data/courses.php, Layout aus dem Entwurf (Lehre – Desktop).
// Alle Semester stehen serverseitig im HTML; die Reiter (js/v01-courses.js) blenden nur um.
$metaTitle = 'Lehre | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Lehrveranstaltungen von Prof. Dr. Lisa Yashodhara Haller an der Hochschule Neubrandenburg: aktuelle Lehre, Lehrarchiv, Gastvorträge und Ringvorlesungen.';
$ogImg     = 'og_lehre.jpg';
$navActive = 'lehre';
require dirname(__DIR__) . '/includes/header.php';

$data = require dirname(__DIR__) . '/data/courses.php';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
$lsfUrl = static fn(int $id): string => 'https://lsf.hs-nb.de/qisserver/rds?moduleCall=webInfo&publishConfFile=webInfo&publishSubDir=veranstaltung&state=verpublish&status=init&veranstaltung.veranstid=' . $id . '&vmfile=no';
$sprechzeitenUrl = 'https://www.hs-nb.de/fachbereich-soziale-arbeit-bildung-und-erziehung/ppages/lisa-yashodhara-haller/';

$panels = [
    ['id' => 'wise',    'label' => 'Wintersemester 2026/27', 'note' => 'Aktuelles Semester · Hochschule Neubrandenburg · Fachbereich Soziale Arbeit, Bildung und Erziehung'],
    ['id' => 'sose',    'label' => 'Sommersemester 2026',    'note' => 'Lehrarchiv · Hochschule Neubrandenburg'],
    ['id' => 'archive', 'label' => 'Frühere Lehre',          'note' => 'Lehraufträge an der FU Berlin und den Universitäten Hildesheim, Kassel, Marburg, Gießen sowie der DHBW, 2004 bis 2022'],
];
?>
<section class="v01-section--gold v01-pagehead v01-pagehead--gold">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Lehre']]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--center">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow v01-eyebrow--gold">Lehre</p>
                <h1 class="v01-h1 v01-h1--page">Lehre</h1>
                <p class="v01-lead">Meine Lehre verbindet sozialpolitische und ökonomische Grundlagen mit aktuellen gesellschaftlichen Fragen und den Handlungsfeldern der Sozialen Arbeit. Ziel ist eine wissenschaftlich begründete Urteilsfähigkeit, und Seminare dürfen auch berühren.</p>
                <aside class="v01-students" aria-labelledby="v01-students-title">
                    <h2 class="v01-students__title" id="v01-students-title">Für Studierende der HS Neubrandenburg</h2>
                    <p>Sprechzeiten und Informationen zur Betreuung von Abschlussarbeiten stehen auf der Hochschulseite.</p>
                    <div class="v01-students__links">
                        <a class="v01-link" href="<?= $e($sprechzeitenUrl) ?>" target="_blank" rel="noopener noreferrer">Sprechzeiten an der HS NB <?= v01_arrow('up-right') ?><span class="v01-sr"> (öffnet in neuem Tab)</span></a>
                        <a class="v01-link mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a>
                    </div>
                </aside>
            </div>
            <figure class="v01-pagehead__figure v01-pagehead__figure--wide">
                <picture>
                    <source type="image/webp" srcset="/images/v01/vortrag-lisa-haller.webp">
                    <img class="v01-gray" src="/images/v01/vortrag-lisa-haller.jpg" width="1137" height="1280" alt="Lisa Yashodhara Haller am Rednerpult" fetchpriority="high">
                </picture>
            </figure>
        </div>
    </div>
</section>

<section class="v01-section v01-section--tall v01-courses-section">
    <div class="v01-container v01-stack v01-stack--m">
        <h2 class="v01-h2 v01-h2--lg">Lehrveranstaltungen</h2>

        <div class="v01-tabs v01-jsonly" role="group" aria-label="Semester wählen">
            <?php foreach ($panels as $i => $p) : ?>
            <button class="v01-tab" type="button" data-panel="<?= $p['id'] ?>" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><?= $e($p['label']) ?></button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($panels as $i => $p) : ?>
        <div class="v01-panel" id="v01-panel-<?= $p['id'] ?>" data-panel="<?= $p['id'] ?>"<?= $i === 0 ? '' : ' data-secondary' ?>>
            <h3 class="v01-panel__title v01-nojs"><?= $e($p['label']) ?></h3>
            <p class="v01-panel__note"><?= $e($p['note']) ?></p>

            <?php if ($p['id'] !== 'archive') : ?>
            <ul class="v01-clist">
                <?php foreach ($data[$p['id']] as $c) : ?>
                <li class="v01-clist__item">
                    <span class="v01-clist__type"><?= $e($c['type']) ?></span>
                    <span class="v01-clist__main">
                        <span class="v01-clist__title"><?= $e($c['title']) ?></span>
                        <span class="v01-clist__meta"><?= $e($c['meta']) ?></span>
                        <?php if ($c['desc'] !== '') : ?><span class="v01-clist__desc"><?= $e($c['desc']) ?></span><?php endif; ?>
                        <span class="v01-clist__links">
                            <?php foreach ($c['lsf'] as [$id, $label]) : ?>
                            <a href="<?= $e($lsfUrl($id)) ?>" target="_blank" rel="noopener noreferrer"><?= $label !== '' ? $e($label) . ' im LSF' : 'Im LSF ansehen' ?><span class="v01-sr"> (öffnet in neuem Tab): <?= $e($c['title']) ?></span></a>
                            <?php endforeach; ?>
                        </span>
                    </span>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else : ?>
            <div class="v01-tablewrap">
                <table class="v01-table">
                    <caption class="v01-sr">Frühere Lehrveranstaltungen</caption>
                    <thead>
                        <tr><th scope="col">Semester</th><th scope="col">Veranstaltung</th><th scope="col">Institution</th><th scope="col">Format</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['archive'] as $r) : ?>
                        <tr>
                            <td class="v01-table__sem"><?= $e($r[0]) ?></td>
                            <td><span class="v01-table__title"><?= $e($r[1]) ?></span><span class="v01-table__desc"><?= $e($r[2]) ?></span></td>
                            <td><?= $e($r[3]) ?></td>
                            <td class="v01-table__fmt"><?= $e($r[4]) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined-top-only v01-section--talks">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--lg">Gastvorträge und Ringvorlesungen</h2>
            <a class="v01-link" href="<?= v01_url('vortraege') ?>">Alle Vorträge und Workshops <?= v01_arrow() ?></a>
        </div>
        <ul class="v01-talks">
            <?php foreach ($data['talks'] as $t) : ?>
            <li class="v01-talks__item">
                <svg class="v01-talks__icon" aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2m0 3a3 3 0 0 1 3 -3h0a3 3 0 0 1 3 3v5a3 3 0 0 1 -3 3h0a3 3 0 0 1 -3 -3z"></path><path d="M5 10a7 7 0 0 0 14 0"></path><path d="M8 21l8 0"></path><path d="M12 17l0 4"></path></svg>
                <span class="v01-talks__body">
                    <span class="v01-talks__title"><?= $e($t[0]) ?></span>
                    <span class="v01-talks__meta"><?= $e($t[1]) ?></span>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<script src="<?= asset('/js/v01-courses.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
