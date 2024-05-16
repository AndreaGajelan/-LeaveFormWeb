<?php 
require 'db.php';

if (!empty($_SESSION['id'])) {
    header("Location: empDashboard.php");
}

if (isset($_POST['submit'])) {
    $dateToday = $_POST['dateToday'];
    $empId = $_POST['empId'];
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $lName = $_POST['lName'];
    $sName = $_POST['sName'];
    $company = $_POST['company'];
    $manager = $_POST['manager'];
    $dept = $_POST['dept'];
    $position = $_POST['position'];
    $absenceType = $_POST['absenceType'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $pay = $_POST['pay'];
    $leaveType = $_POST['leaveType'];
    $otherLeaveType = $_POST['otherLeaveType'];
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);
    $reason = $_POST['reason'];
    $daysToHrs = $_POST['dayToHrs'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'leave-db';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    // LEAVE TYPE N/A
    $naLeaveTypes = ['Vacation Leave', 'Paternity Leave', 'Bereavement Leave', 'Sick Leave', 'Parental Leave'];
    
    if (in_array($leaveType, $naLeaveTypes)) {
        $otherLeaveType = 'NA'; 
    }

    // TOTAL HOURS BETWEEN START AND END DATE
    $interval = $startDate->diff($endDate);
    $dayToHrs = $interval->days * 8 + $interval->h;

    $startDateFormatted = $startDate->format('Y-m-d H:i:s');
    $endDateFormatted = $endDate->format('Y-m-d H:i:s');

    $sql = "INSERT INTO leavetable (dateToday, empId, fName, mName, lName, sName, company, manager, dept, position, absenceType, startTime, endTime, pay, leaveType, otherLeaveType, startDate, endDate, reason, dayToHrs) 
            VALUES ('$dateToday','$empId','$fName', '$mName','$lName','$sName','$company','$manager','$dept','$position','$absenceType','$startTime','$endTime','$pay','$leaveType','$otherLeaveType','$startDateFormatted','$endDateFormatted','$reason','$dayToHrs')";

    if (mysqli_query($conn, $sql)) {
        echo "Code reaches this point"; // Add this line
        echo "<script>alert ('Registration Succesfulssssss'); </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>