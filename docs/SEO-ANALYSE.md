# Technisches Audit – lisa-yashodhara-haller.de

Stand: 24.11.2026 · Umfang: Code im Repo (Commit `36f67a6` + lokale Änderungen) und Live-Seite `https://www.lisa-yashodhara-haller.de`
Nur gelesen, nichts geändert, nichts umgesetzt. Design, Texte und Inhalte wurden nicht bewertet.

## Prüfumfang und Grenzen

- **Live-Abrufe:** rund 35 Einzelabrufe (Header/Statuscodes, ohne Seiteninhalt) mit 2 s Pause. Danach reagierte der Server nicht mehr (Timeouts, vermutlich Rate-Begrenzung). Alle weiteren Punkte sind deshalb **nur im Code geprüft** und als „Code“ markiert. Die Live-HTML der Startseite wurde nicht geladen.
- **Nicht geprüft:** gerenderte Seiten im Browser, Lighthouse/Core Web Vitals, Farbkontraste, Tastaturbedienung im echten Browser, Komprimierung (gzip/brotli) und HTTP/2 live, rechtliche Würdigung der Datenschutzerklärung. Diese Punkte sind als „offen“ gekennzeichnet.
- **Aufwand:** S = unter 1 Std., M = 1–4 Std., L = mehr als 4 Std.
- **Quellen:** „Live“ = per Abruf bestätigt, „Code“ = nur aus dem Quelltext abgeleitet.

## Kurzfassung – die wichtigsten Funde

| # | Prio | Fund | Aufwand |
|---|---|---|---|
| H1 | hoch | Alle HTML-Seiten sind 30 Tage öffentlich cachebar, auch die Kontaktseite mit CSRF-Cookie | S |
| S1 | hoch | `README.md`, `CLAUDE.md`, `router.php`, `prettier.config.mjs`, `jens` sind öffentlich abrufbar | S |
| H2 | hoch | `www` und ohne `www` liefern beide 200, keine Weiterleitung | S |
| H3 | hoch | Standard-Vorschaubild (`og:image`) und `itemprop=image` zeigen auf nicht vorhandene `/img/…`-Dateien (404) | S |
| P1 | hoch | CSS-`@import`-Kette: 8 Dateien nacheinander, alle render-blockierend | M |
| P2 | mittel | CSS/JS mit 1 Jahr Cache, aber ohne Versionsnummer: Änderungen erreichen Bestandsbesucher nicht | S |

---

