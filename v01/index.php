<?php
// Relaunch v01 – Startseite (Phase 2). Inhalte aus /index.php, /about/index.php und /courses/index.php, Layout aus dem Entwurf.
$metaTitle = 'Prof. Dr. Lisa Yashodhara Haller – Sozialpolitik, Soziale Dienste, Elternschaft';
$metaDesc  = 'Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste an der Hochschule Neubrandenburg. Forschung, Lehre und Beratung zu Sozialpolitik, Familien- und Geschlechterverhältnissen.';
$navActive = '';
require __DIR__ . '/includes/header.php';

// Schwerpunkte (Entwurf)
$schwerpunkte = [
    ['Sozialpolitik und Wohlfahrtsstaat', 'Wie sozialpolitische Regelungen und ökonomische Strukturen Handlungsmöglichkeiten eröffnen, begrenzen und ungleich verteilen.'],
    ['Ökonomie sozialer Dienste', 'Wie soziale Dienste organisiert und finanziert werden und was das für ihre Praxis bedeutet.'],
    ['Familie, Elternschaft und Geschlecht', 'Auswirkungen familien- und gleichstellungspolitischer Maßnahmen auf die Arbeitsteilung und die materiellen Lebensbedingungen von Eltern.'],
];

// Aktuelles (Meldungen wie auf der alten Startseite; neueste zuerst). 'tone': 'red' oder 'petrol'
$meldungen = [
    [
        'tone' => 'red', 'label' => 'Publikation', 'date' => '2026-11-15', 'dateText' => '15.11.2026',
        'title' => 'Geld, Geschlecht und soziale Sicherung',
        'text'  => 'Schwerpunktheft des Deutschen Vereins: wie familienpolitische Entscheidungen seit 2006 Sorgearbeit und finanzielle Absicherung prägen.',
        'link'  => 'Zur Veröffentlichung',
        'href'  => 'https://www.deutscher-verein.de/shop/produktdetail/archiv-42026-20-jahre-siebter-familienbericht-familienpolitik-auf-dem-pruefstand/',
    ],
    [
        'tone' => 'red', 'label' => 'Fachartikel', 'date' => '2026-07-22', 'dateText' => '22.07.2026',
        'title' => 'Wenn Recht Mütter adressiert',
        'text'  => 'In Sozial Extra: wie geschlechtsneutral formuliertes Recht in der Elternberatung geschlechtsspezifisch umgesetzt wird.',
        'link'  => 'Zum Beitrag',
        'href'  => 'https://doi.org/10.1007/s12054-026-00890-9',
    ],
    [
        'tone' => 'petrol', 'label' => 'Medien · Radio', 'date' => '2026-05-26', 'dateText' => '26.05.2026',
        'title' => 'Familienpolitik und sinkende Geburtenzahlen',
        'text'  => 'SWR Kultur Forum „Babyflaute statt Kindersegen“, mit Matthias Dantlgraber und Katharina Spieß.',
        'link'  => 'Zum Radiogespräch',
        'href'  => 'https://www.ardsounds.de/episode/urn:ard:episode:d8086fa3e4980ca7/',
    ],
    [
        'tone' => 'red', 'label' => 'Buch · Open Access', 'date' => '2026-03-11', 'dateText' => '11.03.2026',
        'title' => 'Familie, Sorge und Recht',
        'text'  => 'Sammelband zu den Wechselverhältnissen von familialen Lebensformen, Sorge und Recht. Frei zugänglich bei transcript.',
        'link'  => 'Zum Buch',
        'href'  => 'https://doi.org/10.14361/9783839473696',
    ],
];

// Ausgewählte Bücher (wie im Abschnitt „Publikationen“ auf /about/)
$buecher = [
    ['2026', 'Familie, Sorge und Recht', 'Theoretische und empirische Verhältnisbestimmungen', 'transcript', 'https://doi.org/10.14361/9783839473696'],
    ['2024', 'Materialistischer Feminismus', 'Gegenwartsanalysen zu Geschlecht im Kapitalismus', 'Campus', 'https://www.campus.de/e-books/wissenschaft/soziologie/materialistischer_feminismus-18348.html'],
    ['2023', 'materializing feminism', 'Positionierungen zu Ökonomie, Staat und Identität', 'Unrast', 'https://unrast-verlag.de/produkt/materializing-feminism/'],
    ['2022', 'Handbuch Feministische Perspektiven auf Elternschaft', '', 'Barbara Budrich', 'https://shop.budrich.de/produkt/handbuch-feministische-perspektiven-auf-elternschaft/'],
    ['2018', 'Elternschaft im Kapitalismus', 'Staatliche Einflussfaktoren auf die Arbeitsteilung junger Eltern', 'Campus', 'https://www.campus.de/buecher-campus-verlag/wissenschaft/soziologie/elternschaft_im_kapitalismus-14263.html'],
    ['2012', 'Wechselverhältnisse im Wohlfahrtsstaat', 'Dynamiken gesellschaftlicher Justierungsprozesse', 'Westfälisches Dampfboot', 'https://www.dampfboot-verlag.de/shop/artikel/wechselverhaeltnisse-im-wohlfahrtsstaat'],
];

