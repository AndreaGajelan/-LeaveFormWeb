<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leave Requests</title>
<link rel="stylesheet" href="empDashboard.css">
<link rel="stylesheet" href="search-function.css">
</head>

<header class="header-container">
    <div class="logo">
        <img src="logo.png" alt="Logo">
    </div>
    
    <div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" placeholder="Search by ID..." name="search">
        <button  class="search-btn" type="submit">Search</button>
    </form>
    </div>
    
    <div class="left-navigations">
        <button class="logout-btn"><a href="logout.php">Logout</a></button>
    </div>
</header>

<body>

<?php
require 'db.php';
if (empty($_SESSION["id"])) {
    header("Location: admin-panel.php");
    exit(); // Stop further execution
}

$id = $_SESSION["id"];
$updateStatus = ""; // Initialize $updateStatus

if (isset($_GET['status'])) {
    $updateStatus = $_GET['status'];
}

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = mysqli_real_escape_string($conn, $search);
}

$sql = "SELECT * FROM jcleavetable WHERE updateStatus = 'Pending'";

if (!empty($search)) {
    $sql .= " AND (empId LIKE '%$search%' OR fName LIKE '%$search%' OR mName LIKE '%$search%' OR lName LIKE '%$search%' OR sName LIKE '%$search%' OR company LIKE '%$search%' OR absenceType LIKE '%$search%' OR leaveType LIKE '%$search%' OR startDate LIKE '%$search%' OR endDate LIKE '%$search%' OR dayToHrs LIKE '%$search%' OR pay LIKE '%$search%' OR updateStatus LIKE '%$search%' OR remarks LIKE '%$search%')";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Date Filed</th><th>Emp ID</th><th>Employee</th><th>Company</th><th>Absence</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Total Hours</th><th>Leave Pay</th><th>Update Status</th><th>Remarks</th></tr>";
    while ($row = $result->fetch_assoc()) {
        // Output table rows
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['dateToday']."</td>";
        echo "<td>".$row['empId']."</td>";
        echo "<td>".$row['fName']."</td>";
        echo "<td>".$row['company']."</td>";
        echo "<td>".$row['absenceType']."</td>";
        echo "<td>".$row['leaveType']."</td>";
        echo "<td>".$row['startDate']."</td>";
        echo "<td>".$row['endDate']."</td>";
        echo "<td>".$row['dayToHrs']."</td>";
        echo "<td>".$row['pay']."</td>";
        echo "<td>".$row['updateStatus']."</td>";
        echo "<td>".$row['remarks']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<script> alert('No Results Found.'); window.location.href = 'admin-panel.php';</script>";
}
?>

</body>
</html>