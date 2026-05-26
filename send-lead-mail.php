<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile_number']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['email_subject']) ?: 'New Lead Submission from auralius Website';

    // Email configuration
    $to = "jasmeet.digitalstep360@gmail.com";
    $email_subject = $subject;
    $email_body = "
    <html>
        <head>
            <title>New Form Submission</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    background-color: #f9f9f9;
                    padding: 20px;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #e0e0e0;
                    border-radius: 10px;
                    background-color: #fff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                h2 {
                    color: #0d567b;
                    border-bottom: 2px solid #f4d400;
                    padding-bottom: 10px;
                }
                p {
                    font-size: 16px;
                    margin-bottom: 15px;
                }
            </style>
        </head>
        <body>
        <div class='container'>
            <h2>Form Details: </h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Source:</strong> https://investoexpress.in/auralius/</p>
        </div>
        </body>
        </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@investoexpress.in" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page
        header('Location: thankyou.html');
    } else {
        echo "Error: Unable to send email.";
    }
} else {
    echo "Invalid request.";
}
?>