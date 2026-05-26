<?php
// Mail-Konfiguration Kontaktformular
define('MAIL_FROM',      'info@example.com'); // MUSS als Postfach auf dem Server existieren
define('MAIL_FROM_NAME', 'Ihr Name');
define('MAIL_SENDTO',    'empfaenger@example.com');
define('MAIL_BCC',       ''); // leer lassen wenn kein BCC gewünscht

// Honeypot-Feldnamen – eigene, unvorhersehbare Namen wählen
define('HP_WEBSITE',       'your_fieldname_1');
define('HP_EMAIL_CONFIRM', 'your_fieldname_2');
define('HP_TERMS',         'your_fieldname_3');