// Lehre im WiSe 2026/27 (Titel ohne Gruppenangabe, wie auf /courses/)
$lehre = [
    ['Vorlesung', 'Grundlagen der Sozialpolitik'],
    ['Übung', 'Soziale Arbeit als Sprachrohr sozialer Bewegungen'],
    ['Übung', 'Kapitalismus, Sozialpolitik und die Mandate Sozialer Arbeit'],
    ['Seminar', 'Forschungswerkstatt: Sozialarbeiter als Akteure der Familienpolitik'],
    ['Seminar', 'Projektwerkstatt: Gewerkschaftliche Organisierung in der Sozialen Arbeit'],
];
$sprechzeitenUrl = 'https://www.hs-nb.de/fachbereich-soziale-arbeit-bildung-und-erziehung/ppages/lisa-yashodhara-haller/';
?>
<section class="v01-hero">
    <div class="v01-container v01-hero__inner">
        <div class="v01-hero__text">
            <p class="v01-eyebrow">Sozialpolitik · Soziale Dienste · Elternschaft</p>
            <h1 class="v01-h1">Prof. Dr. Lisa Yashodhara Haller</h1>
            <p class="v01-lead">Professorin für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste. Sie forscht, lehrt und berät zu Sozialpolitik, der Ökonomie sozialer Dienste sowie zu Familien- und Geschlechterverhältnissen.</p>
            <div class="v01-hero__actions">
                <a class="v01-btn v01-btn--primary" href="<?= v01_url('publikationen') ?>">Publikationen <?= v01_arrow() ?></a>
                <a class="v01-btn v01-btn--ghost" href="<?= v01_url('kontakt') ?>">Vortrag oder Workshop anfragen</a>
            </div>
            <a class="v01-hero__org" href="https://www.hs-nb.de/" target="_blank" rel="noopener noreferrer" aria-label="Hochschule Neubrandenburg (öffnet in neuem Tab)">
                <img src="/images/v01/logo-hs-neubrandenburg.svg" width="200" height="52" alt="Hochschule Neubrandenburg – University of Applied Sciences">
            </a>
        </div>
        <figure class="v01-hero__figure">
            <picture>
                <source type="image/webp" srcset="/images/v01/hero-lisa-haller.webp">
                <img src="/images/v01/hero-lisa-haller.jpg" width="1313" height="1641" alt="Porträt von Lisa Yashodhara Haller" fetchpriority="high">
            </picture>
        </figure>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined">
    <div class="v01-container v01-stack v01-stack--xl">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--wide">Von theoriegeleiteter Grundlagenforschung bis zur Praxisforschung</h2>
            <a class="v01-link" href="<?= v01_url('forschung') ?>">Alle Projekte <?= v01_arrow() ?></a>
        </div>
        <ol class="v01-focus">
            <?php foreach ($schwerpunkte as $i => $s) : ?>
            <li class="v01-focus__item">
                <span class="v01-focus__no" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                <h3 class="v01-h3"><?= htmlspecialchars($s[0]) ?></h3>
                <p><?= htmlspecialchars($s[1]) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="v01-section v01-section--petrol">
    <div class="v01-container v01-profile">
        <img class="v01-profile__img" src="/images/v01/profil-lisa-haller.webp" width="500" height="620" loading="lazy" alt="Lisa Yashodhara Haller zwischen zwei Säulen">
        <div class="v01-profile__text">
            <p class="v01-eyebrow v01-eyebrow--light">Profil</p>
            <blockquote class="v01-quote">„Eigentlich können wir leben, wie wir wollen! Und dennoch unterliegen unsere Entscheidungen einer sozialstaatlichen Steuerung.“</blockquote>
            <p class="v01-profile__lead">Seit März 2025 ist Lisa Yashodhara Haller Professorin am Fachbereich Soziale Arbeit, Bildung und Erziehung der Hochschule Neubrandenburg. Sie forscht seit 2007 im Bereich der Grundlagen-, Praxis- und Transferforschung.</p>
            <a class="v01-link v01-link--light" href="<?= v01_url('profil') ?>">Zum Profil <?= v01_arrow() ?></a>
        </div>
    </div>
