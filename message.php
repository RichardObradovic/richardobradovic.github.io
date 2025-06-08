<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "richardobradovic@gmail.com";
        $subject = "Portfolio Contact Form Message";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<h3>Message sent successfully. Thank you!</h3>";
        } else {
            echo "<h3>Failed to send message. Please try again later.</h3>";
        }
    } else {
        echo "<h3>All fields are required.</h3>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
