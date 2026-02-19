<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "paletteproductiondevelopers@gmail.com";

    // Form Data
    $name    = $_POST['name'] ?? '';
    $service = $_POST['service'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $date    = $_POST['date'] ?? '';
    $session = $_POST['session'] ?? '';
    $time    = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';

    // Subject
    $subject = "New Appointment Request - CNS Hospital";

    // Body
    $body  = "New Appointment Request\n\n";
    $body .= "Name: $name\n";
    $body .= "Service: $service\n";
    $body .= "Phone: $phone\n";
    $body .= "Date: $date\n";
    $body .= "Session: $session\n";
    $body .= "Time: $time\n";
    $body .= "Message: $message\n";

    // Headers
    $headers  = "From: CNS Website <no-reply@cnsneurohospital.com>\r\n";
    $headers .= "Reply-To: paletteproductiondevelopers@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send Mail
    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Appointment Sent Successfully";
    } else {
        echo "❌ Mail Failed";
    }

} else {
    echo "Invalid Request";
}
?>
