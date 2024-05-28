<?php
// Include the database connection file
include('db.php');

if(isset($_POST['submit'])) {
    // Get the email from the form
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM form WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Update the user's record with the OTP
        $update_query = "UPDATE form SET otp = '$otp' WHERE email = '$email'";
        mysqli_query($connection, $update_query);

        // Send OTP to the user's email
        $to = $email;
        $subject = 'Forgot Password OTP';
        $message = 'Your OTP is: ' . $otp;
        $headers = 'From: your_email@example.com';

        // Send mail using Nodemailer or PHP's mail() function
        // For this example, we'll use PHP's mail() function
        mail($to, $subject, $message, $headers);

        // Redirect to OTP verification page
        header("Location: otp_verification.php");
        exit();
    } else {
        echo "Email not found!";
    }
}
?>
