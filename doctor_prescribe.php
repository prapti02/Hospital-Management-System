<?php
require 'mysql_connect.php';
session_start();
$vid = $_GET['prescribe'];
$query2 = "SELECT * FROM `patient_visit` WHERE VID='".$vid."'";
$result_query2 = mysqli_query($conn, $query2);
$row = $result_query2->fetch_assoc();

if(isset($_POST['prescribe'])){
    $query = "INSERT INTO `patient_medication_history`(`Med_ID`, `ID`, `Doctor_ID`, `Med_Name`, `Med_Inst`) VALUES ('".$vid."', '".$row['ID']."', '".$row['Doctor_ID']."', '".$_POST['med']."', '".$_POST['inst']."')";
    $result_query = mysqli_query($conn, $query);
    
    $query2 = "UPDATE `patient_visit` SET `Prescription_Available`= 'Yes' WHERE VID='".$vid."'";
                $result_query2 = mysqli_query($conn, $query2);
    $query3 = "UPDATE `appointment_info` SET `Prescribed`= 'Yes' WHERE VID='".$vid."'";
                $result_query3 = mysqli_query($conn, $query3);
                if(mysqli_affected_rows($conn)>0){
                    echo("<script>alert('Records Updated Successfully.');
                            window.location.href = 'doctor_view_appointment.php';</script>");
            }
                else{
                    echo("Password was not updated");

            }
    
    if($result_query){
            echo('Medication Info Table Updated.');
        }
    else{
        echo('Medication Info Table Not Updated.');
        }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Prescribe</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <!-- Required meta tags-->
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Doctor Prescribe </title>

    <!-- Icons font CSS-->
    <link href="vendor2/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor2/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    

    <!-- Vendor CSS-->
    <link href="vendor2/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor2/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css2/main.css" rel="stylesheet" media="all">
   
   
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
                        <a href="doctor_dashboard.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="doctor_view_appointment.php"><i class="fa fa-qrcode"></i>View My Appointments</a>
                    </li>
                    <li>
                        <a href="doctor_update_profile.php"><i class="fa fa-qrcode "></i>Update My Profile</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Doctor Prescription Form </h2>
                    <form method="POST", action="">
                        <div class="row row-space">
                            <div class="input-group">
                            <label class="label">Medication Name</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="med">
                                    <option selected="selected"></option>
                                    <option selected="selected">Cetirizine </option>
                                    <option>Althrocin </option>
                                    <option>Pethidine</option>
									<option>Benazepril </option>
									<option>Amoxicillin</option>
									<option>Anticholinergics</option>
									<option>duloxetine </option>
									<option>Acetaminophen</option>
                                    <option>Bevacizumab</option>
                                    <option>Analgesics</option>
                                    <option>Aspirin</option>
                                    <option>Analgesics</option>
                                    <option>hydrocortisone </option>
                                    <option>pantoprazole </option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Instruction for the Patient</label>
                                    <input class="input--style-4" type="text" name="inst">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="prescribe">Prescribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor2/select2/select2.min.js"></script>
    <script src="vendor2/datepicker/moment.min.js"></script>
    <script src="vendor2/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js2/global.js"></script>
       
        </div>
        
    </body>
    
</html>


