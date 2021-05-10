<?php
require 'mysql_connect.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $_SESSION['patient_email'] = $email;
    $password = $_POST['pass1'];
    $query = "SELECT `email`, `password` FROM `patient_password` WHERE password='".$password."' and email='".$email."'";
    $result_query = mysqli_query($conn, $query);
    if(mysqli_num_rows($result_query)==1){
        header("Location:patient_dashboard.php");
    }
    else{
        echo("<script>alert('Wrong username or password. Try again!');
                        window.location.href = 'patient_login.php';</script>");
    }
    
    $query2 = "SELECT * FROM `patient_info` WHERE `Email`='".$email."'";
    $result_query2 = mysqli_query($conn, $query2);
    $row=mysqli_fetch_array($result_query2);
    $pid = $row['ID'];
    $fname = $row['First_Name'];
    $lname = $row['Last_Name'];
    $dob = $row['DOB'];
    $sex = $row['SEX'];
    $ins = $row['Insurance_ID'];
    $bg = $row['Blood_group'];
    $gt = $row['Genotype'];
    
    $_SESSION['pid'] = $pid;
    $_SESSION['pfname'] = $fname;
    $_SESSION['plname'] = $lname;
    $_SESSION['pdob'] = $dob;
    $_SESSION['psex'] = $sex;
    $_SESSION['pins'] = $ins;
    $_SESSION['pbg'] = $bg;
    $_SESSION['pgt'] = $gt;
    
    }

?>



<!DOCTYPE html>

<html>

<head>

<title>Patient Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
	<section id="content">
		<form method="POST" action="">
			<h1>Patient Login</h1>
			<div>
				<input name="email" type="text" placeholder="Username" required id="username" />
			</div>
			<div>
				<input name="pass1" type="password" placeholder="Password" required id="password" />
			</div>
			<div>
				<input name = "login" type="submit" value="Log in" />
				<a href="patient_code_access.php">Lost your password?</a>
				<a href="registration_template.php">Register</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>

</html>