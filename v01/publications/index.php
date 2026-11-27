<?php
// Relaunch v01 – Publikationen. Daten: v01/data/publications.php (aus publications/index.php), Layout aus dem Entwurf.
// Alle Einträge stehen serverseitig im HTML; Suche und Filter (js/v01-publications.js) sind nur eine Ergänzung.
$metaTitle = 'Publikationen | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Veröffentlichungen, Bücher und Beiträge zum Thema Geschlechterpolitik von Prof. Dr. Lisa Yashodhara Haller.';
$ogImg     = 'og_publikationen.jpg';
$navActive = 'publikationen';
require dirname(__DIR__) . '/includes/header.php';

$pubs = require dirname(__DIR__) . '/data/publications.php';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

$typeLabel = ['buch' => 'Buch', 'beitrag' => 'Beitrag', 'transfer' => 'Transfer', 'rezension' => 'Rezension', 'bericht' => 'Tagungsbericht'];
$chips = ['alle' => 'Alle', 'buch' => 'Bücher', 'beitrag' => 'Beiträge', 'transfer' => 'Transfer', 'rezension' => 'Rezensionen', 'bericht' => 'Tagungsberichte'];

$counts = ['alle' => count($pubs)];
foreach ($pubs as $p) { $counts[$p['type']] = ($counts[$p['type']] ?? 0) + 1; }

// Bücher-Kacheln: Kurzangaben je Buch (Verlag · Jahr), Reihenfolge wie in den Daten
$buchMeta = [
    'https://doi.org/10.14361/9783839473696' => 'transcript',
    'https://www.campus.de/e-books/wissenschaft/soziologie/materialistischer_feminismus-18348.html' => 'Campus',
    'https://unrast-verlag.de/produkt/materializing-feminism/' => 'Unrast, 3. Auflage',
    'https://shop.budrich.de/produkt/handbuch-feministische-perspektiven-auf-elternschaft/' => 'Barbara Budrich',
    'https://www.campus.de/buecher-campus-verlag/wissenschaft/soziologie/elternschaft_im_kapitalismus-14263.html' => 'Campus',
    'https://www.dampfboot-verlag.de/shop/artikel/wechselverhaeltnisse-im-wohlfahrtsstaat' => 'Westfälisches Dampfboot',
];
$buecher = [];
foreach ($pubs as $p) {
    if ($p['type'] !== 'buch') { continue; }
    // Haupttitel und Untertitel trennen (erster ". " oder " – ")
    $parts = preg_split('/\.\s+|\s+–\s+/u', $p['title'], 2);
    $buecher[] = [
        'kind'   => str_contains($p['authors'], 'Hrsg') ? 'Herausgabe' : 'Monografie',
        'title'  => $parts[0],
        'sub'    => $parts[1] ?? '',
        'meta'   => ($buchMeta[$p['href']] ?? $p['source']) . ' · ' . $p['y'],
        'href'   => $p['href'],
        'oa'     => !empty($p['oa']),
    ];
}

