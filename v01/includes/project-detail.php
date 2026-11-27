<?php
/**
 * Relaunch v01 – Projektdetailseite (gemeinsame Vorlage, Layout wie Projekt KKK).
 * Vor dem Einbinden setzen: $slug (Kürzel, z. B. 'gdg').
 * Daten: v01/data/projects.php (Titel, Untertitel, Jahre, Bild) und v01/data/project-details.php (Inhalte der alten Seiten).
 */
$projects = require dirname(__DIR__) . '/data/projects.php';
$detailsAll = require dirname(__DIR__) . '/data/project-details.php';
$project = null;
foreach ($projects as $p) { if ($p['slug'] === $slug) { $project = $p; break; } }
if ($project === null || !isset($detailsAll[$slug])) { http_response_code(404); exit('Projekt nicht gefunden'); }
$d = $detailsAll[$slug];

// Alternativtexte der Projektbilder (die alten Seiten hatten teils falsche, kopierte Texte)
$alts = [
    'ffa'   => 'Illustration mit stilisierten Gesichtern und dem Text „neue Broschüre: Was ist eigentlich Feminismus?“',
    'gkjv'  => 'Kinder und Erwachsene halten gemeinsam ein buntes Tuch hoch',
    'prina' => 'Briefumschlag mit dem Logo PRiNa – Politiken der Reproduktion',
    'gdg'   => 'Titelbild des Dritten Gleichstellungsberichts: „Digitalisierung geschlechtergerecht gestalten“',
    'mom'   => 'Mutter küsst ihr neugeborenes Kind (Schwarzweißfoto)',
    'gags'  => 'Historisches Schwarzweißfoto: Frau in Pelzmütze und Mantel mit Kind und Pferd',
    'cmp'   => 'Demonstrantin mit einem Schild „Save the children“ (Schwarzweißfoto)',
    'jeap'  => 'Zwei junge Erwachsene sitzen in einem Café, einer arbeitet am Laptop',
    'laa'   => 'Lachendes Paar arbeitet gemeinsam am Tisch',
    'veil'  => 'Junge Frau mit Kopftuch lächelt in die Kamera',
];

$metaTitle = $d['meta_title'] !== '' ? $d['meta_title'] : 'Projekt ' . $project['code'] . ' | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = $d['meta_desc'] !== '' ? $d['meta_desc'] : $project['sub'];
$ogImg     = 'og_projekt.jpg';
$navActive = 'forschung';
require __DIR__ . '/header.php';

$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

/** Externe Links und Downloads im Fließtext: neuer Tab, rel, Hinweis für Screenreader. */
$ext = static function (string $html): string {
    return preg_replace_callback('~<a href="([^"]*)">(.*?)</a>~s', static function ($m) {
        $href = $m[1];
        if (!preg_match('~^(https?://|/downloads/)~i', $href)) { return $m[0]; }
        return '<a href="' . $href . '" target="_blank" rel="noopener noreferrer">' . $m[2] . '<span class="v01-sr"> (öffnet in neuem Tab)</span></a>';
    }, $html);
};

// Weitere Projekte: die drei folgenden in der Reihenfolge der Übersicht
$idx = 0;
foreach ($projects as $i => $p) { if ($p['slug'] === $slug) { $idx = $i; break; } }
$more = [];
for ($k = 1; count($more) < 3 && $k <= count($projects); $k++) { $more[] = $projects[($idx + $k) % count($projects)]; }

$hasVideo = (bool) array_filter($d['blocks'], static fn($b) => $b[0] === 'video');
$videoNo = 0;
$playIcon = '<svg aria-hidden="true" focusable="false" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4v16l13 -8z"></path></svg>';
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Forschung', v01_url('forschung')], [$project['title']]]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--center v01-pagehead__grid--project">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow v01-eyebrow--row"><span>Projekt</span><span class="v01-eyebrow__year"><?= $e($project['years']) ?></span></p>
                <h1 class="v01-h1 v01-h1--project"><?= $e($project['title']) ?></h1>
                <p class="v01-lead v01-lead--lg"><?= $e($project['sub']) ?></p>
            </div>
            <img class="v01-project__hero" src="<?= $e($project['img']) ?>" width="410" height="340" alt="<?= $e($alts[$slug] ?? '') ?>" fetchpriority="high">
        </div>
    </div>
</section>

