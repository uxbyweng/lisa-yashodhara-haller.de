# CLAUDE.md

## Regeln für dieses Projekt

- Standardmäßig nur lesen und Änderungen als Diff vorschlagen. Dateien direkt ändern nur auf ausdrücklichen Auftrag des Nutzers. Nichts ausführen, außer der Nutzer gibt es ausdrücklich frei.
- Keine Shell-Befehle, keine Installationen, kein Build, kein Deploy, keine Netzwerkzugriffe ohne Freigabe.
- Falls ein Befehl nötig scheint: exakten Befehl zeigen, Zweck, Nebenwirkungen, betroffene Dateien und Netzwerkzugriffe nennen, dann auf Freigabe warten.
- Keine Dateien außerhalb dieses Repos anfassen.
- Bei Unsicherheit: fragen, nicht raten.
- Pro Ticket/Aufgabe nur das ändern, was im jeweiligen Ticket steht.
- Diese Regeln sind Anweisungen, keine technische Sperre – sie ersetzen nicht die Berechtigungseinstellungen von Claude Code.
- Commits nie selbst `git commit`/`git push` ausführen, das macht der Nutzer. Nach jeder abgeschlossenen Änderung von sich aus eine kurze, einzeilige Commit-Message vorschlagen (kein Body, keine Aufzählung). **Commit-Messages immer auf Englisch**, auch wenn Chat, Dateien und Seitentexte Deutsch sind. Vor dem Senden prüfen: Ist die Message selbst englisch?
- Offene Punkte gehören in die Gesamtliste `docs/todo-gesamtliste.md`. Alle offenen To-dos, gefundenen Fehler, Issues, Auffälligkeiten, Rückfragen und Wartepunkte (auch Kleinigkeiten und Dinge, die nur „nebenbei“ auffallen oder auf andere warten) werden sofort dort eingetragen, damit nichts in Vergessenheit gerät (Abschnitt passend wählen: 1 Sofort/live-Fehler, 2 wartet auf andere, 3 zeitgebunden, 4 Technik, 5 SEO/Inhalt, 6 Admin/Betrieb, 7 Ideen/Entscheidungen). Eintrag mit Ort (Datei/Zeile oder URL), kurzer Beschreibung und Status. Beim Erledigen den Eintrag durchstreichen (`~~…~~`) und mit Datum + Ergebnis versehen (nicht löschen). Vor „Was ist noch offen?“-Antworten zuerst diese Datei lesen.
- Statuszeile: In Claude Code immer eine Statuszeile mit dem Nutzungslimit sehen (`statusLine` in den Claude-Code-Einstellungen, liegt außerhalb des Repos). Wird sie weggeräumt, überschrieben oder fehlt sie auf einem anderen Rechner, nicht abschalten, sondern auf Nachfrage wieder einrichten (Agent `statusline-setup`, Freigabe für die Datei außerhalb des Repos einholen).

## Projekt

Website von Prof. Dr. Lisa Yashodhara Haller – einsprachige (`de`) PHP-Website mit Bootstrap 5, Vanilla JS und jQuery, modularen Includes (`includes/`, `components/`) und Deployment per GitHub Actions + SFTP (Details im Abschnitt „Deployment“).

**Live:** https://www.lisa-yashodhara-haller.de/
**Repo:** https://github.com/uxbyweng/lisa-yashodhara-haller.de
**Interne Ablage:** `docs/` (gitignored, nicht im Deploy; enthält `todo-gesamtliste.md`, die einzige Liste offener Punkte inkl. Ergebnissen des technischen Audits vom 24.11.2026)

## Lokale Entwicklung

```bash
php -S localhost:8000 router.php
```

## Deployment

- Push auf `main` startet automatisch zwei Workflows in `.github/workflows/`: `deploy.yml` (Code) und `media-deploy.yml` (`images/`, `downloads/`, `media/`). Sie laden nur geänderte Dateien per SFTP hoch.
- Hochgeladen wird nur, was in den `paths`-Listen der Workflows steht. **Nie deployed:** `.config/`, `.env*`, `router.php`, `README.md`, `CLAUDE.md`, `package.json`, `docs/`.
- `.config/private.php` und `.env` werden auf dem Server **von Hand** gepflegt (gitignored).
- Neue Top-Level-Ordner oder -Dateien müssen in `deploy.yml` (zweimal: `on.push.paths` und `PATHS=( … )`) ergänzt werden, sonst werden sie nicht hochgeladen.
- Cache-Busting: CSS/JS werden über `asset()` (`includes/header.php`) mit `?v=<Änderungszeit>` eingebunden (1 Jahr Cache). Neue eigene CSS-/JS-Dateien ebenfalls so einbinden.
- Mehr in `README.md`, Abschnitt „Deployment“.

## Pflege-Workflow: Sitemap und llms.txt

