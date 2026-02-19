<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ==========================
    // Form Data
    // ==========================
    $to = "cnsneurohospital@gmail.com";

    $from     = $_POST['email'] ?? '';
    $name     = $_POST['name'] ?? '';
    $csubject = $_POST['subject'] ?? '';
    $cmessage = $_POST['message'] ?? '';

    // ==========================
    // Headers
    // ==========================
    $headers  = "From: CNS Website <no-reply@cnsneurohospital.com>\r\n";
    $headers .= "Reply-To: ".$from."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // ==========================
    // Subject
    // ==========================
    $email_subject = "New Contact Form Message - CNS Hospital";

    // ==========================
    // Body
    // ==========================
    $body  = "<html><body>";
    $body .= "<div style='border:1px solid #eee;padding:20px;font-family:Arial,sans-serif;'>";
    $body .= "<h2>New Message from Contact Form</h2>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$from}</p>";
    $body .= "<p><strong>Subject:</strong> {$csubject}</p>";
    $body .= "<p><strong>Message:</strong><br>".nl2br($cmessage)."</p>";
    $body .= "</div>";
    $body .= "</body></html>";

    // ==========================
    // Send Mail
    // ==========================
    if(mail($to,$email_subject,$body,$headers)){
        echo "✅ Message Sent Successfully";
    } else {
        echo "❌ Mail Failed";
    }

} else {
    echo "Invalid Request";
}
?>