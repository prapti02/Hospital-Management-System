<?php
require 'mysql_connect.php';
session_start();
$pid = $_SESSION['pid'];
$query = "SELECT * FROM `patient_visit` WHERE ID='".$pid."'";
$result_query = mysqli_query($conn, $query);

$vid = $_GET['cancel'];
$status = 'Cancelled by Patient';
$query2 = "UPDATE `patient_visit` SET `Status`= '".$status."' WHERE `VID`='".$vid."'";
$query_x = "UPDATE `appointment_info` SET `Status`= '".$status."' WHERE `VID`='".$vid."'";
$result_query2 = mysqli_query($conn, $query2);
$result_query_x = mysqli_query($conn, $query_x);
if($result_query2 && $result_query_x){
    echo('Success');
}
else{
    echo('Failure');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   
   <style>
    .center {
      margin-left: auto;
      margin-right: auto;
      width: 65%;
      padding: 4px;
    }
    
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 25%;
    }

    td, th {
      border: 5px solid #dddddd;
      text-align: center;
      padding: 20px;
    }

    </style>
    </head>
    
    <body>
     
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="patient_dashboard.php">
                        <img src="assets/img/logo1.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="index.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="patient_dashboard.php" ><i class="fa fa-desktop "></i>Patient Dashboard </a>
                    </li>
                    <li>
                        <a href="book_appointment.php"><i class="fa fa-qrcode "></i>Book an Appointment</a>
                    </li>
                    <li>
                        <a href="view_appointment.php"><i class="fa fa-qrcode"></i>View Booked Appointments</a>
                    </li>
                    <li>
                        <a href="update_profile.php"><i class="fa fa-qrcode "></i>Update My Profile</a>
                    </li>
                    <li>
                        <a href="view_prescription.php"><i class="fa fa-qrcode "></i>View Prescriptions</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
    <div class="row justify-content-center ">
        <table class="table center">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Doctor Name</th>
                    <th>Specialization</th>
                     <th>Date of Appointment</th>
                    <th>Time of Appointment</th>
                    <th>Doctor Email</th>
                    <th>Status</th>
                    <th>Prescription Available?</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

    <?php
        
        while ($row = $result_query->fetch_assoc()): ?>
           <?php
                $query2 = "SELECT * FROM `doctor_info` WHERE `Doctor_ID` = '".$row['Doctor_ID']."'";
                $result_query2 = mysqli_query($conn, $query2);
                $row1 = $result_query2->fetch_assoc();
                $fname = $row1['First_Name'];
                $lname = $row1['Last_Name'];

            ?>
            <tr>
                <td><?php echo $row['VID']?></td>
                <td><?php echo $fname?>&nbsp;<?php echo $lname?></td>
                <td><?php echo $row['Specialization']?></td>
                <td><?php echo $row['Date_of_visit']?></td>
                <td><?php echo $row['Time_of_appointment']?></td>
                <?php $doc_id = $row['Doctor_ID']; ?>
                <?php
                $query_temp = "SELECT * FROM `doctor_info` WHERE Doctor_ID='".$doc_id."'";
                $result_query_temp = mysqli_query($conn, $query_temp);
                $row_temp = $result_query_temp->fetch_assoc();
                $doc_email = $row_temp['Email'];
                
                ?>
                <td><?php echo $doc_email?></td>
                <td><?php echo $row['Status']?></td>
                <td><?php echo $row['Prescription_Available']?></td>
                <td>
                    <a href = "edit_appointment2.php?edit=<?php echo $row['VID'];?>"
                    class="btn btn-info">Edit</a>
                    <a href = "view_appointment.php?cancel=<?php echo $row['VID'];?>"
                    class="btn btn-danger">Cancel</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
        </div>
    </div>
    </body>
</html>


<?php
function pre_r( $array ) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>



