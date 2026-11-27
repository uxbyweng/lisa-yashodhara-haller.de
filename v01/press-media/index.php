<?php
// Relaunch v01 – Presse und Medien. Daten: v01/data/media.php, Layout aus dem Entwurf (Medien – Desktop).
// Alle Beiträge stehen serverseitig im HTML; Format-Filter und „Weitere Beiträge laden“ (js/v01-media.js) sind nur eine Ergänzung.
$metaTitle = 'Presse und Medien | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Presse und Medien: Interviews, Kommentare, Reportagen, Radiogespräche, Vorträge und Dokus mit Prof. Dr. Lisa Yashodhara Haller zu Elternschaft, Feminismus, Familienrecht und Kindergrundsicherung.';
$ogImg     = 'og_startseite.jpg';
$navActive = 'medien';
require dirname(__DIR__) . '/includes/header.php';

$media = require dirname(__DIR__) . '/data/media.php';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

$kindLabel = ['lesen' => 'Artikel', 'sehen' => 'Video', 'hoeren' => 'Audio'];
$chips = ['alle' => 'Alle', 'lesen' => 'Zum Lesen', 'sehen' => 'Zum Anschauen', 'hoeren' => 'Zum Reinhören'];
$counts = ['alle' => count($media)];
foreach ($media as $m) { $counts[$m['kind']] = ($counts[$m['kind']] ?? 0) + 1; }

// Datum für <time>: "26.05.2026" oder "02/2025"
$iso = static function (string $d): string {
    if (preg_match('/^(\d{2})\.(\d{2})\.(\d{4})$/', $d, $x)) { return "$x[3]-$x[2]-$x[1]"; }
    if (preg_match('/^(\d{2})\/(\d{4})$/', $d, $x)) { return "$x[2]-$x[1]"; }
    return '';
};

