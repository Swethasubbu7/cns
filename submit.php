<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $service = htmlspecialchars($_POST['service']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "paletteproductions22@gmail.com"; // Replace with your email address
    $subject = "New Appointment Request";
    
    $body = "New appointment request:\n\n";
    $body .= "Name: $name\n";
    $body .= "Service: $service\n";
    $body .= "Phone: $phone\n";
    $body .= "Date: $date\n";
    $body .= "Time: $time\n";
    $body .= "Message: $message\n";

    // Additional headers
    $headers = "From: no-reply@example.com"; // Replace with a valid from address

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your request. We will get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
