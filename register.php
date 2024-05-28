<?php
require 'db.php';

session_start();

if (!empty($_SESSION['id'])) {
    header("Location: empDashboard.php");
    exit();
}

if (isset($_POST["submit"])) {
    $empId = $_POST['empId'];
    $email = $_POST['email'];
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

    $duplicate = mysqli_query($conn, "SELECT * FROM form WHERE empId = '$empId' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('EmpId or Email already taken');</script>";
    } elseif (empty($empId) || empty($email)) {
        echo "<script>alert('Please enter all required fields');</script>";
    } else {
        if ($password === $confirmpassword) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Adjust the query to match the column names and number of values
            $query = "INSERT INTO form (empId, email, password, fName, mName, lName, sName, company, manager, department, position) VALUES ('$empId', '$email', '$hashed_password', '$fName', '$mName', '$lName', '$sName', '$company', '$manager', '$department', '$position')";
            mysqli_query($conn, $query);

            // Set session variables
            $_SESSION['empId'] = $empId;
            $_SESSION['email'] = $email;
            $_SESSION['fName'] = $fName;
            $_SESSION['mName'] = $mName;
            $_SESSION['lName'] = $lName;
            $_SESSION['sName'] = $sName;
            $_SESSION['company'] = $company;
            $_SESSION['manager'] = $manager;
            $_SESSION['department'] = $department;
            $_SESSION['position'] = $position;

            // Redirect to dashboard or wherever needed
            echo "<script>alert('Registration successful!');</script>";
            echo "<script>window.location.href = 'empDashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Passwords do not match');</script>";
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
        <form action="register.php" method="post" class="register-form">
            <div class="input-box">
                <label>Employee ID</label>
                <input type="text" placeholder="e.g SB123" name="empId" oninput="this.value = this.value.toUpperCase()" required />
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" placeholder="e.g juandelacruz@gmail.com" name="email" required />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="*********" name="password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" placeholder="*********" name="confirmpassword" required />
            </div>
            <div class="input-box">
                <label>First Name</label>
                <input type="text" placeholder="e.g Juan" name="fName" oninput="this.value = this.value.toUpperCase()" required />
            </div>
            <div class="input-box">
                <label>Middle Initial</label>
                <input type="text" placeholder="e.g A." name="mName" oninput="this.value = this.value.toUpperCase()" required />
            </div>
            <div class="input-box">
                <label>Last Name</label>
                <input type="text" placeholder="e.g Delacruz" name="lName" oninput="this.value = this.value.toUpperCase()" required />
            </div>
            <div class="input-box">
                <label>Suffix</label>
                <input type="text" placeholder="e.g Jr." name="sName" oninput="this.value = this.value.toUpperCase()" />
            </div>
            <div class="group-select-box">
                <div>
                    <label>Select Groups</label>
                </div>
                <select name="company" required>
                  <option hidden>Company</option>
                  <option value="JAM Seafoods Inc.">JAM Seafoods Inc.</option>
                  <option value="Smart Basket">Smart Basket</option>
                  <option value="ANYHOW">ANYHOW</option>
                </select>
            </div>
            <div class="group-select-box">
                <div>
                    <label>Select Supervisor / Manager</label>
                </div>
                <select name="manager" required>
                  <option hidden>Select Manager</option>
                  <option value="Sammy Garcia">Sammy Garcia</option>
                  <option value="Jimmy Castante">Jimmy Castante</option>
                  <option value="Adrian">Adrian</option>
                  <option value="Mai">Mai</option>
                  <option value="Kieth">Kieth</option>
                  <option value="Vergilio Cordero">Vergilio Cordero</option>
                  <option value="Rolls">Rolls</option>
                </select>
            </div>
            <div class="group-select-box">
                <div>
                    <label>Select Department</label>
                </div>
                <select name="department" required>
                    <option hidden>Select Department</option>
                    <option value="Supply Chain Management">Supply Chain Management</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Operations">Operations</option>
                </select>
            </div>
            <div class="input-box">
                <label>Position</label>
                <input type="text" placeholder="e.g Admin" name="position" oninput="this.value = this.value.toUpperCase()" required />
            </div>
            <div class="sub-can-btn">
                <input type="submit" class="submit-btn" name="submit" value="submit">
            </div>
        </form>
        <div class="already-container">
            <p>Already have an Account</p>
            <a class="signup" href="login.php">Login here!</a>
        </div>
    </section>
</body>
</html>
