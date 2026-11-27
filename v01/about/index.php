<?php
// Relaunch v01 – Profil. Inhalte aus /about/index.php, Layout aus dem Entwurf (Profil – Desktop).
$metaTitle = 'Profil | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Ich forsche, berate und lehre rund um die Themen Sozialpolitik, Elternschaft und Geschlecht.';
$ogImg     = 'og_profile.jpg';
$navActive = 'profil';
require dirname(__DIR__) . '/includes/header.php';

$eckdaten = [
    ['red',  'Seit 2007', 'Forschung im Bereich der Grundlagen-, Praxis- und Transferforschung'],
    ['gold', 'Lehre', 'Langjährige Lehrerfahrung zu Ökonomie, Recht, Geschlecht, Sozialpolitik, sozialen Dienstleistungen und Elternschaft'],
    ['gold', 'Vorträge', 'Vorträge und Workshops zu Kinder- und Jugendhilfe, Familien- und Sozialpolitik sowie Paar- und Geschlechterforschung'],
];

// [Titel, Meta, URL] – YouTube-Links mit Startzeit wie im bisherigen Einbettungscode
$videos = [
    ['Reformpläne zum Unterhaltsrecht: „Rechtssystematisch hoch problematisch“', '08/2023 · phoenix', 'https://www.youtube.com/watch?v=xYONhjKnKkU&t=1s'],
    ['Debatte: Was ist materialistischer Feminismus?', '05/2023 · IfS Institut für Sozialforschung Frankfurt am Main', 'https://www.youtube.com/watch?v=OfS2OH6KJjI&t=1s'],
    ['Streitgespräch: Ökonomie. Subjektivierung. Geschlecht.', '04/2022 · FkW Forum kritischer Wissenschaften', 'https://www.youtube.com/watch?v=nvlMCDxAWWs&t=1s'],
    ['Rabenmütter oder Super Moms? Teil 2', '05/2021 · Doku ZDFneo', 'https://www.youtube.com/watch?v=Bt0fevR0NT0&t=19s'],
];
$audios = [
    ['Kinder haben im Kapitalismus', '11/2023 · mosaik-blog.at', 'https://mosaik-blog.at/kinder-haben-im-kapitalismus/'],
    ['„Es ist eine einfache Rechnung“ – Elternschaft im Kapitalismus', '11/2023 · grossvater.hypotheses.org', 'https://grossvater.hypotheses.org/400'],
    ['Burning Down the House. Elternschaft im Kapitalismus', '10/2023 · freie-radios.net', 'https://www.freie-radios.net/124752'],
    ['Elternschaft im Kapitalismus – Die Bedeutung der Fürsorge für unsere Wirtschaft', '10/2019 · mixcloud.com', 'https://www.mixcloud.com/evibes/elternschaft-im-kapitalismus-lisa-yashodhara-haller/'],
];
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
?>
<section class="v01-pagehead">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Profil']]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--imgfirst">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow">Profil</p>
                <h1 class="v01-h1 v01-h1--page">Lisa Yashodhara Haller</h1>
                <p class="v01-lead">Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste an der Hochschule Neubrandenburg</p>
                <p class="v01-pagehead__question">Wie regulieren staatliche Steuerungsinstrumente unser Privatleben? In welcher Weise werden Handlungsmöglichkeiten durch den Staat geöffnet und geschlossen? Und für wen?</p>
            </div>
            <figure class="v01-pagehead__figure">
                <img src="/images/v01/profil-seite-lisa-haller.jpg" width="501" height="620" alt="Lisa Yashodhara Haller vor einem Bücherregal" fetchpriority="high">
            </figure>
        </div>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined v01-section--compact">
    <div class="v01-container">
        <ul class="v01-facts">
            <?php foreach ($eckdaten as $f) : ?>
            <li class="v01-facts__item v01-facts__item--<?= $f[0] ?>">
                <span class="v01-facts__title"><?= $e($f[1]) ?></span>
                <span class="v01-facts__text"><?= $e($f[2]) ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--tall">
    <div class="v01-container v01-bio">
        <aside class="v01-bio__aside" aria-labelledby="v01-aside-title">
            <h2 class="v01-bio__asidetitle" id="v01-aside-title">Auf einen Blick</h2>
            <dl class="v01-dl">
                <div><dt>Position</dt><dd>Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste</dd></div>
                <div><dt>Institution</dt><dd>Hochschule Neubrandenburg, Fachbereich Soziale Arbeit, Bildung und Erziehung</dd></div>
                <div><dt>Seit</dt><dd>März 2025</dd></div>
                <div><dt>E-Mail</dt><dd><a class="mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a></dd></div>
                <div>
                    <dt>Profile</dt>
                    <dd class="v01-dl__links">
                        <a href="https://orcid.org/0000-0001-5094-207X" target="_blank" rel="noopener noreferrer">ORCID<span class="v01-sr"> (öffnet in neuem Tab)</span></a>
                        <a href="https://www.researchgate.net/profile/Lisa-Haller" target="_blank" rel="noopener noreferrer">ResearchGate<span class="v01-sr"> (öffnet in neuem Tab)</span></a>
                        <a href="https://www.linkedin.com/in/dr-lisa-yashodhara-haller-22122699/" target="_blank" rel="noopener noreferrer">LinkedIn<span class="v01-sr"> (öffnet in neuem Tab)</span></a>
                    </dd>
                </div>
            </dl>
            <a href="https://www.hs-nb.de/" target="_blank" rel="noopener noreferrer" aria-label="Hochschule Neubrandenburg (öffnet in neuem Tab)">
                <img class="v01-bio__logo" src="/images/v01/logo-hs-neubrandenburg.svg" width="153" height="40" alt="Hochschule Neubrandenburg – University of Applied Sciences" loading="lazy">
            </a>
        </aside>
        <article class="v01-prose">
            <blockquote class="v01-prose__quote">„Eigentlich können wir leben, wie wir wollen! Und dennoch unterliegen unsere Entscheidungen einer sozialstaatlichen Steuerung.“</blockquote>
            <p>So viele private Entscheidungen unterliegen einer sozialstaatlichen Steuerung und damit politischen Bestimmungen. Ohne deren Aufdeckung erscheint uns unser Privatleben mit samt allen Entscheidungen und Handlungen jedoch als die jeweils individuelle Präferenz. Die Individualisierung gesellschaftlicher Problemlagen zu entlarven, ist für mich daher mehr als ein Bildungsauftrag, es ist eine aus den Verhältnissen, in denen wir leben, unmittelbar resultierende Notwendigkeit!</p>
            <p>Seit März 2025 bin ich Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste am Fachbereich Soziale Arbeit, Bildung und Erziehung der Hochschule Neubrandenburg.</p>
            <h2 class="v01-prose__h2">Forschung</h2>
            <p>Meine Forschung befasst sich mit der Frage, wie sozialpolitische Regelungen und ökonomische Strukturen gesellschaftliche Handlungsmöglichkeiten eröffnen, begrenzen und ungleich verteilen. Ein besonderes Interesse gilt der Organisation und Finanzierung sozialer Dienste sowie den Auswirkungen familien- und gleichstellungspolitischer Maßnahmen auf die Arbeitsteilung und die materiellen Lebensbedingungen von Eltern.</p>
            <h2 class="v01-prose__h2">Weiterbildung und Beratung</h2>
            <p>Ein besonderes Anliegen in der Fort- und Weiterbildung sowie der Supervision von Fachkräften der elternbezogenen Beratung ist mir die Sensibilisierung für die Herausforderungen unseres Wirtschaftssystems, dem Kapitalismus, und den darauf entstehenden geschlechterbezogenen Konflikten von Paaren in unterschiedlichen Stadien der Elternschaft.</p>
            <div class="v01-prose__actions">
                <a class="v01-btn v01-btn--primary" href="<?= v01_url('publikationen') ?>">Publikationen <?= v01_arrow() ?></a>
                <a class="v01-btn v01-btn--ghost" href="<?= v01_url('forschung') ?>">Forschungsprojekte</a>
            </div>
        </article>
    </div>
