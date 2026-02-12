<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $email_subject = "New Opinion Submitted: $subject";

    $body = "New opinion submitted:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n";
    $body .= "Message: $message\n";

    // Additional headers
    $headers = "From: no-reply@example.com"; // Replace with a valid from address

    // Send email
    if (mail($to, $email_subject, $body, $headers)) {
        echo "Thank you for your opinion. We appreciate your feedback.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
