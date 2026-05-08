# CLAUDE.md – Projekt: lisa-yashodhara-haller.de

## Projekt-Übersicht

- **Stack:** PHP (kein CMS), Bootstrap 5, jQuery 3.5.1, Vanilla JS
- **Hosting:** Apache mit .htaccess
- **Sprache:** Deutsch (de_DE)
- **Letztes Audit:** 07.05.2026
- **Auditor:** Claude (Sonnet 4.6)

---

## Arbeitsweise

- Nach jedem abgeschlossenen Task: Zusammenfassung + kurze, knackige Commit Message ausgeben

---

## Audit-Checkliste – Priorisierter Maßnahmenplan

Legende: `[ ]` offen · `[x]` erledigt · `[~]` in Arbeit

---

### 🔴 KRITISCH – Sofort handeln (4 Punkte)

- [x] **SICHERHEIT: Hardcodierte Zugangsdaten entfernen** ✓ 07.05.2026
  - Funktion in `includes/auth.php` ausgelagert, Credentials in `.env` (im `.gitignore`)
  - `.htaccess` sperrt HTTP-Zugriff auf `.env*`-Dateien
  - `require_auth()` bleibt für künftige Verzeichnis-Absicherungen nutzbar

- [x] **SICHERHEIT/XSS: Reflected XSS im Kontaktformular beheben** ✓ 07.05.2026
  - Server (`contact/contact.php`): `$senderName` mit `strip_tags()` + `htmlspecialchars()` gesichert
  - Client (`js/theme.js`): Alert-Box per `$('<div>').text()` gebaut statt `.html(alertBox)`

- [x] **DATENSCHUTZ/DSGVO: jQuery CDN auf lokale Einbindung umstellen** ✓ 07.05.2026
  - `includes/footer.php`: Google-CDN-Zeile durch `/vendor/jquery.min.js` ersetzt
  - Hinweis: Version noch 3.5.1 – Update auf 3.7.1 steht als separater 🟠-Punkt offen

- [x] **SICHERHEIT: Backup-Archive vom Webserver sperren** ✓ 07.05.2026
  - `_backup/.htaccess` mit `Require all denied` deployed – HTTP-Zugriff gesperrt
  - Dateien vom Server löschen sobald möglich (ZIP-Archive gehören nicht ins Webroot)

---

### 🟠 HOCH – Diese Woche (7 Punkte)

- [x] **SICHERHEIT: HTTP-Sicherheitsheader ergänzt** ✓ 08.05.2026
  - Datei: `.htaccess`, nach HSTS-Zeile eingefügt
  - Gesetzt: `X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`, `Content-Security-Policy`

- [x] **SICHERHEIT: jQuery 3.5.1 auf 3.7.1 aktualisiert (CVE-2020-11022 + CVE-2020-11023)** ✓ 08.05.2026
  - Betrifft: `vendor/jquery.min.js`
  - Beide CVEs sind XSS-Lücken, direkt relevant wegen `.html()`-Aufruf in `theme.js`
  - Fix: jQuery 3.7.1 heruntergeladen und als `/vendor/jquery.min.js` ersetzt

