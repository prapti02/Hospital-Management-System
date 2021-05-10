<?php
require 'mysql_connect.php';
session_start();
if(isset($_POST['next'])){
    $selection = $_POST['bg'];
    $query = "SELECT * FROM `doc_spec` WHERE  `Complaint` = '".$selection."'";
    $result_query = mysqli_query($conn, $query);
    if(mysqli_num_rows($result_query)==1){
        $result = mysqli_fetch_array($result_query);
        $spec = $result['Specialization'];
        $_SESSION['spec'] = $spec;
        $_SESSION['complaint'] = $selection;
        header("Location:book_appointment2.php");
    }
    else{
        echo("<script>alert('Selection Failed. You can edit only the appointments you have created. To schedule a new appointment, Go to Book an appointment page.');
                        window.location.href = 'patient_dashboard.php';</script>");
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
    <title>Book Appointment I</title>

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
                    <h2 class="title">What is your Ailment?</h2>
                    <form method="POST", action="">
                        <div class="input-group">
                            <label class="label">General Ailments</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="bg">
                                    <option disabled="disabled" selected="selected">Ailment Type</option>
                                    <option>My ailment is related to allergies and asthma.</option>
                                    <option>My ailment is related to the heart and cadiovascular system.</option>
                                    <option>My ailment is related to skin, nails and hair.</option>
									<option>My ailment is related to diabetes, hormone imbalances and thyroid condition.</option>
									<option>My ailment is related to the digestive system.</option>
									<option>My ailment is related to cold, cough and fever.</option>
									<option>My ailment is related to female reproductive health.</option>
                                    <option>My ailment is related to the brain and the nervous system.</option>
                                    <option>My ailment is related to eye and vision care.</option>
                                    <option>My ailment is related to dental health.</option>
                                    <option>My ailment is related to bones.</option>
                                    <option>Baby health care.</option>
                                    <option>My ailment is related to organs involved with breathing.</option>
                                    <option>My ailment is related to male reproductive health and UTI.</option>
                                    
                                </select>
                                <div class="select-dropdown"></div>
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