# Gesamtliste offener Punkte (lisa-yashodhara-haller.de)

Alle offenen To-dos, Fehler, Auffälligkeiten, Rückfragen und Wartepunkte. Erledigtes durchstreichen (`~~…~~`) mit Datum + Ergebnis, nicht löschen.
Eintrag: Ort (Datei/Zeile oder URL) · kurze Beschreibung · Status.

## 1. Sofort / live-Fehler
- (leer)

## 2. Wartet auf andere
- (leer)

## 3. Zeitgebunden
- (leer)

## 4. Technik
- `js/theme.js`/Slider · Slick Slider (seit 2017 ohne Pflege) bei nächster Überarbeitung durch Swiper.js ersetzen, ca. 4–6 Std · offen
- `contact/index.php`, `contact/contact.php` · CSRF-Prüfung: CLAUDE.md nennt einmal Sitzung (`session_start()`), einmal Cookie; Code prüfen, Doku angleichen · offen
- ~~`includes/footer.php`, `.htaccess` · prüfen, dass `.env` und `.config/` nicht im Deploy landen~~ · erledigt 24.11.2026: Deploy-Workflows (`.github/workflows/`) laden nur Dateien aus fester Pfadliste hoch; `.env*`, `.config/`, `router.php`, `README.md`, `CLAUDE.md`, `package.json` sind nicht enthalten (Dry-Run geprüft)
- Repo-Root · neues technisches Audit durchführen (Analyse → `docs/SEO-ANALYSE.md`, danach `SEO-TASK-PLAN.md`); letztes Audit war 07.05.2026 · offen

## 5. SEO / Inhalt
- (leer)

## 6. Admin / Betrieb
- `_backup/` · ZIP-Archive vom Server löschen (nur per `.htaccess` gesperrt, gehören nicht ins Webroot) · offen

## 7. Ideen / Entscheidungen
- (leer)
