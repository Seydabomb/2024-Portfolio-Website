<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['fname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['question']);

    // Email configuration
    $to = "seyona.creger@gmail.com"; // Sending to my email address
    $subject = "Contact Form Submission: " . $subject;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $body = "<h2>Contact Form Submission</h2>
             <p><strong>Full Name:</strong> {$fullName}</p>
             <p><strong>Email:</strong> {$email}</p>
             <p><strong>Phone:</strong> {$phone}</p>
             <p><strong>Subject:</strong> {$subject}</p>
             <p><strong>Message:</strong><br>{$message}</p>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting me! I will get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
