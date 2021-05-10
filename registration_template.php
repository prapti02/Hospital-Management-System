<?php
require 'mysql_connect.php';
if(isset($_POST['next'])){
    $email = $_POST['email'];
    echo($email);
    $password1 = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    $fname = $_POST['fname'];
    echo($fname);
    $lname = $_POST['lname'];
    echo($lname);
    $timestamp = $_POST['dob'];
    $date = str_replace('/', '-', $timestamp);
    $dob = date('Y-m-d', strtotime($date));
    echo($dob);
    $ins = $_POST['insurance'];
    echo($ins);
    $sex = $_POST['gender'];
    echo($sex);
    $bg = $_POST['bg'];
    echo($bg);
    $gt = $_POST['gt'];
    echo($gt);
    
    if($password1 == $password2){
        echo('Passwords Match');
        $query1 = "INSERT INTO `patient_info`(`First_Name`, `Last_Name`, `Email`, `DOB`, `SEX`, `Insurance_ID`, `Blood_group`, `Genotype`) VALUES ('".$fname."','".$lname."','".$email."','".$dob."','".$sex."','".$ins."','".$bg."','".$gt."')";
        $result_query1 = mysqli_query($conn, $query1);
        if(mysqli_affected_rows($conn)>0){
            echo("Details Recorded Successfully");
            $query = "SELECT * FROM `patient_password` WHERE email = '".$email."'";
            $result_query = mysqli_query($conn, $query);
            if(mysqli_num_rows($result_query)==1){
                echo("<script>alert('Email Address already exists. Try Logging in!');
                        window.location.href = 'index.php';</script>");
                
            }
            else{
            $query2 = "INSERT INTO `patient_password`(`email`, `password`) VALUES ('".$email."','".$password2."')";
            $result_query2 = mysqli_query($conn, $query2);
            if(mysqli_affected_rows($conn)>0){
                echo("<script>alert('Records Updated Successfully. Please Login Now. Redirecting...');
                        window.location.href = 'index.php';</script>");
        }
            else{
                echo("Password was not updated");
            }
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
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Patient Register I</title>

    <!-- Icons font CSS-->
    <link href="vendor2/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor2/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor2/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor2/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css2/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Patient Registration Form</h2>
                    <form method="POST", action="">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" name="fname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last Name</label>
                                    <input class="input--style-4" type="text" name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Birth</label> 
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="dob">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Insurance ID</label>
                                    <input class="input--style-4" type="text" name="insurance" placeholder="000-00-0000">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Blood Group</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="bg">
                                    <option disabled="disabled" selected="selected">Choose Blood Group</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
									<option>B-</option>
									<option>O+</option>
									<option>B-</option>
									<option>AB+</option>
									<option>AB-</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						<div class="input-group">
                            <label class="label">Geno Type</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gt">
                                    <option disabled="disabled" selected="selected">Choose Genotype</option>
                                    <option>AA</option>
                                    <option>AO</option>
                                    <option>BB</option>
									<option>BO</option>
									<option>AB</option>
									<option>OO</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="pass2">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="next">Next</button>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->