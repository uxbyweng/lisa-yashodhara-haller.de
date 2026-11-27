<?php
// Relaunch v01 – Projekt KKK. Inhalt aus projects/kkk/index.php, Layout aus dem Entwurf (Projekt KKK – Desktop).
$metaTitle = 'Projekt KKK | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Infos zum Projekt Körper, Kinder, Kassensturz. Handlungsempfehlungen für die Umsetzung des Koalitionsvertrags (KKK)';
$ogImg     = 'og_projekt.jpg';
$navActive = 'forschung';
require dirname(__DIR__, 2) . '/includes/header.php';

$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

// Publikationen aus dem Projekt: Policy Paper der Reihe „Körper, Kinder, Kassensturz“ aus der Publikationsliste
$pubs = require dirname(__DIR__, 2) . '/data/publications.php';
$projektPubs = array_values(array_filter($pubs, static fn($p) => str_contains($p['source'], 'Körper, Kinder, Kassensturz')));

// Weitere Projekte (Auswahl wie im Entwurf)
$projects = require dirname(__DIR__, 2) . '/data/projects.php';
$weitere = array_values(array_filter($projects, static fn($p) => in_array($p['slug'], ['ffa', 'prina', 'gkjv'], true)));
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Forschung', v01_url('forschung')], ['KKK – Körper, Kinder, Kassensturz']]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--center v01-pagehead__grid--project">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow v01-eyebrow--row"><span>Projekt</span><span class="v01-eyebrow__year">2023</span></p>
                <h1 class="v01-h1 v01-h1--project">KKK – Körper, Kinder, Kassensturz</h1>
                <p class="v01-lead v01-lead--lg">Handlungsempfehlungen für die Umsetzung des Koalitionsvertrags</p>
            </div>
            <img class="v01-project__hero" src="/images/v01/projects/kkk.webp" width="410" height="340" alt="Illustration: eine vielfältige Familie mit Kindern, Katze und Hund" fetchpriority="high">
        </div>
    </div>
</section>

<section class="v01-section v01-section--lined-top-only v01-section--tall">
    <div class="v01-container v01-bio">
        <article class="v01-prose">
            <p class="v01-prose__intro">In einer Reihe von Policy Papers werden aktuelle Vorhaben der Ampelkoalition zu familienrechtlichen Fragen aus einer intersektionalen Perspektive analysiert und von hier aus Handlungsempfehlungen entwickelt.</p>
            <h2 class="v01-prose__h2">Politikempfehlungen zu familienrechtlichen Fragen</h2>
            <p>Das Projekt verfolgt das Ziel, reproduktionspolitische Versprechen des Koalitionsvertrags der aktuellen Bundesregierung aus feministischer Perspektive kritisch zu beleuchten und die Debatte um konkrete Handlungsempfehlungen an politische Entscheidungsträger*innen voranzutreiben.</p>
            <p>Im Koalitionsvertrag wird deutlich, wie vielfältig reproduktionsrelevante Fragestellungen in verschiedene Familien- und Sozialpolitiken eingewoben sind. Aus intersektional-feministischer Perspektive analysieren wir verschiedene reproduktionspolitische Ansätze des Koalitionsvertrags und befragen diese auf normative Engführungen, emanzipatorische Potentiale und liberale Fallstricke, insbesondere mit Blick auf Ungleichheitsverhältnisse und differentielle Regulierungen von Körpern, Selbstbestimmungsmöglichkeiten und die Verteilung von Lebenschancen.</p>
            <a class="v01-download" href="https://www.gwi-boell.de/de/koerper-kinder-kassensturz" target="_blank" rel="noopener noreferrer">
                <svg class="v01-download__icon" aria-hidden="true" focusable="false" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path><path d="M12 11v6"></path><path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path></svg>
                <span class="v01-download__text"><span class="v01-download__title">Policy-Paper-Reihe Körper, Kinder, Kassensturz</span><span class="v01-download__meta">Kostenloser Download beim Gunda-Werner-Institut · gwi-boell.de</span></span>
                <?= v01_arrow('up-right') ?><span class="v01-sr"> (öffnet in neuem Tab)</span>
            </a>
        </article>
        <aside class="v01-bio__aside v01-bio__aside--red" aria-labelledby="v01-aside-title">
            <h2 class="v01-bio__asidetitle" id="v01-aside-title">Projektdaten</h2>
            <dl class="v01-dl">
                <div><dt>Laufzeit</dt><dd>2023</dd></div>
                <div><dt>Institution</dt><dd>Gunda-Werner-Institut der Heinrich-Böll-Stiftung</dd></div>
                <div><dt>Tätigkeit</dt><dd>Projektkoordination</dd></div>
                <div><dt>Kontext</dt><dd><a href="/v01/projects/prina/">PRiNa – Politiken der Reproduktion</a></dd></div>
            </dl>
        </aside>
    </div>
</section>

<?php if ($projektPubs) : ?>
<section class="v01-section v01-section--beige v01-section--lined v01-section--compact">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--md">Publikationen aus dem Projekt</h2>
            <a class="v01-link" href="<?= v01_url('publikationen') ?>">Alle Publikationen <?= v01_arrow() ?></a>
        </div>
        <ul class="v01-rows">
            <?php foreach ($projektPubs as $p) : ?>
            <li>
                <a class="v01-rows__row" href="<?= $e($p['href']) ?>" target="_blank" rel="noopener noreferrer">
                    <span class="v01-rows__label">Transfer · Policy Paper</span>
                    <span class="v01-rows__title"><?= $e($p['title']) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></span>
                    <span class="v01-rows__meta"><?= $e($p['authors'] . ' (' . $p['y'] . '). ' . $p['source']) ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<section class="v01-section v01-section--compact v01-section--more">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--md">Weitere Projekte</h2>
            <a class="v01-link" href="<?= v01_url('forschung') ?>">Alle Projekte <?= v01_arrow() ?></a>
        </div>
        <ul class="v01-pcards v01-pcards--three">
            <?php foreach ($weitere as $p) : ?>
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
<?php require dirname(__DIR__, 2) . '/includes/footer.php'; ?>