## 1. Sicherheit

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| S1 | hoch | **Entwicklungs- und Doku-Dateien liegen im Webroot und sind abrufbar (Live: HTTP 200):** `README.md` (5801 B), `CLAUDE.md` (9160 B), `router.php`, `prettier.config.mjs`, `jens` (23 B, unbekannte Datei). Die `CLAUDE.md` beschreibt den Spam-Schutz (Schichten, Dateien, Ablauf) und erleichtert das Umgehen. `package.json` ist korrekt gesperrt (404). Die neuen Deploy-Workflows laden diese Dateien nicht hoch, sie stammen aus dem früheren FTP-Upload und müssen einmalig vom Server gelöscht werden. | Server-Webroot, `.htaccess` | S |
| S2 | mittel | **Pfad-Segmente der URL werden ungeschützt ausgegeben.** `ucfirst($crumb)` und `$currentPath` stehen ohne `htmlspecialchars` in `href` und Linktext. Browser kodieren `<`, `>`, `"` im Pfad, die Ausnutzbarkeit ist daher gering. Wegen der Fehlerseite (spiegelt jede URL) und `script-src 'unsafe-inline'` trotzdem ein Risiko. | `components/breadcrumb.php:19` | S |
| S3 | mittel | **CSP erlaubt `'unsafe-inline'` für Skripte und Styles** und hebt damit den XSS-Schutz weitgehend auf. Ursachen: Inline-Skript im Footer, `onclick`-Attribute, `style="…"`. Es fehlen `form-action` und `frame-ancestors`. | `.htaccess:28`, `includes/footer.php:114-124`, `about/index.php:47,61,71` | M |
| S4 | niedrig | **Rate-Limit zählt vor der Prüfung.** Auch ungültige Anfragen verbrauchen das Kontingent (5 pro Stunde und IP). Gemeinsame IPs (Uni-Netz) sperren sich gegenseitig aus. Lesen und Schreiben der Zähldatei ohne gemeinsames Lock (Race). Zähldateien in `sys_get_temp_dir()` werden nie aufgeräumt. | `contact/contact.php:26-56,65` | S |
| S5 | niedrig | **CSRF-Token wird bei jedem Aufruf der Kontaktseite neu gesetzt.** Ein zweiter Tab macht den ersten ungültig. Die Prüfung erfolgt per Cookie (nicht Sitzung); damit ist die offene Frage „Sitzung oder Cookie“ aus `CLAUDE.md` Abschnitt 4 geklärt: **Cookie (Double-Submit)**, Doku anpassen. Zusammenhang mit H1: Eine gecachte Seite hat ein altes Token. | `contact/index.php:3-10`, `contact/contact.php:70-75` | S |
| S6 | niedrig | **`GET /contact/contact.php` liefert 200** mit der Fehlermeldung statt 405. Bei Nicht-AJAX-Antwort fehlt der `Content-Type`. | `contact/contact.php:59-61,171-179` | S |
| S7 | niedrig | **Basic-Auth-Vergleich mit `!==`** statt `hash_equals`. `require_auth()` wird nirgends aktiv genutzt (auskommentiert). Dazu wird bei **jedem Seitenaufruf** die `.env` gelesen und geparst, obwohl sie nur für Auth gebraucht wird. | `includes/auth.php:3-12,21-22`, `includes/header.php:2-3` | S |
| S8 | niedrig | **Klartext-E-Mail-Adresse** im HTML (`mailto:`), obwohl `js/email.js` eine Verschleierung bietet. `email.js` wird auf jeder Seite geladen, aber nirgends benutzt (kein Element mit Klasse `mailaddress`). | `contact/index.php:95`, `js/email.js`, `includes/footer.php:136` | S |
| S9 | niedrig | **`gallery_component.php` gibt `alt` und `path` ungefiltert aus.** Die Daten kommen derzeit aus eigenem Code, daher nur Vorsorge. | `components/gallery_component.php:7,22` | S |
| S10 | info | `Strict-Transport-Security` mit `includeSubDomains; preload`: gilt auch für alle Subdomains. Nur sinnvoll, wenn alle per HTTPS laufen. | `.htaccess:20` | – |
| S11 | info (gut) | `.env`, `.config/`, `.git/config` liefern 404, `_backup/` und `/css/` liefern 403. Sicherheits-Header gesetzt (HSTS, CSP, `X-Frame-Options`, `nosniff`, `Referrer-Policy`, `Permissions-Policy`). Im Repo keine Klartext-Zugangsdaten, keine `phpinfo`-/Debug-Dateien, keine `$_GET`-Auswertung. Header-Injection im Kontaktformular verhindert (Zeilenumbrüche entfernt, `filter_var`). | Live + Code | – |

