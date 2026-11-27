<?php
/**
 * Relaunch v01 – Navigation (flach). $navActive markiert die aktuelle Seite.
 * Desktop: Hauptnavigation in der Kopfzeile. Mobil (bis 860 px): Menü als Vollbild-Overlay laut Entwurf
 * (docs/design/20261127-design-entwurf-mobile-menu); ohne JavaScript steht die Liste unter der Kopfzeile.
 * 'tone' = Farbbalken vor dem Eintrag im mobilen Menü.
 */
$navItems = [
    'profil'        => ['Profil',         'petrol'],
    'forschung'     => ['Forschung',      'red'],
    'publikationen' => ['Publikationen',  'red'],
    'lehre'         => ['Lehre',          'gold'],
    'vortraege'     => ['Vorträge',       'gold'],
    'medien'        => ['Medien',         'petrol'],
];
$arrow = '<svg aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l14 0"></path><path d="M13 18l6 -6"></path><path d="M13 6l6 6"></path></svg>';
$logoSrc = '/images/v01/logo-lisa-haller.svg';
?>
<header class="v01-header">
    <div class="v01-container v01-header__inner">
        <a class="v01-logo" href="<?= v01_url('home') ?>" aria-label="Startseite Prof. Dr. Lisa Yashodhara Haller">
            <img src="<?= $logoSrc ?>" width="385" height="73" alt="Prof. Dr. Lisa Yashodhara Haller">
        </a>
        <button class="v01-nav__toggle" type="button" aria-label="Menü öffnen" aria-expanded="false" aria-controls="v01-menu">
            Menü
            <svg aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6l16 0"></path><path d="M4 12l16 0"></path><path d="M4 18l16 0"></path></svg>
        </button>

        <div class="v01-menu" id="v01-menu">
            <div class="v01-menu__top">
                <a class="v01-menu__logo" href="<?= v01_url('home') ?>" aria-label="Startseite Prof. Dr. Lisa Yashodhara Haller">
                    <img src="<?= $logoSrc ?>" width="385" height="73" alt="">
                </a>
                <button class="v01-menu__close" type="button" aria-label="Menü schließen">
                    <svg aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="v01-nav" aria-label="Hauptnavigation">
                <ul class="v01-nav__list">
                    <?php $n = 0; foreach ($navItems as $key => [$label, $tone]) : $n++; ?>
                    <li class="v01-nav__item">
                        <a class="v01-nav__link" href="<?= v01_url($key) ?>"<?= $navActive === $key ? ' aria-current="page"' : '' ?>>
                            <span class="v01-nav__bar v01-nav__bar--<?= $tone ?>" aria-hidden="true"></span>
                            <span class="v01-nav__main"><span class="v01-nav__num" aria-hidden="true"><?= sprintf('%02d', $n) ?></span><span class="v01-nav__label"><?= $label ?></span></span>
                            <span class="v01-nav__arrow" aria-hidden="true"><?= $arrow ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <li class="v01-nav__item v01-nav__item--cta"><a class="v01-btn v01-btn--ghost v01-nav__cta" href="<?= v01_url('kontakt') ?>"<?= $navActive === 'kontakt' ? ' aria-current="page"' : '' ?>>Kontakt</a></li>
                </ul>
            </nav>

            <div class="v01-menu__foot">
                <a class="v01-menu__cta" href="<?= v01_url('kontakt') ?>"<?= $navActive === 'kontakt' ? ' aria-current="page"' : '' ?>>Kontakt aufnehmen <?= $arrow ?></a>
                <div class="v01-menu__row">
                    <span class="v01-menu__mail">
                        <svg class="v01-menu__mailicon" aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path><path d="M3 7l9 6l9 -6"></path></svg>
                        <a class="mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a>
                    </span>
                    <a class="v01-menu__sq" href="https://orcid.org/0000-0001-5094-207X" target="_blank" rel="noopener noreferrer" aria-label="ORCID (öffnet in neuem Tab)">
                        <svg aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path><path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M15 8l2 0"></path><path d="M15 12l2 0"></path><path d="M7 16l10 0"></path></svg>
                    </a>
                    <a class="v01-menu__sq" href="https://www.linkedin.com/in/dr-lisa-yashodhara-haller-22122699/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn (öffnet in neuem Tab)">
                        <svg aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M8 11v5"></path><path d="M8 8v.01"></path><path d="M12 16v-5"></path><path d="M16 16v-3a2 2 0 1 0 -4 0"></path><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path></svg>
                    </a>
                </div>
                <a class="v01-menu__org" href="https://www.hs-nb.de/" target="_blank" rel="noopener noreferrer" aria-label="Hochschule Neubrandenburg (öffnet in neuem Tab)">
                    <img src="/images/v01/logo-hs-neubrandenburg.svg" width="130" height="34" alt="Hochschule Neubrandenburg – University of Applied Sciences">
                </a>
            </div>
        </div>
    </div>
</header>
