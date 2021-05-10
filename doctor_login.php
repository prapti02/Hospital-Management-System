<?php
require 'mysql_connect.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $_SESSION['doctor_email'] = $email;
    $password = $_POST['pass1'];
    $query = "SELECT `email`, `password` FROM `doctor_password` WHERE password='".$password."' and email='".$email."'";
    $result_query = mysqli_query($conn, $query);
    if(mysqli_num_rows($result_query)==1){
        header("Location:doctor_dashboard.php");
    }
    else{
        echo("<script>alert('Wrong username or password. Try again!');
                        window.location.href = 'doctor_login.php';</script>");
    }
    
    $query2 = "SELECT * FROM `doctor_info` WHERE `Email`='".$email."'";
    $result_query2 = mysqli_query($conn, $query2);
    $row=mysqli_fetch_array($result_query2);
    $did = $row['Doctor_ID'];
    $dfname = $row['First_Name'];
    $dlname = $row['Last_Name'];
    $dphone = $row['Phone_Number'];
    $dspec = $row['Specialization'];
    
    $_SESSION['did'] = $did;
    $_SESSION['dfname'] = $dfname;
    $_SESSION['dlname'] = $dlname;
    $_SESSION['dphone'] = $dphone;
    $_SESSION['dspec'] = $dspec;
    
    }

?>





<!DOCTYPE html>

<html>

<head>

<title>Doctor Login</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
	<section id="content">
		<form method="POST" action="">
			<h1>Doctor Login</h1>
			<div>
				<input name="email" type="text" placeholder="Username" required id="username" />
			</div>
			<div>
				<input name="pass1" type="password" placeholder="Password" required id="password" />
			</div>
			<div>
				<input name = "login" type="submit" value="Log in" />
				<a href="doctor_code_access.php">Lost your password?</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>

</html>