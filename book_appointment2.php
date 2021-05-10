<?php
require 'mysql_connect.php';
session_start();

$spec = $_SESSION['spec'];
$query = "SELECT * FROM `doctor_info` WHERE  `Specialization` = '".$spec."'";
$result_query = mysqli_query($conn, $query);
$pid = $_SESSION['pid'];
$comp = $_SESSION['complaint'];
if(isset($_POST['sub'])){
    $datestamp = $_POST['doa'];
    $date = str_replace('/', '-', $datestamp);
    $dob = date('Y-m-d', strtotime($date));
    $selection = $_POST['doc'];
    $pieces = explode(" ", $selection);
    $fname = $pieces[0];
    $fname = str_replace(' ', '', $fname);
    $lname = $pieces[1];
    $timestamp = $_POST['toa'];
    $toa = date('h:i:s', strtotime($timestamp));
    $query2 = "SELECT * FROM `doctor_info` WHERE  `First_Name` = '".$fname."' AND `Last_Name` = '".$lname."'";
    $result_query2 = mysqli_query($conn, $query2);
    $result2 = mysqli_fetch_array($result_query2);
    $did = $result2['Doctor_ID'];
    $demail = $result2['Email'];
    $_SESSION['demail'] = $demail;
    $_SESSION['did'] = $did;
    $currdate = date('Y-m-d');
    if($dob >= $currdate){
        $query3 = "SELECT * FROM `appointment_info` WHERE `Doctor_ID` = '".$did." AND `Date_of_Appointment` ='".$dob."' AND `Time_of_Appointment` = '".$toa."'";
        $result_query3 = mysqli_query($conn, $query3);
        if($result_query3 == false){
            $status = "Scheduled";
        
            $query4 = "INSERT INTO `patient_visit`(`ID`, `Date_of_visit`, `Time_of_appointment`, `Doctor_ID`, `Complaint`, `Specialization`, `Status`, `Prescription_Available`) VALUES ('".$pid."', '".$dob."', '".$toa."', '".$did."', '".$comp."', '".$spec."', '".$status."', 'No')";
            $result_query4 = mysqli_query($conn, $query4);
            if($result_query4){
                echo('Patient Visit Table Updated.');
            }
            else{
                echo('Patient Visit Table Not Updated.');
            }


            $query5 = "INSERT INTO `appointment_info`(`Doctor_ID`, `ID`, `Date_of_Appointment`, `Time_of_Appointment`, `Status`, `Prescribed`) VALUES ('".$did."', '".$pid."', '".$dob."', '".$toa."', '".$status."','No')";
            $result_query5 = mysqli_query($conn, $query5);
            if($result_query5){
                echo('Doctor Appointment Info Table Updated.');
            }
            else{
                echo('Doctor Appointment Info Table Not Updated.');
            }

                echo("<script>alert('Your appointment has been scheduled');
                            window.location.href = 'patient_dashboard.php';</script>");
                
            
        }
        else{
            echo("<script>alert('Doctor is not available. Choose another date and time.');
                        window.location.href = 'booking_appointment2.php';</script>");
        }
    }
    else{
        echo("<script>alert('Choose a date in the future!');
                        window.location.href = 'book_appointment2.php';</script>");
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
    <title>Book Appointment II</title>

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
                    <h2 class="title">Book your Appointment with a <?php echo $_SESSION["spec"]?></h2>
                    <form method="POST", action="">
                       
                       <div class="input-group">
                                    <label class="label">Date of Appointment</label> 
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="doa">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                        <div class="input-group">
                            <label class="label">Doctor</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="doc">
                                    <option disabled="disabled" selected="selected">Choose your Doctor</option>
                                    <?php
                                    if($result_query){
                                        while($row=mysqli_fetch_array($result_query)){
                                            $fname = $row["First_Name"];
                                            $lname = $row["Last_Name"];
                                            echo"<option>$fname $lname<br></option>";
                                        }
                                    }
                                    
                                    ?>
                    
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                                    <label class="label">Time of Appointment</label> 
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="time" name="toa">
                                    </div>
                                </div>
						
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="sub">Submit</button>
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