## 2. HTTP / Indexierung

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| H1 | hoch | **HTML-Seiten sind 30 Tage cachebar** (`Cache-Control: max-age=2592000, public`, Live auf `/`, `/contact/`, `/imprint/`). Ursache: `ExpiresDefault` 1 Monat gilt auch für PHP-Ausgabe. Folgen: Inhaltsänderungen erreichen Besucher mit bis zu 30 Tagen Verzögerung. Die Kontaktseite setzt zusätzlich ein `Set-Cookie` (CSRF) und ist trotzdem `public` cachebar. Gecachte Seite plus Sitzungs-Cookie, das beim Browser-Neustart verfällt, ergibt ein ungültiges Token und ein scheinbar „kaputtes“ Formular. | `.htaccess:158` (`ExpiresDefault`), `contact/index.php:3-10` | S |
| H2 | hoch | **`www` und ohne `www` sind beide HTTP 200**, kein 301. `http://` leitet korrekt auf `https://` um (ein Schritt). Canonical, Sitemap und Robots verweisen auf `www`. Die Regeln dafür sind auskommentiert. | `.htaccess:41-47` | S |
| H3 | hoch | **`og:image`-Standard und `itemprop=image` zeigen auf nicht vorhandene Pfade:** `/img/og_lisa-haller.jpg` (Live: 404) und `/img/lisa-Yashodhara-haller.png`. Das Verzeichnis heißt `images/`. `$ogImg` wird auf keiner Seite gesetzt, **alle Seiten** haben damit ein kaputtes Vorschaubild. `itemprop` ohne `itemscope` ist zudem wirkungslos. | `includes/header.php:18,47` | S |
| H4 | mittel | **`og:url` hat auf der Startseite einen doppelten Schrägstrich** (`…de//`), weil `dirname()` auf `/` plus feste `/` addiert. Der Canonical-Tag behandelt das richtig, `og:url` nicht. | `includes/header.php:41` | S |
| H5 | mittel | **Fehlerseite `/error/` liefert direkt 200** (nur über `ErrorDocument` korrekt 404, bestätigt für `/nicht-vorhanden-xyz/`). Sie hat `index,follow` und einen eigenen Canonical. `robots.txt` sperrt `/error/`, ein `noindex` fehlt aber. | `includes/header.php:26,67`, `error/index.php` | S |
| H6 | mittel | **`robots.txt` sperrt `/css/`, `/js/`, `/fonts/`, `/vendor/`.** Google kann die Seite so nicht korrekt rendern und bewerten. Außerdem Tippfehler `/imgages/*.psd` (wirkungslos). Kopfkommentar „Last update 04.03.2005“. | `robots.txt` | S |
| H7 | mittel | **Sitemap:** alle 23 URLs mit `lastmod` 2024-02-11 (veraltet), `changefreq`/`priority` werden von Suchmaschinen ignoriert. `projects/master/` fehlt (siehe H8). Sonst nur indexierbare URLs, alle auf `www`, alle mit Slash. Live 200. | `sitemap.xml` | S |
| H8 | mittel | **Template-Seite `projects/master/`** („Template als Grundlage für Projekt Seiten“, Platzhalterbilder) ist im Repo, wird deployed und hat `index,follow`. Nicht in der Sitemap, aber per Link erreichbar. Live nicht geprüft. | `projects/master/index.php:3` | S |
| H9 | niedrig | **`/index.php` liefert 200** neben `/`. Der Canonical fängt das ab, die Weiterleitungsregel ist auskommentiert. | `.htaccess:49-51` | S |
| H10 | niedrig | **Meta-Beschreibung der Impressum-Seite ist leer** (`$metaDesc = ""`). `isset()` greift, der Standardtext wird nicht verwendet. | `imprint/index.php:3` | S |
| H11 | niedrig | **Doppelte/ungültige Meta-Tags:** zwei `theme-color` mit unterschiedlichen Werten (`#950000` / `#ffffff`), `apple-mobile-web-app-status-bar-style` mit ungültigem Wert `#950000`, `msapplication-navbutton-color` veraltet, `index,follow` ist Standard. | `includes/header.php:19-21,35` | S |
| H12 | info | `hreflang` nicht nötig (einsprachig `de`, `lang="de"` gesetzt). `/about` → `/about/` ist eine saubere 301 (ein Schritt). Nicht vorhandene URLs liefern echtes 404. | – | – |

## 3. Strukturierte Daten

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| J1 | mittel | **Auf allen 24 Seiten steht dasselbe `Person`-JSON-LD**, `url` immer die Startseite. Sichtbarer Text passt (Name, Berufsbezeichnung „Professorin für Sozialpolitik“ steht auf der Seite). Es fehlen seitentypspezifische Daten: `WebSite`, `ProfilePage` (Start/About), `BreadcrumbList` (Breadcrumb existiert im HTML), `ContactPage`, `ScholarlyArticle`/`Book` (Publikationen), `VideoObject`/`AudioObject` (Medien), `Event`/`Course` (Vorträge, Lehre). `worksFor`/`affiliation` fehlt. | `includes/header.php:49-63` | M |

