<?php
// Relaunch v01 – Vorträge und Workshops. Daten: v01/data/events.php, Layout aus dem Entwurf (Vorträge-Seite).
// Alle Veranstaltungen stehen serverseitig im HTML; Filter und „Ältere Veranstaltungen laden“ (js/v01-events.js) sind nur eine Ergänzung.
$metaTitle = 'Vorträge & Workshops | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Vorträge, Workshops und Podiumsveranstaltungen von Prof. Dr. Lisa Yashodhara Haller mit Einblicken in Elternschaft, Wirtschaft und feministische Theorien.';
$navActive = 'vortraege';
require dirname(__DIR__) . '/includes/header.php';

$events = require dirname(__DIR__) . '/data/events.php';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

$nTalks = count(array_filter($events, static fn($x) => $x['type'] === 'vortrag'));
$nWorkshops = count($events) - $nTalks;
$sinceYear = min(array_map(static fn($x) => (int) substr($x['d'], 3), $events));
$chips = ['alle' => ['Alle', count($events)], 'vortrag' => ['Vorträge', $nTalks], 'workshop' => ['Workshops', $nWorkshops]];

// Nach Jahr gruppieren (Reihenfolge der Daten bleibt erhalten)
$byYear = [];
foreach ($events as $ev) { $byYear[substr($ev['d'], 3)][] = $ev; }

$icons = [
    'vortrag'  => '<path d="M9 2m0 3a3 3 0 0 1 3 -3h0a3 3 0 0 1 3 3v5a3 3 0 0 1 -3 3h0a3 3 0 0 1 -3 -3z"></path><path d="M5 10a7 7 0 0 0 14 0"></path><path d="M8 21l8 0"></path><path d="M12 17l0 4"></path>',
    'workshop' => '<path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>',
    'podium'   => '<path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path><path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>',
];
$svg = static fn(string $inner, int $s): string => '<svg aria-hidden="true" focusable="false" width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $inner . '</svg>';

$formate = [
    ['vortrag',  'Vortrag und Keynote',       'Eröffnungs- und Fachvorträge auf Konferenzen, in Ringvorlesungen und Veranstaltungsreihen, vor Ort oder online.', 'Zum Beispiel: Eingangsvortrag im Deutschen Bundestag, Ringvorlesungen an der Universität Hamburg'],
    ['workshop', 'Workshop und Schulung',     'Interaktive Formate für Bildungsträger und die Fortbildung von Fachkräften, zum Beispiel in der Kinder- und Jugendhilfe.', 'Zum Beispiel: Das familienpolitische Brettspiel, FEMAIL Vorarlberg'],
    ['podium',   'Podium und Streitgespräch', 'Diskussionen, Lesungen und Streitgespräche zu aktuellen familien- und sozialpolitischen Debatten.', 'Zum Beispiel: 100 Jahre Institut für Sozialforschung, Frankfurt am Main'],
];
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Vorträge und Workshops']]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--center v01-pagehead__grid--imgfirst">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow v01-eyebrow--gold">Vorträge</p>
                <h1 class="v01-h1 v01-h1--page">Vorträge und Workshops</h1>
                <p class="v01-lead">Zu Elternschaft, Familienpolitik, Care und feministischer Ökonomie: für Hochschulen, Stiftungen, Verbände, Parteien und die Fachpraxis der Sozialen Arbeit.</p>
                <div class="v01-hero__actions">
                    <a class="v01-btn v01-btn--primary" href="<?= v01_url('kontakt') ?>">Vortrag anfragen <?= v01_arrow() ?></a>
                    <a class="v01-btn v01-btn--ghost" href="#archiv">Alle Veranstaltungen</a>
                </div>
            </div>
            <figure class="v01-pagehead__figure v01-pagehead__figure--talks">
                <img src="/images/v01/media/vortraege-lisa-haller.webp" width="960" height="540" alt="Lisa Yashodhara Haller hält einen Vortrag am Rednerpult vor Publikum" fetchpriority="high">
            </figure>
        </div>

        <ul class="v01-stats">
            <li class="v01-stats__item"><span class="v01-stats__n"><?= count($events) ?></span><span class="v01-stats__t">Veranstaltungen seit <?= $sinceYear ?></span></li>
            <li class="v01-stats__item"><span class="v01-stats__n"><?= $nTalks ?></span><span class="v01-stats__t">Vorträge, Keynotes und Podien</span></li>
            <li class="v01-stats__item"><span class="v01-stats__n"><?= $nWorkshops ?></span><span class="v01-stats__t">Workshops und Fachkräfteschulungen</span></li>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--gold v01-section--formate">
    <div class="v01-container v01-stack v01-stack--m">
        <h2 class="v01-h2 v01-h2--lg">Formate</h2>
        <ul class="v01-formats">
            <?php foreach ($formate as [$icon, $title, $text, $example]) : ?>
            <li class="v01-format">
                <span class="v01-format__icon"><?= $svg($icons[$icon], 32) ?></span>
                <h3 class="v01-format__title"><?= $e($title) ?></h3>
                <p class="v01-format__text"><?= $e($text) ?></p>
                <p class="v01-format__example"><?= $e($example) ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--tall v01-events" id="archiv">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--lg">Alle Veranstaltungen</h2>
            <div class="v01-chips v01-jsonly" role="group" aria-label="Nach Format filtern">
                <?php foreach ($chips as $key => [$label, $n]) : ?>
                <button class="v01-chip v01-chip--gold" type="button" data-type="<?= $key ?>" aria-pressed="<?= $key === 'alle' ? 'true' : 'false' ?>"><?= $label ?> <span class="v01-chip__n"><?= $n ?></span></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="v01-evyears">
            <?php foreach ($byYear as $year => $items) : ?>
            <div class="v01-evyear">
                <h3 class="v01-evyear__year"><?= $year ?></h3>
                <ol class="v01-evlist">
                    <?php foreach ($items as $ev) :
                        $label = $ev['type'] === 'workshop' ? 'Workshop' : 'Vortrag';
                    ?>
                    <li class="v01-ev" data-type="<?= $ev['type'] ?>">
                        <span class="v01-ev__icon"><?= $svg($icons[$ev['type']], 20) ?></span>
                        <div class="v01-ev__body">
                            <p class="v01-ev__meta"><span class="v01-ev__type"><?= $label ?></span><time datetime="<?= $e(substr($ev['d'], 3) . '-' . substr($ev['d'], 0, 2)) ?>"><?= $e($ev['d']) ?></time></p>
                            <p class="v01-ev__title"><?= $e($ev['title']) ?></p>
                            <p class="v01-ev__org"><?= $e($ev['org']) ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="v01-more v01-jsonly" id="v01-more" hidden>
            <button class="v01-btn v01-btn--ghost" type="button" id="v01-more-btn">Ältere Veranstaltungen laden</button>
            <p class="v01-more__count" id="v01-more-count" aria-live="polite"></p>
        </div>
    </div>
</section>

<?php
$bandTitle = 'Sie planen eine Konferenz, Fortbildung oder Diskussion?';
$bandText  = 'Nennen Sie Anlass, Datum, Format und Zielgruppe. Ich melde mich mit einem Vorschlag.';
require dirname(__DIR__) . '/includes/inquiry-band.php';
?>
<script src="<?= asset('/js/v01-events.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