// Nach Jahr gruppieren (Reihenfolge der Daten bleibt erhalten)
$byYear = [];
foreach ($pubs as $p) { $byYear[$p['y']][] = $p; }
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner v01-pagehead__inner--simple">
        <?= v01_breadcrumb([['Forschung', v01_url('forschung')], ['Publikationen']]) ?>
        <p class="v01-eyebrow">Forschung</p>
        <h1 class="v01-h1 v01-h1--page">Publikationen</h1>
        <p class="v01-lead v01-lead--wide">Bücher, Beiträge in Fachzeitschriften und Sammelbänden, Policy Paper und Transfertexte, Rezensionen und Tagungsberichte seit 2009.</p>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined v01-section--compact">
    <div class="v01-container v01-stack v01-stack--m">
        <h2 class="v01-h2 v01-h2--md">Bücher</h2>
        <ul class="v01-bookcards">
            <?php foreach ($buecher as $b) : ?>
            <li>
                <a class="v01-bookcard" href="<?= $e($b['href']) ?>" target="_blank" rel="noopener noreferrer">
                    <span class="v01-bookcard__labels"><span class="v01-bookcard__kind"><?= $b['kind'] ?></span><?php if ($b['oa']) : ?><span class="v01-bookcard__oa">Open Access</span><?php endif; ?></span>
                    <span class="v01-bookcard__title"><?= $e($b['title']) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></span>
                    <?php if ($b['sub'] !== '') : ?><span class="v01-bookcard__sub"><?= $e($b['sub']) ?></span><?php endif; ?>
                    <span class="v01-bookcard__meta"><?= $e($b['meta']) ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--tall v01-pubs" id="alle-publikationen">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--md">Alle Publikationen</h2>
            <p class="v01-pubs__count" id="v01-pub-count" aria-live="polite"><?= $counts['alle'] ?> Einträge</p>
        </div>

        <div class="v01-pubtools v01-jsonly">
            <div class="v01-pubtools__search">
                <label for="v01-pub-search">Suche in Titel, Autor*innen und Quelle</label>
                <input id="v01-pub-search" type="search" placeholder="z. B. Unterhaltsrecht, Elterngeld, Campus" autocomplete="off">
            </div>
            <div class="v01-chips" role="group" aria-label="Nach Art filtern">
                <?php foreach ($chips as $key => $label) : ?>
                <button class="v01-chip" type="button" data-filter="<?= $key ?>" aria-pressed="<?= $key === 'alle' ? 'true' : 'false' ?>"><?= $label ?> <span class="v01-chip__n"><?= $counts[$key] ?? 0 ?></span></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="v01-pubyears">
            <?php foreach ($byYear as $year => $items) : ?>
            <div class="v01-pubyear">
                <h3 class="v01-pubyear__year"><?= $year ?></h3>
                <ol class="v01-publist">
                    <?php foreach ($items as $p) :
                        $line = $p['authors'] . ' (' . $p['y'] . ')' . ($p['source'] !== '' ? '. ' . $p['source'] : '');
                        $cite = $p['authors'] . ' (' . $p['y'] . '): ' . $p['title'] . '. ' . $p['source'] . '.';
                    ?>
                    <li class="v01-pub" data-type="<?= $p['type'] ?>" data-search="<?= $e(mb_strtolower($p['authors'] . ' ' . $p['title'] . ' ' . $p['source'] . ' ' . $p['y'] . ' ' . $typeLabel[$p['type']])) ?>">
                        <div class="v01-pub__body">
                            <p class="v01-pub__labels"><span class="v01-pub__type v01-pub__type--<?= $p['type'] ?>"><?= $typeLabel[$p['type']] ?></span><?php if (!empty($p['oa'])) : ?><span class="v01-pub__oa">Open Access</span><?php endif; ?></p>
                            <p class="v01-pub__title"><?= $e($p['title']) ?></p>
                            <p class="v01-pub__cite" data-cite="<?= $e($cite) ?>"><?= $e($line) ?></p>
                        </div>
                        <?php if ($p['href'] !== '') : ?>
                        <div class="v01-pub__actions">
                            <a class="v01-iconbtn" href="<?= $e($p['href']) ?>" target="_blank" rel="noopener noreferrer" title="Zur Publikation"><svg aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path><path d="M11 13l9 -9"></path><path d="M15 4h5v5"></path></svg><span class="v01-sr">Zur Publikation: <?= $e($p['title']) ?> (öffnet in neuem Tab)</span></a>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="v01-pubnone" id="v01-pub-none" hidden>
            <p class="v01-pubnone__title">Keine Publikationen gefunden.</p>
            <p>Versuchen Sie einen anderen Suchbegriff oder setzen Sie die Filter zurück.</p>
            <button class="v01-btn v01-btn--ghost" type="button" id="v01-pub-reset">Filter zurücksetzen</button>
        </div>
    </div>
</section>

<script src="<?= asset('/js/v01-publications.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
