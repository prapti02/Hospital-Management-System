<?php
require 'mysql_connect.php';
session_start();
$query = "SELECT * FROM `patient_info` WHERE email='".$_SESSION['patient_email']."'";
$result_query = mysqli_query($conn, $query);
$result = mysqli_fetch_array($result_query);
$fname = $result['First_Name'];
$lname = $result['Last_Name'];
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
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
  margin: auto;
  width: 50%;
  padding: 10px;
}
.center2 {
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  padding: 10px;
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
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>PATIENT DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong> Welcome <?php echo $_SESSION["fname"]?>&nbsp;<?php echo $_SESSION["lname"] ?>!</strong>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 center">
                      <div class="div-square center">
                           <a href="book_appointment.php" >
 <i class="fa fa-rocket fa-5x"></i>
                      <h4>Book an Appointment</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 center2">
                      <div class="div-square center2">
                           <a href="view_appointment.php" >
 <i class="fa fa-clipboard fa-5x center2"></i>
                      <h4>View Booked Appointments</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 center">
                      <div class="div-square center">
                           <a href="update_profile.php" >
 <i class="fa fa-user fa-5x center"></i>
                      <h4>Update My Profile</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 center">
                      <div class="div-square center">
                           <a href="view_prescription.php" >
 <i class="fa fa-user fa-5x center"></i>
                      <h4>View Prescriptions</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                  

              </div>
                
                
                
                
                 
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
