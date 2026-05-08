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

- [ ] **DATENSCHUTZ/DSGVO: YouTube-Videos ohne Einwilligung laden externe Ressourcen**
  - Datei: `components/youtube_video.php`
  - Thumbnail lädt von `img.youtube.com`, überträgt IP ohne Consent
  - Fix: Two-Click-Façade implementieren – erst nach Klick + Einwilligung lädt YouTube
  - Datenschutzerklärung: YouTube als Drittanbieter ergänzen
  - Aufwand: 3–4 Std

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

- [ ] **PERFORMANCE: WebP-Bilder werden nicht gecacht (falscher MIME-Typ)**
  - Datei: `.htaccess`, Zeile 186
  - `video/webp` → `image/webp`
  - Aufwand: 2 Min

- [ ] **PERFORMANCE: Cache-Busting via `time()` für Isotope deaktiviert effektiv Caching**
  - Datei: `includes/footer.php`, Zeile 132
  - `?v=" . time()` → `?v=3.0.6` (statische Versionsnummer)
  - Aufwand: 5 Min

- [ ] **PERFORMANCE: Gzip auf bereits komprimierten Binärdateien entfernen**
  - Datei: `.htaccess`, Zeilen 69–73
  - JPG/PNG/WebP sind bereits binär komprimiert – DEFLATE darüber kostet CPU ohne Nutzen
  - Fix: `<FilesMatch>` Block auf `.js` und `.css` beschränken
  - Aufwand: 10 Min

- [ ] **ACCESSIBILITY: ARIA-Labels für Scroll-Button und Social-Links ergänzen**
  - Datei: `includes/footer.php`, Zeilen 105–107 und 14–29
  - Scroll-Button: `aria-label="Zurück nach oben"` hinzufügen
  - Social-Links: `aria-label="LinkedIn-Profil (öffnet in neuem Tab)"` etc., `rel="noopener noreferrer"`
  - Aufwand: 45 Min

- [ ] **CODE-QUALITÄT: Doppelte E-Mail-Assembly-Logik bereinigen**
  - Datei: `js/theme.js`, Zeilen 26–36 (identisch mit `js/email.js`)
  - Fix: Doppelten Block aus `theme.js` entfernen, nur `email.js` behalten
  - Aufwand: 10 Min

- [x] **CODE-QUALITÄT: Auskommentiertes doppeltes Formular entfernt** ✓ 08.05.2026
  - Datei: `contact/index.php`

- [ ] **UX: Submit-Button während AJAX-Request deaktivieren**
  - Datei: `js/theme.js`, Zeilen 111–144
  - Fix: Button bei Submit disablen, nach Antwort wieder enablen, Ladetext anzeigen
  - Aufwand: 30 Min

- [ ] **MONITORING: PHP-Fehler-Logging einrichten**
  - Datei: `contact/contact.php`, Zeile 40
  - `error_reporting(0)` → Fehler in Logdatei schreiben statt ignorieren
  - Fix: `ini_set('display_errors', '0'); ini_set('log_errors', '1');`
  - Aufwand: 15 Min

---

### 🟢 NIEDRIG – Backlog (6 Punkte)

- [ ] **VERALTETES: `<meta http-equiv="X-UA-Compatible" content="IE=edge">` entfernen**
  - Datei: `includes/header.php`, Zeile 32
  - IE seit 2022 abgekündigt, Tag wirkungslos
  - Aufwand: 1 Min

- [ ] **SEO: `meta name="keywords"` entfernen**
  - Datei: `includes/header.php`, Zeile 42 + alle Seiten
  - Google ignoriert Keywords-Meta seit 2009 – unnötiger Wartungsaufwand
  - Aufwand: 30 Min

- [ ] **CODE-QUALITÄT: Inline-CSS aus `header.php` in Stylesheet auslagern**
  - Datei: `includes/header.php`, Zeilen 82–124
  - >40 Zeilen CSS direkt im `<head>`, verhindert Caching
  - Fix: In `css/style.css` verschieben
  - Aufwand: 1 Std

- [ ] **CODE-QUALITÄT: Auskommentierte E-Mail-Adressen aus Kontakt-Handler entfernen**
  - Datei: `contact/contact.php`, Zeilen 7–8, 15
  - Private E-Mail-Adressen im Quellcode
  - Aufwand: 2 Min

- [ ] **CONTENT: `jens/`-Verzeichnis prüfen und bereinigen**
  - Leeres Verzeichnis + `jens.php`-Eintrag in `robots.txt`
  - Fix: Zweck klären, wenn ungenutzt löschen + robots.txt-Eintrag entfernen
  - Aufwand: 10 Min

- [ ] **VERALTETES: Slick Slider mittelfristig ablösen**
  - Kein aktives Maintainer-Projekt seit 2017, keine Sicherheitsupdates
  - Empfehlung: Bei nächster größerer Überarbeitung durch Swiper.js ersetzen
  - Aufwand: 4–6 Std (nur bei geplanter Überarbeitung)

---

## Fortschritts-Übersicht

| Priorität | Gesamt | Erledigt | Offen |
|---|---|---|---|
| 🔴 Kritisch | 4 | 4 | 0 |
| 🟠 Hoch | 7 | 6 | 1 |
| 🟡 Mittel | 8 | 1 | 7 |
| 🟢 Niedrig | 6 | 0 | 6 |
| **Gesamt** | **25** | **11** | **14** |

---

## Arbeitsnotizen

<!-- Hier können laufende Notizen, Entscheidungen und Kontextinfos festgehalten werden -->

- Alle 🔴 kritischen Punkte abgeschlossen (07.05.2026)
- Audit-Datum: 07.05.2026
- Kein Analytics-Tracking auf der Seite (DSGVO-konform by default, solange das so bleibt)
- HTTPS-Weiterleitung ist laut .htaccess-Kommentar serverseitig konfiguriert (nicht im Code)
- `og:image:type` von `image/jpg` → `image/jpeg` behoben (07.05.2026)
- Schema.org `@context` von `http://` → `https://` behoben (07.05.2026)
