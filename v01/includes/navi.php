<?php
/** Relaunch v01 – Navigation (flach). $navActive markiert die aktuelle Seite. */
$navItems = [
    'profil'        => 'Profil',
    'forschung'     => 'Forschung',
    'publikationen' => 'Publikationen',
    'lehre'         => 'Lehre',
    'vortraege'     => 'Vorträge',
    'medien'        => 'Medien',
];
?>
<header class="v01-header">
    <div class="v01-container v01-header__inner">
        <a class="v01-logo" href="<?= v01_url('home') ?>" aria-label="Startseite Prof. Dr. Lisa Yashodhara Haller">
            <img src="/images/v01/logo-lisa-haller.svg" width="385" height="73" alt="Prof. Dr. Lisa Yashodhara Haller">
        </a>
        <nav class="v01-nav" aria-label="Hauptnavigation">
            <button class="v01-nav__toggle" type="button" aria-expanded="false" aria-controls="v01-nav-list">Menü</button>
            <ul class="v01-nav__list" id="v01-nav-list">
                <?php foreach ($navItems as $key => $label) : ?>
                <li><a class="v01-nav__link" href="<?= v01_url($key) ?>"<?= $navActive === $key ? ' aria-current="page"' : '' ?>><?= $label ?></a></li>
                <?php endforeach; ?>
                <li><a class="v01-btn v01-btn--ghost v01-nav__cta" href="<?= v01_url('kontakt') ?>"<?= $navActive === 'kontakt' ? ' aria-current="page"' : '' ?>>Kontakt</a></li>
            </ul>
        </nav>
    </div>
</header>
