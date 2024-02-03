// Access the Pay Button globally
var payButton = document.getElementById("payment-button");

// Add event listener to the Submit Button
document.getElementById("submitButton").addEventListener("click", function (e) {
    // Prevent default link behavior (navigate to the URL)
    e.preventDefault();

    // Show the first message to the user
    var confirmation = confirm("Heb je alle velden met je gegevens al ingevuld en op de \n 'Verzend gegevens' knop geklikt? \n\n"
        + "Vergeet hierna niet de 'Ik ben geen robot' reCAPTCHA aan te vinken! \n\n"
        + "Vergeet niet om hierna op de 'Betalen' knop te klikken om te betalen! \n\n"
        + "Klik op 'OK' voor 'JA'. Klik op 'Annuleren' voor 'NEE'."
    );

    // If the user clicks OK, submit the form
    if (confirmation) {
        document.getElementById("form").submit();
        payButton.style.display = "flex"; // Show the pay button after the form is submitted
    } else {
        // If the user clicks Cancel, show a message
        alert("Vul nog even de rest van je gegevens in en klik dan op \n 'Verzend gegevens' en vink vervolgens de 'Ik ben geen robot' reCAPTCHA aan");
    }
});

// Add event listener to the Pay Button
payButton.addEventListener("click", function (e) {
    // Prevent default link behavior (navigate to the URL)
    e.preventDefault();

    // Show the first message to the user
    var confirmation = confirm("Heb je alle velden met je gegevens al ingevuld en op de \n 'Verzend gegevens' knop geklikt? \n\n"
        + "Als je de 'Ik ben geen robot' reCAPTCHA aan hebt gevinkt, dan zijn je gegevens verzonden. \n\n"
        + "Klik op 'OK' voor 'JA'. Klik op 'Annuleren' voor 'NEE'."
    );

    // If the user clicks OK, navigate to the payment link
    if (confirmation) {
        window.location.href = this.href;
    } else {
        // If the user clicks Cancel, show a message
        alert("Vul nog even de rest van je gegevens in en klik dan op \n 'Verzend gegevens' en vink vervolgens de 'Ik ben geen robot' reCAPTCHA aan");
    }
});