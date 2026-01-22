<?php
session_start(); // ← TOEVOEGEN

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groep = $_POST['Groep'];
    $naamDeelnemer = $_POST['naamDeelnemer'];
    $naamOuder = $_POST['naamOuder'];
    $telefoonDeelnemer = $_POST['telefoonnummerDeelnemer'];
    $telefoonOuder = $_POST['telefoonnummerOuder'];
    $emailDeelnemer = $_POST['emailDeelnemer'];
    $emailOuder = $_POST['emailOuder'];
    $iban = $_POST['iBAN'];

    // Email configuration
    $mailTo = "ginaarmanyous098@outlook.com";
    $subject = "Kerkkamp Aanmeldformulier 2026";
    $headers = "From: ginaarmanyous098@outlook.com\r\n"; // ← Gebruik vaste e-mailadres
    $headers .= "Reply-To: " . $emailOuder . "\r\n"; // ← Gebruik Reply-To in plaats daarvan
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";

    // Email content
    $txt = "Je hebt een aanmelding ontvangen van " . "\n"
        . $naamDeelnemer . ".\n\n" .
        "Groep: " . "\n"
        . $groep . "\n\n" .
        "Voor- en Achternaam deelnemer: " . "\n"
        . $naamDeelnemer . "\n\n" .
        "Voor- en Achternaam ouder: " . "\n"
        . $naamOuder . "\n\n" .
        "Telefoonnummer Deelnemer: " . "\n"
        . $telefoonDeelnemer . "\n\n" .
        "Telefoonnummer Ouder: " . "\n"
        . $telefoonOuder . "\n\n" .
        "Email Deelnemer: " . "\n"
        . $emailDeelnemer . "\n\n" .
        "Email Ouder: " . "\n"
        . $emailOuder . "\n\n" .
        "IBAN: " . "\n"
        . $iban . "\n\n";

    // CSS for bold styling
    $css = "font-weight: bold;";

    // Send email
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n"; // Set content type to plain text
    $headers .= "Content-Transfer-Encoding: 8bit\r\n"; // Set content transfer encoding
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n"; // Set X-Mailer

    // Send email
    if (mail($mailTo, $subject, $txt, $headers)) {
        $_SESSION['form_submitted'] = true;
        header("Location: ../html/payment.html");
        exit();
    } else {
        echo "Fout: E-mail kon niet verzonden worden. Neem contact op met de administrator.";
    }
}
?>