<?php
require 'mysql_connect.php';
session_start();
$vid = $_GET['view_bill'];
$query = "SELECT * FROM `patient_medication_history` WHERE Med_ID='".$vid."'";
$result_query = mysqli_query($conn, $query);
$row = $result_query->fetch_assoc();
$pid = $row['ID'];
$did = $row['Doctor_ID'];
$med = $row['Med_Name'];
$inst = $row['Med_Inst'];

$query2 = "SELECT * FROM `patient_info` WHERE ID='".$pid."'";
$result_query2 = mysqli_query($conn, $query2);
$row2 = $result_query2->fetch_assoc();

$query3 = "SELECT * FROM `doctor_info` WHERE Doctor_ID='".$did."'";
$result_query3 = mysqli_query($conn, $query3);
$row3 = $result_query3->fetch_assoc();

$query4 = "SELECT * FROM `patient_contact` WHERE ID='".$pid."'";
$result_query4 = mysqli_query($conn, $query4);
$row4 = $result_query4->fetch_assoc();

$pfname = $row2['First_Name'];
$plname = $row2['Last_Name'];
$pemail = $row2['Email'];
$pdob = $row2['DOB'];
$psex = $row2['SEX'];
$pins = $row2['Insurance_ID'];
$pbg = $row2['Blood_group'];
$pgt = $row2['Genotype'];

$pphone = $row4['Phone_Number'];
$padd = $row4['Address'];
$pecfname = $row4['ec_fname'];
$peclname = $row4['ec_lname'];
$pecphone = $row4['ec_phone'];

$dfname = $row3['First_Name'];
$dlname = $row3['Last_Name'];
$demail = $row3['Email'];
$dphone = $row3['Phone_Number'];
$dspec = $row3['Specialization'];

$amt = '$ 50';
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['debug' => true]);

$data = '';

$data .= '<h1> MEDFIT PRESCRIPTION AND BILLING </h1><hr>';
$data .= '<h2> PATIENT DETAILS </h2><hr>';

$data .= '<strong>First Name :</strong>' .$pfname. "<br />";
$data .= '<strong>Last Name :</strong>' .$plname. "<br />";
$data .= '<strong>Email :</strong>' .$pemail. "<br />";
$data .= '<strong>Phone Number :</strong>' .$pphone. "<br />";
$data .= '<strong>Address :</strong>' .$padd. "<br />";
$data .= '<strong>Date of Birth :</strong>' .$pdob. "<br />";
$data .= '<strong>Sex :</strong>' .$psex. "<br />";
$data .= '<strong>Insurance ID :</strong>' .$pins. "<br />";
$data .= '<strong>Blood Group : </strong>' .$pgt. "<br />";
$data .= '<strong>Geno Type : </strong>' .$pgt. "<br />";

$data .= '<h2> PATIENT EMERGENCY CONTACT DETAILS </h2><hr>';

$data .= '<strong> First Name : </strong>' .$pecfname. "<br />";
$data .= '<strong>Last Name : </strong>' .$peclname. "<br />";
$data .= '<strong>Phone Number :</strong>' .$pecphone. "<br />";

$data .= '<h2> DOCTOR DETAILS </h2><hr>';

$data .= '<strong> First Name : </strong>' .$dfname. "<br />";
$data .= '<strong> Last Name : </strong>' .$dlname. "<br />";
$data .= '<strong> Email ID :</strong>' .$demail. "<br />";
$data .= '<strong> Phone Number : </strong>' .$dphone. "<br />";
$data .= '<strong> Specialization : </strong>' .$dspec. "<br />";

$data .= '<h2> PRESCRIPTION </h2><hr>';

$data .= '<strong> Medication : </strong>' .$med. "<br />";
$data .= '<strong> Doctor Instruction : </strong>' .$inst. "<br />";

$data .= '<h2> Bill Amount </h2><hr>';
$data .= '<strong> Bill Due : </strong>' .$amt. "<br />";
$mpdf->WriteHTML($data);

$mpdf->Output('prescription.pdf', 'D');
?>