</section>

<section class="v01-section v01-section--lined-top">
    <div class="v01-container v01-stack v01-stack--l">
        <div class="v01-section__head">
            <h2 class="v01-h2">Aktuelles</h2>
        </div>
        <div class="v01-news">
            <?php foreach ($meldungen as $m) : ?>
            <article class="v01-news__item v01-news__item--<?= $m['tone'] ?>">
                <p class="v01-news__meta"><span class="v01-news__label"><?= htmlspecialchars($m['label']) ?></span> <time datetime="<?= $m['date'] ?>"><?= $m['dateText'] ?></time></p>
                <h3 class="v01-h3 v01-h3--serif"><?= htmlspecialchars($m['title']) ?></h3>
                <p class="v01-news__text"><?= htmlspecialchars($m['text']) ?></p>
                <a class="v01-news__link" href="<?= htmlspecialchars($m['href']) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($m['link']) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2">Ausgewählte Bücher</h2>
            <a class="v01-link" href="<?= v01_url('publikationen') ?>">Alle Publikationen <?= v01_arrow() ?></a>
        </div>
        <ul class="v01-books">
            <?php foreach ($buecher as $b) : ?>
            <li>
                <a class="v01-books__row" href="<?= htmlspecialchars($b[4]) ?>" target="_blank" rel="noopener noreferrer">
                    <span class="v01-books__year"><?= $b[0] ?></span>
                    <span class="v01-books__main">
                        <span class="v01-books__title"><?= htmlspecialchars($b[1]) ?></span>
                        <?php if ($b[2] !== '') : ?><span class="v01-books__sub"><?= htmlspecialchars($b[2]) ?></span><?php endif; ?>
                    </span>
                    <span class="v01-books__publisher"><?= htmlspecialchars($b[3]) ?><span class="v01-sr"> (öffnet in neuem Tab)</span></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--gold">
    <div class="v01-container v01-teaching">
        <div class="v01-teaching__text">
            <p class="v01-eyebrow v01-eyebrow--gold">Lehre · Für Studierende</p>
            <h2 class="v01-h2">Lehre im Wintersemester 2026/27</h2>
            <p class="v01-teaching__lead">Sprechzeiten und Informationen zur Betreuung von Abschlussarbeiten finden Sie auf der Seite der Hochschule Neubrandenburg.</p>
            <div class="v01-teaching__links">
                <a class="v01-link" href="<?= htmlspecialchars($sprechzeitenUrl) ?>" target="_blank" rel="noopener noreferrer">Sprechzeiten an der HS NB <?= v01_arrow('up-right') ?><span class="v01-sr"> (öffnet in neuem Tab)</span></a>
                <a class="v01-link" href="<?= v01_url('lehre') ?>">Alle Lehrveranstaltungen <?= v01_arrow() ?></a>
            </div>
        </div>
        <ul class="v01-courses">
            <?php foreach ($lehre as $l) : ?>
            <li class="v01-courses__item">
                <span class="v01-courses__type"><?= htmlspecialchars($l[0]) ?></span>
                <span class="v01-courses__title"><?= htmlspecialchars($l[1]) ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="v01-section v01-section--rose v01-section--lined-rose">
    <div class="v01-container v01-inquiry">
        <picture>
            <source type="image/webp" srcset="/images/v01/vortrag-lisa-haller.webp">
            <img class="v01-inquiry__img" src="/images/v01/vortrag-lisa-haller.jpg" width="1137" height="1280" loading="lazy" alt="Lisa Yashodhara Haller bei einem Vortrag am Rednerpult">
        </picture>
        <div class="v01-inquiry__text">
            <p class="v01-eyebrow">Für Veranstalter*innen</p>
            <h2 class="v01-h2">Vorträge, Workshops und Beratung</h2>
            <p class="v01-inquiry__lead">Für Konferenzen, Fachverbände, Unternehmen und Einrichtungen der Sozialen Arbeit, zu Sozialpolitik, Elternschaft und Geschlecht.</p>
            <div class="v01-inquiry__actions">
                <a class="v01-btn v01-btn--primary" href="<?= v01_url('kontakt') ?>">Anfrage senden</a>
                <a class="v01-link mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
