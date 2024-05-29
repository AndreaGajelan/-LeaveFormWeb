<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $pay = $_POST['pay'];
    $remarks = $_POST['remarks'];

    // Update remarks to 'N/A' if the status is 'approve'
    if ($status == 'Approved') {
        $remarks = 'N/A';
    }

    $sql = "UPDATE jcleavetable SET updateStatus = ?, pay = ?, remarks = ? WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $status, $pay, $remarks, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Status updated successfully!'); window.location.href='admin-panel.php'; </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>
