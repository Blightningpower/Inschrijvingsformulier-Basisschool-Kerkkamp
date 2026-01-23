<?php
session_start(); // ← TOEVOEGEN

// Toon geen fouten aan bezoeker, wel loggen
error_reporting(E_ALL);
ini_set('display_errors', 0);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $groep = $_POST['Groep'] ?? '';
    $naamDeelnemer = $_POST['naamDeelnemer'] ?? '';
    $naamOuder = $_POST['naamOuder'] ?? '';
    $telefoonDeelnemer = $_POST['telefoonnummerDeelnemer'] ?? '';
    $telefoonOuder = $_POST['telefoonnummerOuder'] ?? '';
    $emailDeelnemer = $_POST['emailDeelnemer'] ?? '';
    $emailOuder = $_POST['emailOuder'] ?? '';
    $iban = $_POST['iBAN'] ?? '';

    // Pas dit aan naar je eigen domein/mailbox (mail-from moet op je hostingdomein staan)
    $from    = 'ginaarmanyous098@outlook.com';
    $mailTo  = 'ginaarmanyous098@outlook.com';
    $subject = 'Kerkkamp Aanmeldformulier 2026';

    $headers  = "From: Kerkkamp <{$from}>\r\n";
    if (!empty($emailOuder)) {
        $headers .= "Reply-To: {$emailOuder}\r\n";
    }
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    // Email content
    $txt =
        "Je hebt een aanmelding ontvangen van {$naamDeelnemer}\n\n" .
        "Groep: {$groep}\n" .
        "Voor- en Achternaam deelnemer: {$naamDeelnemer}\n" .
        "Voor- en Achternaam ouder: {$naamOuder}\n" .
        "Telefoonnummer Deelnemer: {$telefoonDeelnemer}\n" .
        "Telefoonnummer Ouder: {$telefoonOuder}\n" .
        "Email Deelnemer: {$emailDeelnemer}\n" .
        "Email Ouder: {$emailOuder}\n" .
        "IBAN: {$iban}\n";

    // Send email
    $ok = mail($mailTo, $subject, $txt, $headers);

    if (!$ok) {
        error_log('Mail verzenden mislukt via mail()');
        http_response_code(500);
        exit('Er ging iets mis bij het verzenden. Probeer later opnieuw.');
    }

    $_SESSION['form_submitted'] = true;
    header('Location: ../html/payment.html');
    exit();
}
?>