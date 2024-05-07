<?php 
require 'db.php';
if(!empty($_SESSION['id'])){
    header("Location: empDashboard.php");
}
if(isset($_POST["submit"])){
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $fullName = $_POST['fullName'];
    $company = $_POST['company'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $duplicate = mysqli_query($conn, "SELECT * FROM form WHERE userName = '$userName'");
    if(mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Password taken');</script>";

    }else{
        if($password == $confirmpassword){
            $query = "INSERT INTO form VALUES('', '$userName', '$password', '$confirmpassword', '$fullName', '$company', '$department', '$position')";
            mysqli_query($conn, $query);
            echo "<script>alert ('Registration Succesful'); </script>";
        }
        else{
            echo "<script>alert ('Password does not match'); </script>";
        }
    }
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <section class="register-container">
        <header class="register">Registration Form </header>
        <form action="register.php" method = "post" class="register-form">
            <div class="input-box">
                <label>Username</label>
                <input type="text" placeholder="e.g juan.delazruz@gmail.com" name="userName" value="" required />
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="*********" name="password" value="" required />
            </div>

            <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" placeholder="*********" name="confirmpassword" value="" required />
            </div>

            <div class="input-box">
                <label>Fullname</label>
                <input type="text" placeholder="e.g Juan Delacruz" name="fullName" value="" required />
            </div>

            <div class="group-select-box">
                <div>
                    <label>Select Groups</label>
                </div>
                <select name="company" value="" required>
                  <option hidden>Company</option>
                  <option>JAM Seafoods Inc.</option>
                  <option>Smart Basket</option>
                  <option>ANYHOW</option>
                </select>
            </div>

            <div class="input-box">
                <label>Deaprtment</label>
                <input type="text" placeholder="e.g supervisor" name="department"  value="" required />
            </div>

            <div class="input-box">
                <label>Position</label>
                <input type="text" placeholder="e.g Admin" name="position" value="" required />
            </div>
            
        
            <div class="sub-can-btn">
                <input type="submit" class="submit-btn" name = "submit" value="submit"></input>
            </div>

        </form>

        <div class="already-container">
                <p>Already have an Account</p>
                <a class="signup" href="login.php">Login here!</a>
            </div>
    </section>
</body>
</html>