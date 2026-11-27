<?php
// Relaunch v01 – Kontakt. Layout aus dem Entwurf (Kontakt – Desktop).
// Spam-Schutz unverändert wie /contact/: CSRF-Token (Hidden-Feld + Cookie, Double-Submit), drei Honeypots,
// Datenschutz-Checkbox. Versand weiterhin über /contact/contact.php (Rate-Limit, URL-Filter, Mindestlänge dort).
require dirname(__DIR__, 2) . '/.config/private.php';

// Seite mit Token + Cookie darf von Browser/Proxy nicht gespeichert werden
header('Cache-Control: no-store, max-age=0');
$csrfToken = bin2hex(random_bytes(32));
setcookie('csrf_token', $csrfToken, [
    'expires'  => 0,
    'path'     => '/',
    'samesite' => 'Lax',
    'httponly' => true,
    'secure'   => !empty($_SERVER['HTTPS']),
]);

$metaTitle = 'Kontakt | Prof. Dr. Lisa Yashodhara Haller';
$metaDesc  = 'Kontakt zu Prof. Dr. Lisa Yashodhara Haller: Anfragen für Vorträge, Workshops, Beratung, Presse sowie Studium und Lehre.';
$ogImg     = 'og_kontakt.jpg';
$navActive = 'kontakt';
require dirname(__DIR__) . '/includes/header.php';

$e = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

// Anliegen: Schlüssel => [Beschriftung, Hinweis]
$topics = [
    'vortrag'   => ['Vortrag oder Workshop', 'Nennen Sie gern Anlass, Datum, Ort oder Format (online/vor Ort) und die ungefähre Zahl der Teilnehmenden.'],
    'beratung'  => ['Beratung', ''],
    'presse'    => ['Presseanfrage', 'Bitte nennen Sie Medium, Thema und Ihre Deadline.'],
    'studium'   => ['Studium und Lehre', 'Für Sprechzeiten, Prüfungen und Abschlussarbeiten nutzen Sie bitte die Seite der Hochschule Neubrandenburg oder schreiben direkt an die E-Mail-Adresse unter „Kontaktdaten“.'],
    'sonstiges' => ['Sonstiges', ''],
];
$sprechzeitenUrl = 'https://www.hs-nb.de/fachbereich-soziale-arbeit-bildung-und-erziehung/ppages/lisa-yashodhara-haller/';
?>
<section class="v01-pagehead v01-pagehead--simple">
    <div class="v01-container v01-pagehead__inner">
        <?= v01_breadcrumb([['Kontakt']]) ?>
        <div class="v01-pagehead__grid v01-pagehead__grid--end">
            <div class="v01-pagehead__text">
                <p class="v01-eyebrow">Kontakt</p>
                <h1 class="v01-h1 v01-h1--page">Schreiben Sie mir</h1>
                <p class="v01-lead">Möchten Sie, dass ich einen Vortrag oder einen Workshop für Ihre Organisation oder Ihre Konferenz halte? Benötigen Sie Beratung rund um die Themen Sozialpolitik, Elternschaft und Geschlecht?</p>
            </div>
            <figure class="v01-pagehead__figure v01-pagehead__figure--contact">
                <img src="/images/v01/kontakt-lisa-haller.webp" width="410" height="340" alt="Porträt von Lisa Yashodhara Haller" fetchpriority="high">
            </figure>
        </div>
    </div>
</section>

