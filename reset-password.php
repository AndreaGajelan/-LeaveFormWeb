<?php
require 'db.php';

if (isset($_POST["reset-password-submit"])) {
    $token = $_POST["token"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password === $confirm_password) {
        $result = mysqli_query($conn, "SELECT * FROM form WHERE token = '$token' AND expires >= " . date("U"));

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email = $row["email"];

            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password
            mysqli_query($conn, "UPDATE form SET password = '$hashed_password' WHERE email = '$email'");

            // Delete the password reset token
            mysqli_query($conn, "DELETE FROM form WHERE email = '$email'");

            echo "<script>alert('Password has been reset successfully!');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Invalid or expired token');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <form action="reset-password.php" class="background-login" method="post">
            <div class="login-header">
                <h1>Reset Password</h1>
            </div>

            <div class="user-container">
                <label>New Password</label>
                <input type="password" name="new_password" placeholder="Enter your new password" required>
            </div>
            <div class="user-container">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm your new password" required>
            </div>

            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

            <div class="login-btn-con">
                <input type="submit" class="login-btn" name="reset-password-submit" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>
