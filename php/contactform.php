<?php
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
    $subject = "Kerkkamp Aanmeldformulier 2026"; // Set your email subject here
    $headers = "From: " . $emailDeelnemer; // You can set the sender's email here

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
    mail($mailTo, $subject, $txt, $headers);




    $_SESSION['form_submitted'] = true;

    // Redirect to another page
    header("Location: ../html/payment.html");
    exit();
}
?>