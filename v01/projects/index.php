<?php
// Relaunch v01 – Forschung und Projekte. Daten: v01/data/projects.php, Layout aus dem Entwurf (Forschung – Desktop).
// Alle Projekte stehen serverseitig im HTML; der Zeitraum-Filter (js/v01-projects.js) ist nur eine Ergänzung.
$metaTitle = 'Forschung und Projekte | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Übersicht wissenschaftlichen Projekte, von geschlechtergerechter Jugendhilfe bis zur Analyse sozial- und familienpolitischer Interventionen.';
$ogImg     = 'og_forschung.jpg';
$navActive = 'forschung';
require dirname(__DIR__) . '/includes/header.php';

$projects = require dirname(__DIR__) . '/data/projects.php';
$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

$schwerpunkte = [
    ['Sozialpolitik und Wohlfahrtsstaat', 'Wie sozialpolitische Regelungen und ökonomische Strukturen Handlungsmöglichkeiten eröffnen, begrenzen und ungleich verteilen.'],
    ['Ökonomie sozialer Dienste', 'Wie soziale Dienste organisiert und finanziert werden und was das für ihre Praxis bedeutet.'],
    ['Familie, Elternschaft und Geschlecht', 'Auswirkungen familien- und gleichstellungspolitischer Maßnahmen auf die Arbeitsteilung und die materiellen Lebensbedingungen von Eltern.'],
];
$ranges = ['alle' => 'Alle', '2020' => 'Seit 2020', '2010' => '2010–2019', '2000' => '2000–2009'];
$rangeOf = static fn(int $from): string => $from >= 2020 ? '2020' : ($from >= 2010 ? '2010' : '2000');
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner v01-pagehead__inner--simple">
        <?= v01_breadcrumb([['Forschung']]) ?>
        <p class="v01-eyebrow">Forschung</p>
        <h1 class="v01-h1 v01-h1--page">Forschung und Projekte</h1>
        <div class="v01-twocol">
            <p class="v01-lead">Die Transformation wohlfahrtsstaatlicher Regulierung und die damit einhergehenden Veränderungen der ökonomischen Bedingungen bilden den Ausgangspunkt meiner Studien.</p>
            <p class="v01-twocol__right">Mich treibt das Wechselverhältnis zwischen Struktur und Handeln um. Anschaulich wird es immer dann, wenn wir miteinander in Interaktion treten: im Arbeitsleben, in Freundschaften, Paarbeziehungen und ganz besonders bei der Familiengründung.</p>
        </div>
    </div>
</section>

<section class="v01-section v01-section--beige v01-section--lined v01-section--compact">
    <div class="v01-container">
        <ol class="v01-focus v01-focus--compact">
            <?php foreach ($schwerpunkte as $i => $s) : ?>
            <li class="v01-focus__item">
                <span class="v01-focus__no" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                <h2 class="v01-h3 v01-h3--sm"><?= $e($s[0]) ?></h2>
                <p><?= $e($s[1]) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="v01-section v01-section--tall v01-projects">
    <div class="v01-container v01-stack v01-stack--m">
        <div class="v01-section__head">
            <h2 class="v01-h2 v01-h2--lg">Projekte</h2>
            <div class="v01-chips v01-jsonly" role="group" aria-label="Nach Zeitraum filtern">
                <?php foreach ($ranges as $key => $label) : ?>
                <button class="v01-chip" type="button" data-range="<?= $key ?>" aria-pressed="<?= $key === 'alle' ? 'true' : 'false' ?>"><?= $label ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <ul class="v01-pcards">
            <?php foreach ($projects as $p) : ?>
            <li class="v01-pcard" data-range="<?= $rangeOf($p['from']) ?>">
                <a class="v01-pcard__link" href="<?= $e($p['href']) ?>">
                    <img class="v01-pcard__img" src="<?= $e($p['img']) ?>" width="410" height="340" alt="" loading="lazy">
                    <span class="v01-pcard__years"><?= $e($p['years']) ?></span>
                    <span class="v01-pcard__title"><?= $e($p['title']) ?></span>
                    <span class="v01-pcard__sub"><?= $e($p['sub']) ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<script src="<?= asset('/js/v01-projects.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
