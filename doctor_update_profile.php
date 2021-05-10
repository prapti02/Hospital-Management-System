<?php
require 'mysql_connect.php';
session_start();
$did = $_SESSION['did'];
echo($did);
$query = "SELECT * FROM `doctor_info` WHERE Doctor_ID='".$did."'";
$result_query = mysqli_query($conn, $query);
$row = $result_query->fetch_assoc();
$fname = $row['First_Name'];
$lname = $row['Last_Name'];
$email = $row['Email'];
$phone = $row['Phone_Number'];
$spec = $row['Specialization'];

$query2 = "SELECT * FROM `doctor_password` WHERE email='".$email."'";
$result_query2 = mysqli_query($conn, $query2);
$row2 = $result_query2->fetch_assoc();
$pass = $row2['password'];

if(isset($_POST['next'])){
    $email_ = $_POST['email'];
    $password1_ = $_POST['pass1'];
    $password2_ = $_POST['pass2'];
    $fname_ = $_POST['fname'];
    $lname_ = $_POST['lname'];
    $phone_ = $_POST['phone'];
    if($password1_ == $password2_){
            echo('Passwords Match');
            $query1 = "UPDATE `doctor_info` SET `First_Name`='".$fname_."',`Last_Name`='".$lname_."',`Email`='".$email_."',`Phone_Number`='".$phone_.",`Specialization`='".$spec."' WHERE Doctor_ID = '".$did."'";
            $result_query1 = mysqli_query($conn, $query1);
            echo(mysqli_affected_rows($conn));
            if(mysqli_affected_rows($conn)>0){
                echo("Details Recorded Successfully");
                $query2 = "UPDATE `doctor_password` SET `password`= '".$password2_."' WHERE email='".$email."'";
                $result_query2 = mysqli_query($conn, $query2);
                if(mysqli_affected_rows($conn)>0){
                    echo("<script>alert('Records Updated Successfully.');
                            window.location.href = 'doctor_dashboard.php';</script>");
            }
                else{
                    echo("Password was not updated");

            }
            }
            else{
                echo("Insert Failed.");
            }

        }
        else{
            echo("<script>alert('Passwords do not match. Try Again');
                            window.location.href = 'index.php';</script>");
        }

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Profile</title>
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
    <title>Doctor Register I</title>

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
                        <a href="doctor_dashboard.php" ><i class="fa fa-desktop "></i>Doctor Dashboard </a>
                    </li>
                    <li>
                        <a href="doctor_view_appointment.php"><i class="fa fa-qrcode"></i>View Booked Appointments</a>
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
                    <h2 class="title">Doctor Update Form</h2>
                    <form method="POST", action="">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" name="fname" value="<?php echo $fname; ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last Name</label>
                                    <input class="input--style-4" type="text" name="lname" value="<?php echo $lname; ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" value="<?php echo $phone; ?>">
                                </div>
                            </div>
                        </div>
                    
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass1" <?php echo $pass; ?>>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="pass2" <?php echo $pass; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="next">Update</button>
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