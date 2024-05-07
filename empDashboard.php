<?php 
require 'db.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query ($conn, "SELECT * FROM form WHERE id = $id");
    $row = mysqli_fetch_assoc($result);


} 

else{
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Header Example</title>
<link rel="stylesheet" href="empDashboard.css">
<link rel="stylesheet" href="create-modal.css">
<link rel="stylesheet" href="emp-leave-form.css">
<script src="modal2.js"></script>
<script src="modal.js"></script>



</head>
<body>

<header class="header-container">
  <div class="logo">
    <img src="logo.png" alt="Logo">
  </div>
  <div class="left-navigations">

    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="viewleave-container">
                <div class="view-header"><p>View Leave History</p></div>
                <div class="close-btn" onclick="togglePopup()">&times;</div>
            </div>
            

            <div class="table2">
                <table class="absence-table2">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee ID</th>
                            <th>Full Name</th>
                            <th>Company</th>
                            <th>Absence</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <tr>
                            <td>2024-04-19</td>
                            <td>123456</td>
                            <td>John Doe</td>
                            <td>ABC Company</td>
                            <td>Vacation</td>
                            <td>Paid Leave</td>
                            <td>2024-04-20</td>
                            <td>2024-04-25</td>
                            <td>09:00 AM</td>
                            <td>05:00 PM</td>
                            <td>Annual vacation</td>
                            <td>Approved</td>
                            <td>No remarks</td>
                        </tr>
            
                        <tr>
                            <td>2024-04-20</td>
                            <td>789012</td>
                            <td>Jane Smith</td>
                            <td>XYZ Corporation</td>
                            <td>Sick Leave</td>
                            <td>Medical Leave</td>
                            <td>2024-04-18</td>
                            <td>2024-04-21</td>
                            <td>08:30 AM</td>
                            <td>04:30 PM</td>
                            <td>Flu</td>
                            <td>Pending</td>
                            <td>Doctor's note submitted</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a onclick="togglePopup()" href="#">Leave History</a>
    <button class="logout-btn"><a href="logout.php">Logout</a></button>
  </div>
</header>
<section class="table-container">

<!-- FOR SEARCH BAR AND CREATE LEAVE REQUEST -->
<div class="part1">
    <div class="search-container">
        <input type="text" name="search" placeholder="Search"/>
    </div>

    
    <div class="popup2" id="popup-2">
        <div class="overlay2"></div>
            <div class="content2">
                <div class="close-btn2" onclick="togglePopup2()">&times;</div>
                <div class="create-header">
                    <h1>Create Leave</h1>
                </div>

                <div class="overall-container">
                    <div class="container">
                        <header class="leave-header">Leave Application Form</header>
                        <form action="connection.php" class="form" method="POST">
                        <!--FILED DATE-->
                        <div class="input-box">
                            <label>Date Today</label>
                            <input name="dateToday" value="dateToday" type="date" placeholder="Enter Date Today" required />
                        </div>
                        <!--EMPLOYEE ID-->
                        <div class="input-box">
                            <label>Employee ID</label>
                            <input name="empId"  type="text" placeholder="Enter Employee ID" required />
                        </div>
                        <!--PRE-FILLED DATA: FULL NAME-->
                        <div class="input-box">
                            <label>Full Name</label>
                            <input name="fullName"  type="text" placeholder="Enter Full Name" required />
                        </div>
                        <!--PRE-FILLED DATA: COMPANY-->
                        <div class="group-select-box">
                            <div>
                                <label>Select Company</label>
                            </div>
                            <select name="company">
                            <option hidden>Select Company</option>
                            <option value="JAM">JAM Seafoods Inc.</option>
                            <option value="SB">Smart Basket</option>
                            <option value="ANYHOW">ANYHOW</option>
                            </select>
                        </div>
                        <!--PRE-FILLED DATA: DEPARTMENT-->
                        <div class="dept-dropdown">
                            <div>
                                <label>Select Department</label>
                            </div>
                            <select name="dept">
                            <option hidden>Select Department</option>
                            <option value="Supply Chain Mgmt">Supply Chain Mgmt</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Operations">Operations</option>
                            </select>
                        </div>
                        <!--LEAVE ABSENCE UNDERTIME OR HALFDAY-->
                        <div>
                            <header class="leave-deatils-header">Leave Details</header>
                        </div>
                        <div class="types-Absence-box">
                            <p class="Absence-header">Select Type of Absence</p>
                            <div class="absence-option">
                            <div class="absence">
                                <input value="wholeday" type="radio" id="check-wholeday" name="absenceType" />
                                <label for="check-wholeday">Whole Day</label>
                            </div>
                            <div class="absence">
                                <input value="halfday" type="radio" id="check-halfday" name="absenceType" />
                                <label for="check-halfday">Halfday</label>
                            </div>
                            <div class="absence">
                                <input value="undertime" type="radio" id="check-undertime" name="absenceType" />
                                <label for="check-undertime">Undertime</label>
                            </div>
                            </div>
                        </div>
                        <!--START & END TIME-->
                        <div class="timeRequest" id="timeRequest">
                            <div class="input-box">
                            <label>Start Time</label>
                            <input name="startTime" value="startTime" type="time" id="startTime" placeholder="Enter Start Time" />
                            </div>
                            <h5 class="until">Until</h5>
                            <div class="input-box">
                            <label>End Time </label>
                            <input name="endTime" value="endTime" type="time" id="endTime" placeholder="Enter End Time" />
                            </div>
                        </div>
                        <!--PAID OR UNPAID-->
                        <!-- <div class="types-Absence-box">
                            <p class="Absence-header">Please select one:</p>
                            <div class="absence-option">
                            <div class="absence">
                                <input value="Paid" type="radio" id="paid" name="pay" required />
                                <label for="check-halfday">Paid Leave</label>
                            </div>
                            <div class="absence">
                                <input value="Unpaid" type="radio" id="paid" name="pay" required/>
                                <label for="check-undertime">Unpaid Leave</label>
                            </div>
                            </div>
                        </div> -->
                        <!--TYPES OF LEAVE FORMS-->
                        <div class="group-select-box">
                        <div class="reminder">
                            <p class="premind"><strong>Reminder:</strong></p>
                            <ul>
                            <li><strong>VACATION LEAVE</strong> must be filed 7 days prior to desire leave date/s.</li>
                            <li><strong>SICK LEAVE</strong> exceeding 2 days must be accompanied by medical certificate.</li>
                            </ul></div><br>
                        <div>
                            <label>Select Type of Leave</label>
                        </div>
                        <select name="leaveType" id="myDropdown" onchange="showInput(this)">
                            <option hidden>Select Type of Leave</option>
                            <option value="Vacation Leave">Vacation Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                            <option value="Bereavement Leave">Bereavement Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Parental Leave">Parental Leave</option>
                            <option value="Others">Others</option>
                        </select>
                        <div id="textFieldContainer">
                            <label class="other-inputs" for="otherLeaveType">If others, kindly specific</label>
                            <input type="text" id="otherLeaveType" name="otherLeaveType" class="otherLeaveType"/>
                        </div>
                        </div>
                        <!--FOR DAYS RADIO BTN START TO END DATE -->
                        <div class="days-request-box">
                            <div class="input-box">
                                <label>From (Start Date) </label>
                                <input type="date" name="startDate" placeholder="Enter From date" required />
                            </div>
                            <div class="input-box">
                            <label>To (End Date) </label>
                            <input type="date" name="endDate" placeholder="Enter End date" required onchange="calculateHours()" required />
                            </div>
                            <input type="hidden" name="daysToHrs" id="daysToHrs" value="daysToHrs">  
                        </div>
                        <!--LEAVE REASON-->
                        <div class="reason-box">
                            <label>Reason</label>
                            <textarea name="reason" rows="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="sub-can-btn">
                            <button class="cancel-btn"><a href="empDashboard.php">Cancel</a></button>
                            <!--<button class="submit-btn" onclick="calculateHours()" >Submit</button>-->
                            <button class="submit-btn" name="submit" type="submit" >Submit</button>
                        </div>
                        </form>
                
                    </div>
                </div>
              
                  <script>
                    function showInput(select) {
                      var otherInput = document.getElementById("textFieldContainer");
                      if (select.value === "Others") {
                        otherInput.style.display = "block";
                      } else {
                        otherInput.style.display = "none";
                      }
                    }
                  </script> 
                <script src="emp-leave-form.js"></script>
        </div>
            </div>

    <a onclick="togglePopup2()" href="#" class="leave-btn">Create Leave</a>  
    
</div>

<div class="table">
    <table class="absence-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Employee ID</th>
                <th>Full Name</th>
                <th>Company</th>
                <th>Absence</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>2024-04-19</td>
                <td>123456</td>
                <td>John Doe</td>
                <td>ABC Company</td>
                <td>Vacation</td>
                <td>Paid Leave</td>
                <td>2024-04-20</td>
                <td>2024-04-25</td>
                <td>09:00 AM</td>
                <td>05:00 PM</td>
                <td>Annual vacation</td>
                <td>Approved</td>
                <td>No remarks</td>
            </tr>

            <tr>
                <td>2024-04-20</td>
                <td>789012</td>
                <td>Jane Smith</td>
                <td>XYZ Corporation</td>
                <td>Sick Leave</td>
                <td>Medical Leave</td>
                <td>2024-04-18</td>
                <td>2024-04-21</td>
                <td>08:30 AM</td>
                <td>04:30 PM</td>
                <td>Flu</td>
                <td>Pending</td>
                <td>Doctor's note submitted</td>
            </tr>
        </tbody>
    </table>
</div>
</section>

</body>
</html>