## 4. Performance

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| P1 | hoch | **CSS-`@import`-Kette:** `style.css` (229 KB) lädt per `@import` nacheinander Bootstrap (160 KB), `navbar`, `framework`, Bootstrap-Icons, Font Awesome `all.min.css` (98 KB), Fancybox, Slick und Nice-Select. Dazu `responsive.css` (56 KB). Jeder Import startet erst nach dem Laden der vorherigen Datei (Wasserfall), alles blockiert das Rendering. Rund 600 KB CSS unkomprimiert, vermutlich großer Anteil ungenutzt. | `css/style.css:15-31`, `includes/header.php:70-71` | M |
| P2 | mittel | **CSS/JS mit 1 Jahr Cache, aber ohne Versionierung** (`style.css`, `theme.js` ohne `?v=`; nur `isotope` hat eins). Nach einem Deploy sehen Wiederkehrer die alte Datei, bis der Cache abläuft. Live z. B. `Cache-Control: max-age=31536000` auf Vendor-JS. | `.htaccess` (Expires), `includes/header.php:70-71`, `includes/footer.php` | S |
| P3 | mittel | **Auf jeder Seite werden Bibliotheken geladen, die kaum/nicht genutzt werden:** Slick (JS 41 KB + CSS) in **keiner** Seite verwendet; Fancybox (JS 60 KB + CSS) nur in der Template-Seite; Isotope (39 KB) nur auf 4 Seiten; Validator (11 KB) nur auf Kontakt; Nice-Select-CSS ohne zugehöriges Skript. **Font Awesome: nur 2 Icons genutzt** (`fa-microphone-lines`, `fa-users-viewfinder`), geladen werden `all.min.css` plus Fonts. **Bootstrap-Icons: 3 Icons** (Pfeil, 2 Chevrons) für 90 KB Font. jQuery (85 KB) für wenige Funktionen. | `includes/footer.php:111-137`, `css/style.css:23-31`, `js/theme.js` | M–L |
| P4 | mittel | **Schriften:** Font Awesome mit `font-display: block` (Icons bis zum Laden unsichtbar), TTF-Fallbacks in `src` (nur WOFF2 nötig). Gordita: 5 Gewichte, jeweils WOFF2 + WOFF (WOFF unnötig), `font-display: swap` ist gesetzt, kein `preload` für den Haupt-Font. Alle Schriften sind selbst gehostet. | `fonts/font-awesome/css/all.min.css`, `fonts/gordita/stylesheet.css` | S |
| P5 | mittel | **Bildformate:** 64 PNG (5,4 MB) und 199 JPG (5,3 MB) gegenüber nur 19 WebP und 1 AVIF. Große PNG-Fotos: `images/publications/kapital-staat-geschlecht.png` 1,1 MB, `images/home/stage_img_lisa_haller.png` 889 KB, `images/home/img_lisa_haller.png` 676 KB. Die Startseite nutzt `<picture>` mit WebP, die meisten übrigen Bilder nicht. | `images/**` | M |
| P6 | mittel | **Startseite lädt auf Mobilgeräten beide Porträts:** das mobile (`d-lg-none`) und das Desktop-Bild (`d-none d-lg-block`), beide `loading="eager"` + `fetchpriority="high"`. `display:none` verhindert den Download nicht. Das konkurriert mit dem LCP-Bild (Commit „Fix mobile LCP: use xs image only“ ist damit nur teilweise umgesetzt). | `index.php:20-24,31-36` | S |
| P7 | mittel | **CLS-Risiko:** 59 von 128 `<img>`-Tags im Code ohne `width`/`height` (Zeilenbasierte Zählung, Näherung). | `**/*.php` | M |
| P8 | niedrig | **`setimglazy.js`** erkennt Mobilgeräte per User-Agent-Regex (rund 2 KB) und setzt dann `loading="lazy"`. Nativ im Markup (`loading="lazy"`) wäre das einfacher und für alle Geräte. | `js/setimglazy.js` | S |
| P9 | niedrig | **Skripte am Seitenende ohne `defer`** (jQuery, Bootstrap, Slick, Fancybox, Isotope, Validator, `email.js`, `theme.js`). Am Ende des `<body>` weniger kritisch, aber unnötig groß (siehe P3). | `includes/footer.php:110-137` | S |
| P10 | offen | Komprimierung (gzip/Brotli), HTTP/2, LCP/CLS-Messwerte nicht geprüft (kein Lighthouse, Server reagierte nicht mehr). | – | – |

