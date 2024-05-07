<?php 
require 'db.php';
if(isset($_POST["submit"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM form WHERE userName = '$userName'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: empDashboard.php");
        }
        else{
            echo "<script> alert('Wrong Password Register');</script>";
        }
    }
    else{
        echo "<script> alert('User Not Register');</script>";
    }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" class="background-login" method="post"> <!-- added method="post" -->
            <div class="login-header">
                <h1>Login</h1>
            </div>

            <div class="user-container">
                <label>Username</label>
                <input type="text" name="userName" placeholder="Enter your Email" > <!-- added name="username" -->
            </div>
            
            <div class="pass-container">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password"> <!-- added name="password" -->
            </div>

            <div class="login-btn-con">
                <input type="submit" class="login-btn" name="submit"></input>
            </div>

            <div class="signup-container">
                <p>Don't you have and account?</p>
                <a class="signup" href="register.php">Sign Up here!</a>
            </div>
            
    </form>
    </div>
</body>
</html>