- [x] **DATENSCHUTZ/DSGVO: YouTube Two-Click-Façade implementiert** ✓ 08.05.2026
  - `components/youtube_video.php`: Kein Thumbnail mehr von `img.youtube.com`, dunkler Platzhalter stattdessen
  - Klick 1: Consent-Overlay erscheint (Text + „Zustimmen & abspielen"-Button)
  - Klick 2: Fancybox öffnet das Video – erst jetzt kontaktiert der Browser YouTube
  - CSS in `css/style.css` ergänzt, JS in `js/theme.js` ergänzt
  - Datenschutzerklärung erwähnt YouTube bereits (Abschnitt 8)

- [x] **SICHERHEIT: CSRF-Schutz im Kontaktformular implementiert** ✓ 08.05.2026
  - `contact/index.php`: `session_start()`, Token via `bin2hex(random_bytes(32))` generiert, als Hidden-Field ausgegeben
  - `contact/contact.php`: `session_start()`, Token mit `hash_equals()` timing-sicher geprüft

- [x] **SEO/SICHERHEIT: og:url von HTTP auf HTTPS korrigiert** ✓ 07.05.2026
  - Datei: `includes/header.php`, Zeile 58
  - Gleichzeitig behoben: `og:image:type` von `image/jpg` → `image/jpeg` (Zeile 63)
  - Gleichzeitig behoben: Schema.org `@context` von `http://` → `https://` (Zeile 68)

- [x] **SEO: Schema.org-Markup korrigiert und erweitert** ✓ 08.05.2026
  - `<html>`-Tag: `itemscope`/`itemtype="productionCompany"` entfernt
  - JSON-LD: `description` und `sameAs` (LinkedIn, ResearchGate, ORCID) ergänzt, leeres `telephone` entfernt

- [x] **CODE-QUALITÄT: `counterUp`-Code entfernt** ✓ 07.05.2026
  - Datei: `js/theme.js`, Zeilen 17–23
  - Toter Code (Plugin nie geladen) entfernt – kein JS-Fehler mehr in der Konsole

---

### 🟡 MITTEL – Diesen Monat (8 Punkte)

- [x] **PERFORMANCE: WebP MIME-Typ korrigiert** ✓ 08.05.2026
  - `.htaccess`: `video/webp` → `image/webp`

- [x] **PERFORMANCE: Cache-Busting `time()` entfernt** ✓ 08.05.2026
  - `includes/footer.php`: `?v=" . time()` → `?v=3.0.6`

- [x] **PERFORMANCE: Gzip auf Binärdateien deaktiviert** ✓ 08.05.2026
  - `.htaccess`: `FilesMatch` auf `.js|css` beschränkt – JPG/PNG/WebP werden nicht mehr nutzlos komprimiert

- [x] **ACCESSIBILITY: ARIA-Labels für Scroll-Button und Social-Links** ✓ 08.05.2026
  - `footer.php`: Scroll-Button `aria-label="Zurück nach oben"`, alle Social-Links mit `aria-label` + `rel="noopener noreferrer"`

- [x] **CODE-QUALITÄT: Doppelte E-Mail-Assembly-Logik bereinigt** ✓ 08.05.2026
  - Duplikat aus `theme.js` entfernt, `email.js` in `footer.php` eingebunden

- [x] **CODE-QUALITÄT: Auskommentiertes doppeltes Formular entfernt** ✓ 08.05.2026
  - Datei: `contact/index.php`

- [x] **UX: Submit-Button während AJAX deaktiviert** ✓ 08.05.2026
  - `theme.js`: Button disabled + „Wird gesendet …" beim Submit, nach Antwort/Fehler wieder aktiv

- [x] **MONITORING: PHP-Fehler-Logging eingerichtet** ✓ 08.05.2026
  - `contact/contact.php`: `error_reporting(E_ALL)`, `display_errors=0`, `log_errors=1`

---

### 🟢 NIEDRIG – Backlog (6 Punkte)

- [x] **VERALTETES: `<meta http-equiv="X-UA-Compatible">` entfernt** ✓ 08.05.2026
  - `includes/header.php`: IE-Tag entfernt

- [ ] **SEO: `meta name="keywords"` entfernen**
  - Datei: `includes/header.php` + alle Seiten
  - Google ignoriert Keywords-Meta seit 2009 – unnötiger Wartungsaufwand
  - Aufwand: 30 Min

- [ ] **CODE-QUALITÄT: Inline-CSS aus `header.php` in Stylesheet auslagern**
  - Datei: `includes/header.php`, Zeilen 82–124
  - >40 Zeilen CSS direkt im `<head>`, verhindert Caching
  - Fix: In `css/style.css` verschieben
  - Aufwand: 1 Std

- [x] **CODE-QUALITÄT: Auskommentierte E-Mail-Adressen entfernt** ✓ 08.05.2026
  - Bereits beim contact.php-Rewrite erledigt

- [x] **CONTENT: `jens/`-Verzeichnis bereinigt** ✓ 08.05.2026
  - Leeres Verzeichnis gelöscht, `Disallow: /jens.php` aus `robots.txt` entfernt

- [ ] **VERALTETES: Slick Slider mittelfristig ablösen**
  - Kein aktives Maintainer-Projekt seit 2017, keine Sicherheitsupdates
  - Empfehlung: Bei nächster größerer Überarbeitung durch Swiper.js ersetzen
  - Aufwand: 4–6 Std (nur bei geplanter Überarbeitung)

---

## Fortschritts-Übersicht

| Priorität | Gesamt | Erledigt | Offen |
|---|---|---|---|
| 🔴 Kritisch | 4 | 4 | 0 |
| 🟠 Hoch | 7 | 7 | 0 |
| 🟡 Mittel | 8 | 8 | 0 |
| 🟢 Niedrig | 6 | 3 | 3 |
| **Gesamt** | **25** | **22** | **3** |

---

## Arbeitsnotizen

<!-- Hier können laufende Notizen, Entscheidungen und Kontextinfos festgehalten werden -->

- Alle 🔴 kritischen Punkte abgeschlossen (07.05.2026)
- Audit-Datum: 07.05.2026
- Kein Analytics-Tracking auf der Seite (DSGVO-konform by default, solange das so bleibt)
- HTTPS-Weiterleitung ist laut .htaccess-Kommentar serverseitig konfiguriert (nicht im Code)
- `og:image:type` von `image/jpg` → `image/jpeg` behoben (07.05.2026)
- Schema.org `@context` von `http://` → `https://` behoben (07.05.2026)