<section class="v01-section v01-section--rose v01-section--lined-rose v01-contact">
    <div class="v01-container v01-contact__inner">
        <div class="v01-formcard">
            <div id="v01-form-area">
                <form class="v01-form" id="v01-contact-form" action="/contact/contact.php" method="post" novalidate>
                    <fieldset class="v01-form__topics">
                        <legend>Worum geht es?</legend>
                        <div class="v01-topics">
                            <?php $first = true; foreach ($topics as $key => $t) : ?>
                            <span class="v01-topic">
                                <input type="radio" name="topic" id="v01-topic-<?= $key ?>" value="<?= $key ?>" data-label="<?= $e($t[0]) ?>"<?= $first ? ' checked' : '' ?>>
                                <label for="v01-topic-<?= $key ?>"><?= $e($t[0]) ?></label>
                            </span>
                            <?php $first = false; endforeach; ?>
                        </div>
                        <?php $first = true; foreach ($topics as $key => $t) : if ($t[1] === '') { $first = false; continue; } ?>
                        <p class="v01-hint v01-hint--<?= $key ?>" data-topic="<?= $key ?>"<?= $first ? '' : ' hidden' ?>><?= $e($t[1]) ?></p>
                        <?php $first = false; endforeach; ?>
                    </fieldset>

                    <div class="v01-form__row">
                        <div class="v01-field">
                            <label for="v01-name">Name <span class="v01-req" aria-hidden="true">*</span></label>
                            <input id="v01-name" name="name" type="text" autocomplete="name" maxlength="120" required aria-describedby="v01-name-err">
                            <p class="v01-field__err" id="v01-name-err" hidden></p>
                        </div>
                        <div class="v01-field">
                            <label for="v01-email">E-Mail-Adresse <span class="v01-req" aria-hidden="true">*</span></label>
                            <input id="v01-email" name="email" type="email" autocomplete="email" required aria-describedby="v01-email-err">
                            <p class="v01-field__err" id="v01-email-err" hidden></p>
                        </div>
                    </div>
                    <div class="v01-field">
                        <label for="v01-org">Organisation <span class="v01-opt">(optional)</span></label>
                        <input id="v01-org" name="organisation" type="text" autocomplete="organization" maxlength="160">
                    </div>
                    <div class="v01-field">
                        <label for="v01-message">Ihre Nachricht <span class="v01-req" aria-hidden="true">*</span></label>
                        <textarea id="v01-message" name="message" rows="6" required minlength="20" maxlength="4500" aria-describedby="v01-message-err"></textarea>
                        <p class="v01-field__err" id="v01-message-err" hidden></p>
                    </div>
                    <div class="v01-check">
                        <input id="v01-privacy" name="privacy" type="checkbox" value="1" required aria-describedby="v01-privacy-err">
                        <label for="v01-privacy">Ich habe die <a href="<?= v01_url('datenschutz') ?>">Datenschutzerklärung</a> gelesen und bin mit der Verarbeitung meiner Angaben zur Beantwortung der Anfrage einverstanden. <span class="v01-req" aria-hidden="true">*</span></label>
                        <p class="v01-field__err" id="v01-privacy-err" hidden></p>
                    </div>

                    <!-- Honeypots: für Menschen unsichtbar, Bots füllen sie aus (Inline-Style ist bewusste Ausnahme, siehe CLAUDE.md) -->
                    <div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;">
                        <input type="text" name="<?= $e(HP_WEBSITE) ?>" tabindex="-1" autocomplete="off">
                        <input type="email" name="<?= $e(HP_EMAIL_CONFIRM) ?>" tabindex="-1" autocomplete="off">
                        <input type="checkbox" name="<?= $e(HP_TERMS) ?>" tabindex="-1">
                    </div>
                    <input type="hidden" name="csrf_token" value="<?= $e($csrfToken) ?>">

                    <p class="v01-form__error" id="v01-form-error" role="alert" hidden></p>
                    <div class="v01-form__foot">
                        <span class="v01-form__req"><span class="v01-req" aria-hidden="true">*</span> Pflichtfeld</span>
                        <button class="v01-btn v01-btn--primary v01-form__submit" type="submit" id="v01-submit">Nachricht senden
                            <svg class="v01-icon" aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 14l11 -11"></path><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path></svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="v01-sent" id="v01-sent" role="status" tabindex="-1" hidden>
                <h2 class="v01-sent__title">Vielen Dank für Ihre Nachricht</h2>
                <p>Ihre Anfrage ist angekommen. Ich melde mich so bald wie möglich bei Ihnen.</p>
                <button class="v01-btn v01-btn--ghost" type="button" id="v01-again">Neue Nachricht schreiben</button>
            </div>
        </div>

        <aside class="v01-contactside" aria-label="Kontaktdaten">
            <div class="v01-contactside__block">
                <h2 class="v01-contactside__title">Kontaktdaten</h2>
                <p class="v01-contactside__name">Prof. Dr. Lisa Yashodhara Haller</p>
                <p>Professur für Sozialpolitik, Ökonomie sozialer Einrichtungen und sozialer Dienste</p>
                <p>Hochschule Neubrandenburg<br>Fachbereich Soziale Arbeit, Bildung und Erziehung</p>
                <span class="v01-mailrow">
                    <svg class="v01-icon" aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path><path d="M3 7l9 6l9 -6"></path></svg>
                    <a class="v01-link v01-link--big mailaddress" href="#" data-name="haller" data-domain="hs-nb" data-tld="de"><noscript>haller [at] hs-nb [dot] de</noscript></a>
                </span>
                <a href="https://www.hs-nb.de/" target="_blank" rel="noopener noreferrer" aria-label="Hochschule Neubrandenburg (öffnet in neuem Tab)">
                    <img class="v01-bio__logo" src="/images/v01/logo-hs-neubrandenburg.svg" width="153" height="40" alt="Hochschule Neubrandenburg – University of Applied Sciences" loading="lazy">
                </a>
            </div>
            <div class="v01-contactside__block v01-contactside__block--ruled">
                <h2 class="v01-contactside__title">Wissenschaftliche Profile</h2>
                <ul class="v01-sidelinks">
                    <li><a href="https://orcid.org/0000-0001-5094-207X" target="_blank" rel="noopener noreferrer"><svg aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path><path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M15 8l2 0"></path><path d="M15 12l2 0"></path><path d="M7 16l10 0"></path></svg>ORCID<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                    <li><a href="https://www.researchgate.net/profile/Lisa-Haller" target="_blank" rel="noopener noreferrer"><svg aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path></svg>ResearchGate<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                    <li><a href="https://www.linkedin.com/in/dr-lisa-yashodhara-haller-22122699/" target="_blank" rel="noopener noreferrer"><svg aria-hidden="true" focusable="false" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M8 11v5"></path><path d="M8 8v.01"></path><path d="M12 16v-5"></path><path d="M16 16v-3a2 2 0 1 0 -4 0"></path><path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path></svg>LinkedIn<span class="v01-sr"> (öffnet in neuem Tab)</span></a></li>
                </ul>
            </div>
            <div class="v01-contactside__block v01-contactside__block--ruled">
                <h2 class="v01-contactside__title v01-contactside__title--gold">Für Studierende</h2>
                <p>Sprechzeiten und Betreuung von Abschlussarbeiten über die Hochschulseite.</p>
                <a class="v01-link" href="<?= $e($sprechzeitenUrl) ?>" target="_blank" rel="noopener noreferrer">Zur Seite der HS NB <?= v01_arrow('up-right') ?><span class="v01-sr"> (öffnet in neuem Tab)</span></a>
            </div>
        </aside>
    </div>
</section>

<script src="<?= asset('/js/v01-contact.js') ?>" defer></script>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
