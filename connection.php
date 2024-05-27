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
    $pay = $_POST['pay'];
    $leaveType = $_POST['leaveType'];
    $otherLeaveType = $_POST['otherLeaveType'];
    $reason = $_POST['reason'];
    $remarks = $_POST['remarks']; // Assuming this is also a field in your form

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'leave-db';

    $conn = new mysqli($host, $user, $pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // LEAVE TYPE N/A
    $naLeaveTypes = ['Vacation Leave', 'Paternity Leave', 'Bereavement Leave', 'Sick Leave', 'Parental Leave'];
    if (in_array($leaveType, $naLeaveTypes)) {
        $otherLeaveType = 'NA'; 
    }

    // Format start and end date with time
    $startDateTime = new DateTime($_POST['startDate'] . ' ' . $_POST['startTime']);
    $endDateTime = new DateTime($_POST['endDate'] . ' ' . $_POST['endTime']);

    // Calculate total hours
    $totalHours = 0;

    $currentDate = clone $startDateTime;
    while ($currentDate <= $endDateTime) {
        if ($currentDate->format('N') != 7) { // Exclude Sundays
            if ($currentDate->format('Y-m-d') === $startDateTime->format('Y-m-d')) {
                // First day
                $startOfDay = $startDateTime;
            } else {
                $startOfDay = new DateTime($currentDate->format('Y-m-d') . ' 00:00:00');
            }

            if ($currentDate->format('Y-m-d') === $endDateTime->format('Y-m-d')) {
                // Last day
                $endOfDay = $endDateTime;
            } else {
                $endOfDay = new DateTime($currentDate->format('Y-m-d') . ' 23:59:59');
            }

            // Calculate hours for the current day
            $hoursToAdd = ($endOfDay->getTimestamp() - $startOfDay->getTimestamp()) / 3600;
            $totalHours += min(8, $hoursToAdd);
        }

        // Move to the next day
        $currentDate->modify('+1 day');
    }

    $startDateFormatted = $startDateTime->format('Y-m-d H:i:s');
    $endDateFormatted = $endDateTime->format('Y-m-d H:i:s');

    $updateStatus = "Pending";   
    $pay = "Pending";   
    $remarks = "Pending";    

    $stmt = $conn->prepare("INSERT INTO jcleavetable (dateToday, empId, fName, mName, lName, sName, company, manager, dept, position, absenceType, startTime, endTime, pay, leaveType, otherLeaveType, startDate, endDate, reason, dayToHrs, updateStatus, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssssss", $dateToday, $empId, $fName, $mName, $lName, $sName, $company, $manager, $dept, $position, $absenceType, $startDateFormatted, $endDateFormatted, $pay, $leaveType, $otherLeaveType, $startDateFormatted, $endDateFormatted, $reason, $totalHours, $updateStatus, $remarks);

    if ($stmt->execute()) {
        echo "Code reaches this point";
        echo "<script>alert ('Registration Successful!'); </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