// Highlights (die drei neuesten Beiträge) mit eigener Beschriftung und Bildausschnitt
$highlights = [
    ['idx' => 0, 'label' => 'Radio',            'img' => '/images/v01/media/swr-kultur-forum.jpg', 'icon' => 'audio'],
    ['idx' => 1, 'label' => 'Pressemitteilung', 'img' => '/images/v01/media/ernennung.jpg',        'icon' => 'text'],
    ['idx' => 2, 'label' => 'Reportage',        'img' => '/images/v01/media/mutterschaft.jpg',     'icon' => 'text'],
];
$icons = [
    'audio' => '<path d="M4 15a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path><path d="M15 15a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path><path d="M4 15v-3a8 8 0 0 1 16 0v3"></path>',
    'text'  => '<path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path><path d="M8 8l4 0"></path><path d="M8 12l4 0"></path><path d="M8 16l4 0"></path>',
    'play'  => '<path d="M7 4v16l13 -8z"></path>',
];
$svg = static fn(string $inner, int $s = 22): string => '<svg aria-hidden="true" focusable="false" width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $inner . '</svg>';
?>
<section class="v01-pagehead v01-pagehead--petrol">
    <div class="v01-container v01-pagehead__inner v01-pagehead__inner--simple">
        <?= v01_breadcrumb([['Presse und Medien']]) ?>
        <p class="v01-eyebrow v01-eyebrow--light">Medien</p>
        <h1 class="v01-h1 v01-h1--page">Presse und Medien</h1>
        <p class="v01-lead v01-lead--wide v01-lead--light">Interviews, Reportagen, Kommentare und Features in Zeitungen, Zeitschriften und digitalen Medien sowie Dokus, Clips und Podcasts.</p>
        <ul class="v01-hls">
            <?php foreach ($highlights as $h) : $m = $media[$h['idx']]; ?>
            <li>
                <a class="v01-hl" href="<?= $e($m['href']) ?>" target="_blank" rel="noopener noreferrer">
                    <span class="v01-hl__media">
                        <img class="v01-hl__img v01-hl__img--<?= $h['idx'] ?>" src="<?= $e($h['img']) ?>" width="800" height="600" alt="">
                        <span class="v01-hl__icon"><?= $svg($icons[$h['icon']]) ?></span>
                    </span>
                    <span class="v01-hl__body">
                        <span class="v01-hl__meta"><?= $e($h['label'] . ' · ' . $m['d'] . (!empty($m['pay']) ? ' · Bezahlinhalt' : '')) ?></span>
                        <span class="v01-hl__title"><?= $e($m['title']) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></span>
                        <span class="v01-hl__outlet"><?= $e($m['outlet']) ?></span>
                    </span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--tall v01-media-all">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--lg">Alle Beiträge</h2>
            <div class="v01-chips v01-jsonly" role="group" aria-label="Nach Format filtern">
                <?php foreach ($chips as $key => $label) : ?>
                <button class="v01-chip v01-chip--petrol" type="button" data-kind="<?= $key ?>" aria-pressed="<?= $key === 'alle' ? 'true' : 'false' ?>"><?= $label ?> <span class="v01-chip__n"><?= $counts[$key] ?? 0 ?></span></button>
                <?php endforeach; ?>
            </div>
        </div>

        <ul class="v01-mgrid">
            <?php foreach ($media as $m) :
                $link = $m['href'] !== '';
                $tag = $link ? 'a' : 'div';
                $attrs = $link ? ' href="' . $e($m['href']) . '" target="_blank" rel="noopener noreferrer"' : '';
                $date = $iso($m['d']);
                // YouTube-Beiträge: Video-ID und Startzeit aus dem Link (Abspielen direkt auf der Seite, siehe js/v01-media.js)
                $yt = preg_match('~youtube\.com/watch\?v=([\w-]+)(?:&t=(\d+)s)?~', $m['href'], $x) ? [$x[1], (int)($x[2] ?? 0)] : null;
            ?>
            <li class="v01-mitem" data-kind="<?= $m['kind'] ?>">
                <?php if ($yt) : ?>
                <div class="v01-mcard v01-mcard--video" data-yt-id="<?= $e($yt[0]) ?>" data-yt-start="<?= $yt[1] ?>" data-yt-title="<?= $e($m['title']) ?>">
                    <div class="v01-mthumb v01-mthumb--img v01-yt">
                        <a class="v01-yt__link" href="<?= $e($m['href']) ?>" data-yt-trigger target="_blank" rel="noopener noreferrer">
                            <img src="<?= $e($m['img']) ?>" width="640" height="360" alt="" loading="lazy">
                            <span class="v01-mthumb__play v01-mthumb__play--img"><?= $svg($icons['play'], 28) ?></span>
                            <span class="v01-mthumb__badge"><?= $kindLabel[$m['kind']] ?></span>
                            <span class="v01-sr">Video abspielen: <?= $e($m['title']) ?></span>
                        </a>
                        <div class="v01-yt__notice" role="group" aria-label="Hinweis zum Datenschutz" hidden>
                            <p>Dieses Video wird von YouTube bereitgestellt. Beim Abspielen werden Daten (u. a. Ihre IP-Adresse) an YouTube und Google übertragen. Mehr in der <a href="<?= v01_url('datenschutz') ?>">Datenschutzerklärung</a>.</p>
                            <div class="v01-yt__buttons">
                                <button class="v01-yt__accept" type="button">Zustimmen &amp; abspielen</button>
                                <button class="v01-yt__cancel" type="button">Abbrechen</button>
                            </div>
                        </div>
                    </div>
                    <div class="v01-mcard__body">
                        <p class="v01-mcard__meta"><span class="v01-mcard__kind"><?= $kindLabel[$m['kind']] ?></span><time<?= $date !== '' ? ' datetime="' . $date . '"' : '' ?>><?= $e($m['d']) ?></time></p>
                        <p class="v01-mcard__title"><a class="v01-mcard__titlelink" href="<?= $e($m['href']) ?>" data-yt-trigger target="_blank" rel="noopener noreferrer"><?= $e($m['title']) ?><span class="v01-sr"> (<?= $e($m['outlet']) ?>, YouTube, öffnet in neuem Tab)</span></a></p>
                        <?php if ($m['desc'] !== '') : ?><p class="v01-mcard__desc"><?= $e($m['desc']) ?></p><?php endif; ?>
                    </div>
                </div>
                <?php else : ?>
                <<?= $tag ?> class="v01-mcard<?= !empty($m['gone']) ? ' v01-mcard--gone' : '' ?>"<?= $attrs ?>>
                    <?php if (!empty($m['gone'])) : ?>
                    <span class="v01-mthumb v01-mthumb--gone" aria-hidden="true"><span><?= $e($m['outlet']) ?></span></span>
                    <?php elseif (!empty($m['img'])) : ?>
                    <span class="v01-mthumb v01-mthumb--img">
                        <img src="<?= $e($m['img']) ?>" width="640" height="360" alt="" loading="lazy">
                        <?php if ($m['kind'] === 'sehen') : ?><span class="v01-mthumb__play v01-mthumb__play--img"><?= $svg($icons['play'], 28) ?></span><?php endif; ?>
                        <span class="v01-mthumb__badge"><?= $kindLabel[$m['kind']] ?></span>
                    </span>
                    <?php elseif ($m['kind'] === 'lesen') : ?>
                    <span class="v01-mthumb v01-mthumb--read" aria-hidden="true"><span class="v01-mthumb__quote">„</span><span class="v01-mthumb__outlet"><?= $e($m['outlet']) ?></span></span>
                    <?php elseif ($m['kind'] === 'sehen') : ?>
                    <span class="v01-mthumb v01-mthumb--watch" aria-hidden="true"><span class="v01-mthumb__play"><?= $svg($icons['play'], 28) ?></span><span class="v01-mthumb__outlet"><?= $e($m['outlet']) ?></span></span>
                    <?php else : ?>
                    <span class="v01-mthumb v01-mthumb--listen" aria-hidden="true"><span class="v01-mthumb__outlet"><?= $e($m['outlet']) ?></span></span>
                    <?php endif; ?>
                    <span class="v01-mcard__body">
                        <span class="v01-mcard__meta"><span class="v01-mcard__kind"><?= $kindLabel[$m['kind']] ?></span><time<?= $date !== '' ? ' datetime="' . $date . '"' : '' ?>><?= $e($m['d']) ?></time><?php if (!empty($m['pay'])) : ?><span class="v01-mcard__pay">Bezahlinhalt</span><?php endif; ?><?php if (!empty($m['gone'])) : ?><span class="v01-mcard__gone">Online nicht mehr verfügbar</span><?php endif; ?></span>
                        <span class="v01-mcard__title"><?= $e($m['title']) ?><?php if ($link) : ?><span class="v01-sr"> (<?= $e($m['outlet']) ?>, öffnet in neuem Tab)</span><?php endif; ?></span>
                        <?php if (empty($m['gone']) && $m['desc'] !== '') : ?><span class="v01-mcard__desc"><?= $e($m['desc']) ?></span><?php endif; ?>
                    </span>
                </<?= $tag ?>>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>

        <div class="v01-more v01-jsonly" id="v01-more" hidden>
            <button class="v01-btn v01-btn--ghost" type="button" id="v01-more-btn">Weitere Beiträge laden</button>
            <p class="v01-more__count" id="v01-more-count" aria-live="polite"></p>
        </div>
    </div>
</section>

<script src="<?= asset('/js/v01-media.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
