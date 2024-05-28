<?php
require 'db.php';
require 'vendor/autoload.php'; // Include PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["reset-request-submit"])) {
    $email = $_POST["email"];
    
    // Check if email exists in the database
    $result = mysqli_query($conn, "SELECT * FROM form WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $token = bin2hex(random_bytes(32));
        $url = "http://yourdomain.com/reset-password.php?token=$token";

        // Save token in database with expiration date
        $expires = date("U") + 1800; // Token expires in 30 minutes
        $query = "UPDATE form SET token='$token', expires='$expires' WHERE email='$email'";
        mysqli_query($conn, $query);

        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com'; // SMTP username
            $mail->Password = 'your_email_password'; // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('your_email@gmail.com', 'Your Name');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset your password';
            $mail->Body    = '<p>We received a password reset request. The link to reset your password is below. ';
            $mail->Body   .= 'If you did not make this request, you can ignore this email</p>';
            $mail->Body   .= '<p>Here is your password reset link: </br>';
            $mail->Body   .= '<a href="' . $url . '">' . $url . '</a></p>';

            $mail->send();
            echo "<script>alert('Check your email for the password reset link.');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email address.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <form action="forgot-password.php" class="background-login" method="post">
            <div class="login-header">
                <h1>Forgot Password</h1>
            </div>

            <div class="user-container">
                <label>Enter Your Email</label>
                <input type="email" name="email" placeholder="Enter your Email" required>
            </div>

            <div class="login-btn-con">
                <input type="submit" class="login-btn" name="reset-request-submit" value="Request Password Reset">
            </div>
        </form>
    </div>
</body>
</html>