## 5. Barrierefreiheit

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| A1 | mittel | **Kein Skip-Link** zum Hauptinhalt. `<main>` ist vorhanden. | `includes/header.php:75-77` | S |
| A2 | mittel | **Startseite ohne `<h1>`:** der erste Titel ist ein `h2` (alle 24 Unterseiten haben genau ein `h1`). Fußzeile nutzt `h3` für Navigationsblöcke, „About“ steht doppelt. | `index.php:17`, `includes/footer.php:12-82` | S |
| A3 | mittel | **Kontaktformular ohne `<label>`:** nur Platzhalter. Submit-Button ohne `type`. Fehlermeldungen (`.help-block`) ohne `aria-live`. | `contact/index.php:42-55,77` | S |
| A4 | mittel | **Klickbare `<div onclick="location.href=…">`** auf der About-Seite sind per Tastatur nicht erreichbar und für Screenreader/Crawler keine Links. | `about/index.php:47,61,71` | S |
| A5 | mittel | **YouTube-Facade ist per Tastatur nicht bedienbar:** `div role="button" tabindex="0"`, aber nur ein `click`-Handler. Enter/Leertaste lösen bei einem `div` keinen Klick aus. | `components/youtube_video.php:6`, `js/theme.js:119-127` | S |
| A6 | niedrig | **Navigation:** `role="button"` auf normalen Links (`Home`, `About`), doppeltes `aria-label` am Menü-Button (zweites wird ignoriert, Text teils englisch „Toggle navigation“), Dropdown-Toggles `href="#"` mit überschreibendem `aria-label`. Bootstrap-Dropdowns sind grundsätzlich tastaturbedienbar, echter Test steht aus. | `includes/navi.php:22,33,38,49,77` | S |
| A7 | niedrig | **3 Bilder ohne `alt`** und teils ohne Maße. Carousel-Buttons mit englischem „Previous/Next“. | `about/index.php:159`, `courses/index.php:28,33`, `components/gallery_component.php:24,28` | S |
| A8 | offen | **Fokus-Styles:** 6 Stellen mit `outline: none/0` im CSS, Wirkung ohne Browsertest unklar. **Farbkontraste** nicht geprüft. | `css/*.css` | – |

## 6. Datenschutz / Tracking

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| D1 | info (gut) | **Kein Analytics, kein Tag-Manager, keine externen Skripte, Fonts oder iframes beim Laden.** Alle Assets sind selbst gehostet, die CSP erzwingt das. YouTube wird erst nach Klick und Zustimmung geladen (eigene Facade mit lokalen Vorschaubildern). Gesetztes Cookie: nur `csrf_token` (Sitzungs-Cookie, technisch notwendig). | `js/theme.js:119-127`, `components/youtube_video.php` | – |
| D2 | niedrig | **YouTube-Embed nutzt `youtube.com`**, nicht `youtube-nocookie.com`. Die CSP erlaubt beide. | `js/theme.js:127` | S |
| D3 | mittel | **Datenschutzerklärung (nur Stichwortsuche, keine juristische Prüfung):** YouTube, Cookies, Server-Logs, Kontaktformular und Rechtsgrundlagen kommen vor. **Nicht gefunden:** Hosting-Anbieter/Auftragsverarbeitung (0 Treffer), das **IP-Rate-Limit** (SHA-256-Hash der IP in `sys_get_temp_dir()`, 1 Stunde) und die **Bestätigungsmail** an den Absender (1 Treffer „Bestätigungs…“ bitte prüfen). | `privacy/index.php`, `contact/contact.php:26-56,151-162` | S |
| D4 | info | `target="_blank"`: 85 von 221 Links ohne `rel` in derselben Zeile (Näherung, Mehrzeiler nicht erfasst). Moderne Browser setzen `noopener` implizit. | `**/*.php` | – |

## 7. KI-Lesbarkeit

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| K1 | mittel | **Keine `llms.txt`** (Live 404). | Webroot | S |
| K2 | info (gut) | Inhalt ist serverseitig erzeugt (PHP) und steht im ersten HTML ohne JavaScript. Navigation sind echte `<a href>`-Links (Menü und Fußzeile). `robots.txt` hat eine `User-agent: *`-Regel. | Code | – |
| K3 | niedrig | **Die Kacheln auf der About-Seite sind nur per JavaScript verlinkt** (`onclick`), die Ziele sind aber über Menü/Fußzeile erreichbar. **`moreless.js`** kürzt Fließtext erst im Browser, der Volltext bleibt im HTML. Videos sind nur Facade mit Vorschaubild, ohne Textalternative. | `about/index.php:47-71`, `components/youtube_video.php` | S |
| K4 | niedrig | `robots.txt` sperrt CSS/JS/Fonts (siehe H6), das erschwert auch Agenten mit Rendering. `mailto:` ist vorhanden, `tel:` gibt es nicht. | `robots.txt`, `contact/index.php:95` | S |

## 8. Code-Qualität

