<?php
require __DIR__ . '/../.config/private.php';
$fromEmail = MAIL_FROM;
$fromName  = MAIL_FROM_NAME;
$sendTo    = MAIL_SENDTO;
$bcc       = MAIL_BCC;

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

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

function rateLimit(string $key, int $limit, int $seconds): bool
{
    $dir = sys_get_temp_dir() . '/contact-rate-limit';

    if (!is_dir($dir)) {
        mkdir($dir, 0700, true);
    }

    $file = $dir . '/' . hash('sha256', $key) . '.json';
    $now = time();

    $data = ['start' => $now, 'count' => 0];

    if (is_file($file)) {
        $stored = json_decode((string) file_get_contents($file), true);

        if (is_array($stored)) {
            $data = $stored;
        }
    }

    if (($now - (int) $data['start']) > $seconds) {
        $data = ['start' => $now, 'count' => 0];
    }

    $data['count']++;

    file_put_contents($file, json_encode($data), LOCK_EX);

    return $data['count'] <= $limit;
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || count($_POST) === 0) {
        throw new \Exception('Form is empty');
    }

    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

    if (!rateLimit('contact:' . $ip, 5, 3600)) {
        throw new \Exception('Rate limit exceeded');
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

    // Honeypots: unsichtbare Felder – Bots füllen sie aus, Menschen nicht
    if (!empty($_POST[HP_WEBSITE] ?? '')) {
        $isHuman = false;
    }
    if (!empty($_POST[HP_EMAIL_CONFIRM] ?? '')) {
        $isHuman = false;
    }
    if (!empty($_POST[HP_TERMS] ?? '')) {
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
        if ($senderName === '' || strlen($senderName) > 120) {
            throw new \Exception('Invalid name');
        }

        if ($senderEmail === '' || !filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email');
        }

        $senderEmail = str_replace(["\r", "\n"], '', $senderEmail);

        if ($message === '' || strlen($message) < 20 || strlen($message) > 5000) {
            throw new \Exception('Invalid message');
        }

        $emailText = "Neue Nachricht von lisa-yashodhara-haller.de\n";
        $emailText .= "=============================\n\n";
        $emailText .= "Name: " . strip_tags($senderName) . "\n\n";
        $emailText .= "E-Mail: " . strip_tags($senderEmail) . "\n\n";
        $emailText .= "Nachricht:\n" . strip_tags($message) . "\n\n";

        $headers = [
            'Content-Type: text/plain; charset="UTF-8"',
            'From: ' . $fromEnc . ' <' . $fromEmail . '>',
            'Reply-To: ' . $senderEmail,
        ];

        if ($bcc !== '') {
            $headers[] = 'Bcc: ' . $bcc;
        }

        $sent = mail(
            $sendTo,
            'Neue Mitteilung von lisa-yashodhara-haller.de',
            $emailText,
            implode("\r\n", $headers)
        );

        if (!$sent) {
            error_log('Contact form mail() failed');
            throw new \Exception('Mail sending failed');
        }

        // Bestätigungsmail an den Absender
        $confirmText =
            "Sehr geehrte/r $senderName,\n\n" .
            "vielen Dank für Ihre Nachricht. Ich habe Ihre Anfrage erhalten und werde mich zeitnah bei Ihnen melden.\n\n" .
            "Mit freundlichen Grüßen\n" .
            "Prof. Dr. Lisa Yashodhara Haller\n" .
            "https://www.lisa-yashodhara-haller.de";
        $confirmHeaders = [
            'Content-Type: text/plain; charset="UTF-8"',
            'From: ' . $fromEnc . ' <' . $fromEmail . '>',
            'Reply-To: ' . $fromEmail,
        ];
        @mail($senderEmail, 'Ihre Nachricht an Lisa Yashodhara Haller', $confirmText, implode("\r\n", $confirmHeaders));
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
