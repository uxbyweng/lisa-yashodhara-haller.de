<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */

// an email address that will be in the From field of the email.
// $from = 'Lisa Yashodhara Haller <yashodhara@gmx.de>';
// $from = 'Lisa Yashodhara Haller <jens.klinker@gmx.net>';
$from = 'Lisa Yashodhara Haller <info@lisa-yashodhara-haller.de>';

// an email address that will receive the email with the output of the form
$sendTo = 'Lisa Yashodhara Haller <yashodhara@gmx.de>'; // Add Your email here

// an email address that will receive a copy of the email for testing purposes
// $bcc = 'Lisa Yashodhara Haller <jens.klinker@gmx.net>'; 

// subject of the email
$subject = 'Neue Mitteilung von lisa-yashodhara-haller.de';

// form field names and their translations.
// array variable name => Text to appear in the email
// $fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); 
$fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message', 'privacy' => 'Privacy Policy Accepted'); 

// Extrahieren des Namens aus dem POST-Array
$senderName = isset($_POST['name']) ? htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES, 'UTF-8') : "";

// Anpassen der Bestätigungsnachricht, um den Namen des Absenders einzufügen
$okMessage = 'Hallo ' . $senderName . ', vielen Dank für Ihre Nachricht, ich werde mich bald bei Ihnen melden!';

// If something goes wrong, we will display this message.
$errorMessage = 'Beim Absenden des Formulars ist ein Fehler aufgetreten. Bitte versuchen Sie es später noch einmal';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
// error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);
try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');
    
    // Überprüfen, ob die Datenschutzerklärungs-Checkbox aktiviert wurde
    if (!isset($_POST['privacy'])) {
        throw new \Exception('You must accept the privacy policy');
    }
            
    $emailText = "Neue Nachricht von lisa-yashodhara-haller.de \n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from
        // 'Bcc: ' . $bcc
    );
    
    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
