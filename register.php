<?php
require 'db.php';

if(!empty($_SESSION['id'])){
    header("Location: empDashboard.php");
}

if(isset($_POST["submit"])){
    $empId = $_POST['empId'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $lName = $_POST['lName'];
    $sName = $_POST['sName'];
    $company = $_POST['company'];
    $manager = $_POST['manager'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $duplicate = mysqli_query($conn, "SELECT * FROM form WHERE empId = '$empId'");
    
    $duplicate = mysqli_query($conn, "SELECT * FROM form WHERE empId = '$empId'");

if(mysqli_num_rows($duplicate) > 0) {
    echo "<script>alert('EmpId or Password taken');</script>";
} elseif (!isset($empId)) {
    echo "<script>alert('Please enter a valid Employee ID');</script>";
} else {
        if($password == $confirmpassword){
            // Insert user data into the database
            $query = "INSERT INTO form VALUES('', '$empId', '$password', '$confirmpassword', '$fName', '$mName','$lName','$sName', '$company','$manager', '$department', '$position')";
            mysqli_query($conn, $query);
            
            // Set session variables
            $_SESSION['empId'] = $empId;
            $_SESSION['fName'] = $fName;
            $_SESSION['mName'] = $mName;
            $_SESSION['lName'] = $lName;
            $_SESSION['sName'] = $sName;
            $_SESSION['company'] = $company;
            $_SESSION['manager'] = $manager;
            $_SESSION['department'] = $department;
            $_SESSION['position'] = $position;
            
            // Redirect to dashboard or wherever needed
            header("Location: empDashboard.php");
            exit();
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
                <label>Employee ID</label>
                <input type="text" placeholder="e.g SB123" name="empId" value="" oninput="this.value = this.value.toUpperCase()" required />
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
                <label>First Name</label>
                <input type="text" placeholder="e.g Juan" name="fName" value="" oninput="this.value = this.value.toUpperCase()" required />
            </div>

            <div class="input-box">
                <label>Middle Initial</label>
                <input type="text" placeholder="e.g A." name="mName" value="" oninput="this.value = this.value.toUpperCase()" required />
            </div>

            <div class="input-box">
                <label>Last Name</label>
                <input type="text" placeholder="e.g Delacruz" name="lName" value="" oninput="this.value = this.value.toUpperCase()" required />
            </div>

            <div class="input-box">
                <label>Suffix</label>
                <input type="text" placeholder="e.g Jr." name="sName" value="" oninput="this.value = this.value.toUpperCase()"/>
            </div>
            
            <div class="group-select-box">
                <div>
                    <label>Select Groups</label>
                </div>
                <select name="company" value="" required>
                  <option hidden>Company</option>
                  <option value="JAM Seafoods Inc." >JAM Seafoods Inc.</option>
                  <option value="Smart Basket" >Smart Basket</option>
                  <option value="ANYHOW" >ANYHOW</option>
                </select>
            </div>

            <div class="group-select-box">
                <div>
                    <label>Select Supervisor / Manager</label>
                </div>
                <select name="manager" value="" required>
                  <option hidden>Select Manager</option>
                  <option value="Sammy Garcia" >Sammy Garcia</option>
                  <option value="Jimmy Castante" >Jimmy Castante</option>
                  <option value="Adrian" >Adrian</option>
                  <option value="Mai " >Mai </option>
                  <option value="Kieth" >Kieth </option>
                  <option value="Vergilio Cordero" >Vergilio Cordero</option>
                  <option value="Rolls" >Rolls</option>
                </select>
            </div>

            <div class="group-select-box">
                <div>
                    <label>Select Department</label>
                </div>
                <select name="department" value="" required>
                    <option hidden>Select Department</option>
                    <option value="Supply Chain Management" >Supply Chain Management</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Operations">Operations</option>
                </select>
            </div>

            <div class="input-box">
                <label>Position</label>
                <input type="text" placeholder="e.g Admin" name="position" value="" oninput="this.value = this.value.toUpperCase()" required />
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