<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email   = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    $to      = "gibransyedgibran@gmail.com";
    $subject = "New message from " . $name;
    $body    = "Name: " . $name . "\n" .
               "Email: " . $email . "\n\n" .
               "Message:\n" . $message;
    $headers = "From: noreply@syedgibran.com\r\n" .
               "Reply-To: " . $email . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: /thankyou/");
        exit;
    } else {
        header("Location: /contact/?error=1");
        exit;
    }
}
?>