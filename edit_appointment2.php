<?php
require 'mysql_connect.php';
session_start();
$vid = $_GET['edit'];
$query2 = "SELECT * FROM `patient_visit` WHERE VID='".$vid."'";
$result_query2 = mysqli_query($conn, $query2);
$row = $result_query2->fetch_assoc();
$_SESSION['curr_spec'] = $row['Specialization'];
$date1 = $row['Date_of_visit'];
$date = str_replace('-', '/', $date1);
$dob = date('d/m/Y', strtotime($date));
$time = $row['Time_of_appointment'];
$var = explode(":", $time);
$hour = $var[0];
$min = $var[1];
$toa = $hour.":".$min;
echo($toa);
$did = $row['Doctor_ID'];
$pid = $row['ID'];
$query3 = "SELECT * FROM `doctor_info` WHERE Doctor_ID='".$did."'";
$result_query3 = mysqli_query($conn, $query3);
$row2 = $result_query3->fetch_assoc();
$fname = $row2['First_Name'];
$lname = $row2['Last_Name'];

$query = "SELECT * FROM `doctor_info` WHERE  `Specialization` = '".$_SESSION['curr_spec']."'";
$result_query = mysqli_query($conn, $query);







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
    $_SESSION['did'] = $did;
    $currdate = date('Y-m-d');
    if($dob >= $currdate){
        $query3 = "SELECT * FROM `appointment_info` WHERE `Doctor_ID` = '".$did." AND `Date_of_Appointment` ='".$dob."' AND `Time_of_Appointment` = '".$toa."'";
        $result_query3 = mysqli_query($conn, $query3);
        if($result_query3 == false){
            $status = "Scheduled";
        
            $query4 = "UPDATE `patient_visit` SET `Date_of_visit` = '".$dob."', `Time_of_appointment` = '".$toa."', `Doctor_ID` = '".$did."', `Status` = '".$status."' WHERE `VID` = '".$vid."'";
            $result_query4 = mysqli_query($conn, $query4);
            
            $query5 = "UPDATE `appointment_info` SET `Date_of_Appointment` = '".$dob."', `Time_of_Appointment` = '".$toa."', `Doctor_ID` = '".$did."', `ID` = '".$pid."' ,`Status` = '".$status."' WHERE `VID` = '".$vid."'";
            $result_query5 = mysqli_query($conn, $query5);
            
            if($result_query4 && $result_query5){
                echo('Patient Visit Table Updated.');
            }
            else{
                echo('Patient Visit Table Not Updated.');
            }


                echo("<script>alert('Your appointment has been updated and scheduled');
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
                    <h2 class="title">Book your Appointment with a <?php echo $_SESSION["curr_spec"]?></h2>
                    <form method="POST", action="">
                       
                       <div class="input-group">
                                    <label class="label">Date of Appointment</label> 
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="doa" value = "<?php echo $dob ?>">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                        <div class="input-group">
                            <label class="label">Doctor</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="doc">
                                    <option selected=<?php echo $fname?>&nbsp;<?php echo $lname?>></option>
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
                                        <input class="input--style-4" type="time" name="toa" value = "<?php echo $toa?>">
                                    </div>
                                </div>
						
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="sub">Update</button>
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