| ID | Prio | Fund | Ort | Aufwand |
|---|---|---|---|---|
| Q1 | mittel | **`.gitignore` schließt `vendor/fancybox/dist/` aus** (Muster `dist/`, auch `build/`, `*.map`). Die Dateien liegen nur lokal und auf dem Server, nicht im Repo. Footer und `style.css` referenzieren sie. Bei Neuaufbau aus Git fehlt Fancybox, und die GitHub-Action lädt sie nie hoch. | `.gitignore:17`, `includes/footer.php:130`, `css/style.css:27` | S |
| Q2 | mittel | **Tote/ungenutzte Dateien:** `js/cookie-consent.js` (206 KB, nicht eingebunden), `js/email.js` (geladen, nie genutzt), `vendor/slick/`, `vendor/wow/`, `jquery.counterup`, `jquery.waypoints`, `jquery.lazy`, `respond.js`, `html5shiv.js` (nicht geladen), `css/custom-animation.css` (nicht eingebunden), `projects/master/` (Template), `images/**/*.psd` (3 Dateien, 16 MB, `images/fav-icon/favicon.psd` u. a.). | siehe Spalte links | S–M |
| Q3 | niedrig | **Doppelte Quellen:** Font-Awesome-CSS liegt als `css/{brands,fontawesome,regular,solid,v4-shims}.css` **und** als `fonts/font-awesome/scss/*.css` (Inhalt unterschiedlich, beide nicht eingebunden). Navigation steht in `navi.php` und `footer.php` getrennt, die Sitemap ist statisch neben den Seiten, Standardtitel/-beschreibung stehen in `header.php` doppelt, Social-Profile in Header-JSON-LD und Footer. | `css/`, `fonts/font-awesome/scss/`, `includes/` | M |
| Q4 | niedrig | **Inline-Styles:** 22 Vorkommen in 9 Dateien (`about` 7, `privacy` 5, `projects/master` 3, `youtube_video.php` 2, …) trotz Projektregel „kein Inline-CSS“; die Honeypot-Ausnahme ist dokumentiert. `about/index.php:61` hat zwei `style`-Attribute am selben Element. | `**/*.php` | S |
| Q5 | niedrig | **Hartkodierte Werte:** Domain `https://www.lisa-yashodhara-haller.de` an 27 Stellen, Pfade `/img/…` (falsch), Includes über `$_SERVER['DOCUMENT_ROOT']` (funktioniert nur bei Docroot = Projektwurzel), gemischt `include` und `require_once`. | `includes/header.php:41,47,56,67`, `**/index.php` | S |
| Q6 | niedrig | **`.env.example` wird von `.env.*` ausgeschlossen**, die Vorlage fehlt im Repo, obwohl die README darauf verweist. Reste für nicht mehr vorhandene `login/login.php` in `.gitignore`. | `.gitignore`, `README.md` | S |
| Q7 | niedrig | **Breadcrumb:** Beschriftung wird aus dem Ordnernamen gebildet (`ucfirst('talks-and-workshops')` → „Talks-and-workshops“), `rtrim` mit Zeichenmaske statt Zeichenkette (funktioniert nur zufällig), auf der Kontaktseite fehlt der Breadcrumb. | `components/breadcrumb.php:19,24`, `contact/index.php` | S |
| Q8 | niedrig | **Dateinamen mit Sonderzeichen** in `downloads/`: `Haller_Kapital-Staat-Geschlecht-1.pdf.pdf.pdf`, `siö_216_1-2022_web.pdf` (Umlaut), Dateien mit Komma/Plus. Machen Links und Deploy anfällig. | `downloads/` | S |

---

## Empfohlene Reihenfolge

1. **Schnell und mit großer Wirkung (je unter 1 Std.):** S1 (Dateien auf dem Server löschen, `.htaccess`-Sperre für `*.md`, `*.mjs`, `router.php`), H1 (HTML nicht 30 Tage cachen, Kontaktseite `no-store`), H2 (www-Weiterleitung), H3 (Vorschaubild-Pfade), H6 (robots-Sperren entfernen), P2 (Versionsnummern für CSS/JS).
2. **Danach:** P1/P3 (CSS bündeln, ungenutzte Bibliotheken und Icons entfernen), P6, A2–A5, K1 (`llms.txt`), J1, H4/H5/H7–H11.
3. **Aufräumen:** Q1–Q8, S2–S9.

Nichts davon wurde umgesetzt. Sag mir, welche Gruppe ich als Nächstes angehen soll.