</section>

<section class="v01-section v01-section--petrol v01-section--media">
    <div class="v01-container v01-stack v01-stack--l">
        <div class="v01-section__head">
            <div class="v01-stack v01-stack--xs">
                <p class="v01-eyebrow v01-eyebrow--light">Medien</p>
                <h2 class="v01-h2">Zum Anschauen und Reinhören</h2>
            </div>
            <a class="v01-link v01-link--light" href="<?= v01_url('medien') ?>">Alle Medienbeiträge <?= v01_arrow() ?></a>
        </div>
        <div class="v01-media">
            <?php foreach ([['Video', $videos, 'play'], ['Audio', $audios, 'audio']] as [$heading, $items, $icon]) : ?>
            <div class="v01-media__col">
                <h3 class="v01-media__heading"><?= $heading ?></h3>
                <ul class="v01-media__list">
                    <?php foreach ($items as $m) : ?>
                    <li>
                        <a class="v01-media__row" href="<?= $e($m[2]) ?>" target="_blank" rel="noopener noreferrer">
                            <?php if ($icon === 'play') : ?>
                            <svg class="v01-media__icon" aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4v16l13 -8z"></path></svg>
                            <?php else : ?>
                            <svg class="v01-media__icon" aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path><path d="M15 15a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path><path d="M4 15v-3a8 8 0 0 1 16 0v3"></path></svg>
                            <?php endif; ?>
                            <span class="v01-media__body">
                                <span class="v01-media__title"><?= $e($m[0]) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></span>
                                <span class="v01-media__meta"><?= $e($m[1]) ?></span>
                            </span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require dirname(__DIR__) . '/includes/inquiry-band.php'; ?>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
