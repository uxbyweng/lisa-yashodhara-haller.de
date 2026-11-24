
**Anlass:** 500 Spam-Mails über das Kontaktformular.

| Schicht | Implementierung | Datei |
|---|---|---|
| Rate-Limit | Max. 5 Absendungen pro IP pro Stunde, dateibasiert in `sys_get_temp_dir()` | `contact/contact.php` |
| CSRF-Token | Token + Hidden-Field, `hash_equals()` (Sitzung vs. Cookie: **prüfen**, siehe Gesamtliste) | `contact/index.php`, `contact/contact.php` |
| Honeypot 1–3 | Unsichtbares Textfeld (`HP_WEBSITE`), E-Mail-Feld (`HP_EMAIL_CONFIRM`), Checkbox (`HP_TERMS`) | `contact/index.php` |
| URL-Filter | `preg_match('/\bhttps?:\/\/\S+/i', $message)` | `contact/contact.php` |
| Mindestlänge | Mindestens 3 Wörter, 20–5000 Zeichen | `contact/contact.php` |
| Eingabevalidierung | Name max. 120 Z., E-Mail via `filter_var`, Newlines entfernt | `contact/contact.php` |
| Datenschutz-Checkbox | Pflichtfeld `privacy` | `contact/index.php` |
| Fake-Success | Bots bekommen dieselbe Erfolgsmeldung | `contact/contact.php` |
| Bestätigungsmail | Nur wenn alle Schichten bestanden (kein Relay-Risiko) | `contact/contact.php` |

- **Konfiguration:** `.config/private.php` (gitignored, **auf dem Server von Hand pflegen**) enthält `MAIL_FROM`, `MAIL_FROM_NAME`, `MAIL_SENDTO`, `MAIL_BCC` und die Honeypot-Feldnamen `HP_WEBSITE`, `HP_EMAIL_CONFIRM`, `HP_TERMS`. Vorlage: `.config/private.example.php` (im Repo, Platzhalter). Die echten Feldnamen stehen bewusst nur dort, damit sie aus dem öffentlichen Repo nicht ablesbar sind.
- **Honeypot-Versteck:** Die Inputs stehen in einem `<div aria-hidden="true" style="position:absolute;left:-9999px;top:-9999px;">`. Der Inline-Style ist **bewusste Ausnahme** von der Regel „kein Inline-CSS“.
- **`.htaccess`:** gesperrt sind `.config/` (404), `.env*`, `.git`, `composer.json`, `package.json` u. ä.
- **Bekannte Konsolen-Warnung (kein Bug):** `Unchecked runtime.lastError: Could not establish connection. Receiving end does not exist.` kommt von einer Browser-Extension, nicht von der Seite.