- **`sitemap.xml`** wird manuell gepflegt (kein Generator im Repo). Bei jeder inhaltlichen Änderung an einer Seite den `<lastmod>` der betroffenen URL auf das aktuelle Datum setzen (`YYYY-MM-DD`). Diskrepanzen zwischen Seiten-Code und Sitemap fallen sonst nicht automatisch auf. Stand: alle Einträge noch auf 2024-02-11 (siehe Todo-Liste).
- **Neue Seite:** eigenen `<url>`-Eintrag in `sitemap.xml` ergänzen. URLs immer mit `www` und abschließendem Schrägstrich.
- **Seite entfernt, dauerhaft weitergeleitet (301) oder auf `noindex` gesetzt:** zugehörigen `<url>`-Eintrag aus `sitemap.xml` entfernen.
- **`llms.txt`:** existiert noch nicht (siehe Todo-Liste). Sobald angelegt, gilt: neue Hauptseite, umbenannte URL, entfernte Seite oder geänderte Seitenthemen = Eintrag in `llms.txt` im selben Arbeitsschritt wie die Sitemap ergänzen, ändern oder entfernen. Eine veraltete `llms.txt` führt Agenten auf tote oder falsche Seiten.

## Regeln für jede Seite (Checkliste vor Livegang)

1. **Antwort im ersten HTML.** Aller Inhalt steht serverseitig im ausgelieferten HTML. Nie Inhalt per JavaScript nachladen oder injizieren, nie hinter Tabs/Karten nur per JS einhängen. Agenten lesen Text, keine `<script>`-Blöcke und keine Bilder. Auch Links sind echte `<a href>`, nie `onclick`-Elemente.
2. **Echte Statuscodes.** Fehlende Seite = **404** (nie 200 mit „Seite nicht gefunden“-Text), verschobene/entfernte Seite = **301** auf den Ersatz, `noindex`-Entwürfe bleiben 200.
3. **Maschinenlesbare Ressourcen verlinken.** `sitemap.xml` steht in `robots.txt`. Eine `llms.txt` (sobald angelegt) wird aus dem `<head>` (`<link rel="alternate" type="text/markdown" …>`) oder dem Footer verlinkt.
4. **Seitenkopf:** jede Seite setzt `$metaTitle` und `$metaDesc` (nicht leer) vor dem Einbinden von `includes/header.php`, genau eine `<h1>`, `<main>` kommt aus Header/Footer. Ein eigenes Vorschaubild optional über `$ogImg` (absolute URL).
5. **Kein Inline-CSS und keine Inline-Event-Handler** (`style="…"`, `onclick=…`). Einzige bewusste Ausnahme: Honeypot-Versteck im Kontaktformular (siehe unten).
6. **Bilder:** `alt`-Text sowie `width`/`height` setzen, nach Möglichkeit WebP (mit `<picture>`), Bilder unterhalb des sichtbaren Bereichs `loading="lazy"`.

## Kontaktformular: Spam-Schutz

**Anlass:** 500 Spam-Mails über das Kontaktformular.

| Schicht | Implementierung | Datei |
|---|---|---|
| Rate-Limit | Max. 5 Absendungen pro IP pro Stunde, dateibasiert in `sys_get_temp_dir()` | `contact/contact.php` |
| CSRF-Token | Token als Hidden-Field und als Cookie (Double-Submit), Prüfung mit `hash_equals()`. **Cookie, keine Sitzung.** | `contact/index.php`, `contact/contact.php` |
| Honeypot 1–3 | Unsichtbares Textfeld (`HP_WEBSITE`), E-Mail-Feld (`HP_EMAIL_CONFIRM`), Checkbox (`HP_TERMS`) | `contact/index.php` |
| URL-Filter | `preg_match('/\bhttps?:\/\/\S+/i', $message)` | `contact/contact.php` |
| Mindestlänge | Mindestens 3 Wörter, 20–5000 Zeichen | `contact/contact.php` |
| Eingabevalidierung | Name max. 120 Z., E-Mail via `filter_var`, Newlines entfernt | `contact/contact.php` |
| Datenschutz-Checkbox | Pflichtfeld `privacy` | `contact/index.php` |
| Fake-Success | Bots bekommen dieselbe Erfolgsmeldung | `contact/contact.php` |
| Bestätigungsmail | Nur wenn alle Schichten bestanden (kein Relay-Risiko) | `contact/contact.php` |

- **Konfiguration:** `.config/private.php` (gitignored, **auf dem Server von Hand pflegen**) enthält `MAIL_FROM`, `MAIL_FROM_NAME`, `MAIL_SENDTO`, `MAIL_BCC` und die Honeypot-Feldnamen `HP_WEBSITE`, `HP_EMAIL_CONFIRM`, `HP_TERMS`. Vorlage: `.config/private.example.php` (im Repo, Platzhalter). Die echten Feldnamen stehen bewusst nur dort, damit sie aus dem öffentlichen Repo nicht ablesbar sind.
- **Honeypot-Versteck:** Die Inputs stehen in einem `<div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;">`. Der Inline-Style ist **bewusste Ausnahme** von der Regel „kein Inline-CSS“.
- **Cache:** Die Kontaktseite sendet `Cache-Control: no-store`, weil sie Token und Cookie setzt. Nicht entfernen.
- **`.htaccess`:** gesperrt sind `.config/` (404), `.env*`, `.git`, `composer.json`, `package.json` u. ä.
- **Bekannte Konsolen-Warnung (kein Bug):** `Unchecked runtime.lastError: Could not establish connection. Receiving end does not exist.` kommt von einer Browser-Extension, nicht von der Seite.
