<?php
// Mail-Konfiguration – Werte in .env hinterlegen
$fromEmail   = getenv('MAIL_FROM')   ?: 'info@lisa-yashodhara-haller.de'; // MUSS als Postfach auf dem Server existieren
$fromName    = 'Lisa Yashodhara Haller';
$sendTo      = getenv('MAIL_SENDTO') ?: 'yashodhara@gmx.de';
$bcc         = getenv('MAIL_BCC')    ?: '';

// MIME-Header-Kodierung (ü/ä/ö im Absendernamen)
$fromEnc = function_exists('mb_encode_mimeheader')
    ? mb_encode_mimeheader($fromName, 'UTF-8', 'B')
    : $fromName;

$fields = ['name' => 'Name', 'email' => 'E-Mail', 'message' => 'Nachricht'];

// Eingaben bereinigen – Newlines verhindern Header-Injection
$senderName  = str_replace(["\r", "\n"], '', trim((string) ($_POST['name']  ?? '')));
$senderEmail = trim((string) ($_POST['email'] ?? ''));

$okMessage    = 'Hallo ' . htmlspecialchars($senderName, ENT_QUOTES, 'UTF-8') . ', vielen Dank für Ihre Nachricht, ich werde mich bald bei Ihnen melden!';
$errorMessage = 'Beim Absenden des Formulars ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal.';

error_reporting(0);
try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || count($_POST) === 0) {
        throw new \Exception('Form is empty');
    }

    // CSRF
    if (
        empty($_POST['csrf_token']) || empty($_COOKIE['csrf_token']) ||
        !hash_equals($_COOKIE['csrf_token'], $_POST['csrf_token'])
    ) {
        throw new \Exception('Invalid CSRF token');
    }

    // Datenschutz-Checkbox
    if (empty($_POST['privacy'])) {
        throw new \Exception('Privacy policy not accepted');
    }

    // Spam-Prüfungen
    $isHuman = true;

    // Honeypot: unsichtbares Feld – Bots füllen es aus, Menschen nicht
    if (!empty($_POST['website'] ?? '')) {
        $isHuman = false;
    }

    $message = trim((string) ($_POST['message'] ?? ''));

    // URL im Nachrichtentext → wahrscheinlich Spam
    if (preg_match('/\bhttps?:\/\/\S+/i', $message)) {
        $isHuman = false;
    }

    // Mindestens 3 Wörter in der Nachricht
    if (count(array_filter(explode(' ', $message), fn($w) => $w !== '')) < 3) {
        $isHuman = false;
    }

    if ($isHuman) {
        $emailText = "Neue Nachricht von lisa-yashodhara-haller.de\n=============================\n\n";
        foreach ($_POST as $key => $value) {
            if (isset($fields[$key])) {
                $emailText .= $fields[$key] . ': ' . strip_tags((string) $value) . "\n\n";
            }
        }

        $headers = [
            'Content-Type: text/plain; charset="UTF-8"',
            'From: '        . $fromEnc . ' <' . $fromEmail . '>',
            'Reply-To: '    . $fromEmail,
            'Return-Path: ' . $fromEmail,
        ];
        if ($bcc !== '') {
            $headers[] = 'Bcc: ' . $bcc;
        }

        @mail($sendTo, 'Neue Mitteilung von lisa-yashodhara-haller.de', $emailText, implode("\n", $headers));

        // Bestätigungsmail an den Absender
        if ($senderEmail !== '' && filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
            $confirmText =
                "Sehr geehrte/r $senderName,\n\n" .
                "vielen Dank für Ihre Nachricht. Ich habe Ihre Anfrage erhalten und werde mich zeitnah bei Ihnen melden.\n\n" .
                "Mit freundlichen Grüßen\n" .
                "Lisa Yashodhara Haller\n" .
                "https://www.lisa-yashodhara-haller.de";
            $confirmHeaders = [
                'Content-Type: text/plain; charset="UTF-8"',
                'From: '        . $fromEnc . ' <' . $fromEmail . '>',
                'Reply-To: '    . $fromEmail,
                'Return-Path: ' . $fromEmail,
            ];
            @mail($senderEmail, 'Ihre Nachricht an Lisa Yashodhara Haller', $confirmText, implode("\n", $confirmHeaders));
        }
    }
    // Bots bekommen dieselbe Erfolgsmeldung – kein Hinweis auf Erkennung

    $responseArray = ['type' => 'success', 'message' => $okMessage];
} catch (\Exception $e) {
    $responseArray = ['type' => 'danger', 'message' => $errorMessage];
}

if (
    !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
) {
    header('Content-Type: application/json');
    echo json_encode($responseArray);
} else {
    echo $responseArray['message'];
}