<section class="v01-section v01-section--lined-top v01-section--tall">
    <div class="v01-container v01-bio">
        <article class="v01-prose">
            <?php if ($d['intro'] !== '') : ?><p class="v01-prose__intro"><?= $ext($d['intro']) ?></p><?php endif; ?>
            <?php foreach ($d['blocks'] as $b) : ?>
                <?php if ($b[0] === 'h2') : ?>
            <h2 class="v01-prose__h2"><?= $e($b[1]) ?></h2>
                <?php elseif ($b[0] === 'h3') : ?>
            <h3 class="v01-prose__h3"><?= $e($b[1]) ?></h3>
                <?php elseif ($b[0] === 'p') : ?>
            <p><?= $ext($b[1]) ?></p>
                <?php elseif ($b[0] === 'list') : ?>
            <ul class="v01-linklist">
                    <?php foreach ($b[1] as $li) : ?>
                <li><?= $ext($li) ?></li>
                    <?php endforeach; ?>
            </ul>
                <?php elseif ($b[0] === 'img') : ?>
            <figure class="v01-prose__fig"><img src="<?= $e($b[1]) ?>" alt="<?= $e($b[2]) ?>" loading="lazy"></figure>
                <?php elseif ($b[0] === 'video') : $videoNo++; $vurl = 'https://www.youtube.com/watch?v=' . $b[1] . '&t=' . max(1, (int) $b[2]) . 's'; $vtitle = 'Video ' . $videoNo . ' zum Projekt ' . $project['code']; ?>
            <div class="v01-mcard--video v01-prose__video" data-yt-id="<?= $e($b[1]) ?>" data-yt-start="<?= (int) $b[2] ?>" data-yt-title="<?= $e($vtitle) ?>">
                <div class="v01-mthumb v01-mthumb--img v01-yt">
                    <a class="v01-yt__link" href="<?= $e($vurl) ?>" data-yt-trigger target="_blank" rel="noopener noreferrer">
                        <img src="/images/yt-thumbs/<?= $e($b[1]) ?>.jpg" width="640" height="360" alt="" loading="lazy">
                        <span class="v01-mthumb__play v01-mthumb__play--img"><?= $playIcon ?></span>
                        <span class="v01-sr">Video abspielen: <?= $e($vtitle) ?></span>
                    </a>
                    <div class="v01-yt__notice" role="group" aria-label="Hinweis zum Datenschutz" hidden>
                        <p>Dieses Video wird von YouTube bereitgestellt. Beim Abspielen werden Daten (u. a. Ihre IP-Adresse) an YouTube und Google übertragen. Mehr in der <a href="<?= v01_url('datenschutz') ?>">Datenschutzerklärung</a>.</p>
                        <div class="v01-yt__buttons">
                            <button class="v01-yt__accept" type="button">Zustimmen &amp; abspielen</button>
                            <button class="v01-yt__cancel" type="button">Abbrechen</button>
                        </div>
                    </div>
                </div>
                <p class="v01-prose__videotitle"><a href="<?= $e($vurl) ?>" data-yt-trigger target="_blank" rel="noopener noreferrer"><?= $e($vtitle) ?><span class="v01-sr"> (YouTube, öffnet in neuem Tab)</span></a></p>
            </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </article>
        <?php if ($d['facts']) : ?>
        <aside class="v01-bio__aside v01-bio__aside--red" aria-labelledby="v01-aside-title">
            <h2 class="v01-bio__asidetitle" id="v01-aside-title">Projektdaten</h2>
            <dl class="v01-dl">
                <?php foreach ($d['facts'] as [$label, $value]) : ?>
                <div><dt><?= $e($label) ?></dt><dd><?= $ext($value) ?></dd></div>
                <?php endforeach; ?>
            </dl>
        </aside>
        <?php endif; ?>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined v01-section--compact v01-section--more">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--md">Weitere Projekte</h2>
            <a class="v01-link" href="<?= v01_url('forschung') ?>">Alle Projekte <?= v01_arrow() ?></a>
        </div>
        <ul class="v01-pcards v01-pcards--three">
            <?php foreach ($more as $p) : ?>
            <li class="v01-pcard">
                <a class="v01-pcard__link" href="<?= $e($p['href']) ?>">
                    <img class="v01-pcard__img" src="<?= $e($p['img']) ?>" width="410" height="340" alt="" loading="lazy">
                    <span class="v01-pcard__years"><?= $e($p['years']) ?></span>
                    <span class="v01-pcard__title"><?= $e($p['title']) ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php if ($hasVideo) : ?>
<script src="<?= asset('/js/v01-youtube.js') ?>" defer></script>
<?php endif; ?>
<?php require __DIR__ . '/footer.php'; ?>
