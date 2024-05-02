<?php 
if(isset($_POST['submit'])){
    $dateToday = $_POST['dateToday'];
    $empId = $_POST['empId'];
    $fullName = $_POST['fullName'];
    $company = $_POST['company'];
    $dept = $_POST['dept'];
    $absenceType = $_POST['absenceType'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $pay = $_POST['pay'];
    $leaveType = $_POST['leaveType'];
    $otherLeaveType = $_POST['otherLeaveType'];
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);
    $reason= $_POST['reason'];
    $daysToHrs = $_POST['daysToHrs'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'leave-db';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    //LEAVE TYPE N/A
    $naLeaveTypes = ['Vacation Leave', 'Paternity Leave', 'Bereavement Leave', 'Sick Leave', 'Parental Leave']; 
    
    if (in_array($leaveType, $naLeaveTypes)) {
        $otherLeaveType = 'NA'; 
    }

    // TOTAL HOURS BETWEEN START AND END DATE
    $interval = $startDate->diff($endDate);
    $daysToHrs = $interval->days * 24 + $interval->h;

    //echo "Start Date: " . $_POST['startDate'] . "<br>";
    //echo "End Date: " . $_POST['endDate'] . "<br>";
    //echo "Calculated Hours: " . $daysToHrs . "<br>";

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'leave-db';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    $startDateFormatted = $startDate->format('Y-m-d H:i:s');
    $endDateFormatted = $endDate->format('Y-m-d H:i:s');

    $sql = "INSERT INTO leavetable (dateToday, empId, fullName, company, dept, absenceType, startTime, endTime, pay, leaveType, otherLeaveType, startDate, endDate, reason, daysToHrs) 
            VALUES ('$dateToday','$empId','$fullName','$company','$dept','$absenceType','$startTime','$endTime','$pay','$leaveType','$otherLeaveType','$startDateFormatted','$endDateFormatted','$reason','$daysToHrs')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>