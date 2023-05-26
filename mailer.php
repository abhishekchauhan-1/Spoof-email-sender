<?php

// Retrieve values from the form
$to = $_POST['r_email'];  // Recipient's email address
$subject = $_POST['subject'];  // Email subject
$message = $_POST['message'];  // Email message

$sender_name = $_POST['s_name'];  // Sender's name
$sender_email = $_POST['s_email'];  // Sender's email address

$random_hash = md5(date('r', time()));  // Generate a random hash for the email

// Construct the email headers
$headers = "From: " . $sender_name . "<" . $sender_email . ">";  // Sender's name and email address

// Add additional headers for HTML content and the random hash
$headers .= "\r\nContent-Type: text/html; charset=UTF-8; boundary=\"PHP-mixed-".$random_hash."\"";

// Send the email using the mail() function
$mail_sent = mail($to, $subject, $message, $headers);

// Check if the email was sent successfully
if($mail_sent) {
    // If the email was sent successfully, display a success message
    echo "
    <html>
    <head>
        <title>Success : )</title>
    </head>
    <body>
    <script>
        alert(\"Email Sent Successfully!\");
        window.location.replace(\"index.html\");
    </script>
    </body>
    </html>";
} else {
    // If the email failed to send, display an error message
    echo "
    <html>
    <head>
        <title>Failed : (</title>
    </head>
    <body>
    <script>
        alert(\"Failed to Send Email!\");
        window.location.replace(\"index.html\");
    </script>
    </body>
    </html>";
}

?>
