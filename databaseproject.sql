-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 01:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_info`
--

CREATE TABLE `appointment_info` (
  `VID` int(11) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Date_of_Appointment` date NOT NULL,
  `Time_of_Appointment` time NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Prescribed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_info`
--

INSERT INTO `appointment_info` (`VID`, `Doctor_ID`, `ID`, `Date_of_Appointment`, `Time_of_Appointment`, `Status`, `Prescribed`) VALUES
(1, 6, 3, '2021-02-02', '02:30:00', 'Scheduled', 'No'),
(2, 10, 3, '2021-02-16', '01:30:00', 'Scheduled', 'No'),
(3, 3, 3, '2021-02-28', '04:32:00', 'Scheduled', 'No'),
(4, 3, 1, '2021-02-25', '03:15:00', 'Scheduled', 'Yes'),
(5, 3, 1, '2021-02-27', '05:30:00', 'Scheduled', 'No'),
(6, 3, 1, '2021-03-03', '09:15:00', 'Scheduled', 'No'),
(7, 0, 1, '2021-03-01', '07:30:00', 'Scheduled', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `Doctor_ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_Number` varchar(100) NOT NULL,
  `Specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`Doctor_ID`, `First_Name`, `Last_Name`, `Email`, `Phone_Number`, `Specialization`) VALUES
(3, 'Venky', 'Kathy', 'venky.kathy@gmail.com', '818-424-2089', 'Allergist'),
(4, 'Prema', 'Mohan', 'prema.mohan@gmail.com', '214-812-8089', 'Pediatrician'),
(5, 'Willy', 'Wonka', 'willy.wonka@gmail.com', '824-818-8268', 'General Physician'),
(6, 'Nag', 'Suma', 'nag.suma@gmail.com', '749-868-9034', 'Dermatologist'),
(7, 'Nat', 'Vat', 'nat.vat@gmail.com', '814-828-9300', 'Opthalmologist'),
(8, 'Suma', 'Nagesh', 'suma.nagesh@gmail.com', '917-824-9096', 'Orthodontist'),
(9, 'James', 'Smith', 'james.smith@gmail.com', '234-456-6789', 'Gynecologist'),
(10, 'Smith', 'Robert', 'smith.robert@gmail.com', '124-817-8088', 'Cardiologist'),
(11, 'Maria', 'Gracia', 'maria.gracia@gmail.com', '217-808-9098', 'Endocrinologist'),
(12, 'David', 'Smith', 'david.smith@gmail.com', '142-213-8099', 'Gastroenterologist'),
(13, 'Maria', 'Rod', 'maria.rod@gmail.com', '717-818-9190', 'Urologist'),
(14, 'Mary', 'Joe', 'mary.joe@gmail.com', '124-828-9199', 'Orthopedist'),
(15, 'Maria', 'Hernandez', 'maria.hernandez@gmail.com', '112-224-3345', 'Neurologist'),
(16, 'Indra', 'Chester', 'indra.chester@gmail.com', '818-420-9099', 'Pulmonologist');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_password`
--

CREATE TABLE `doctor_password` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_password`
--

INSERT INTO `doctor_password` (`email`, `password`) VALUES
('prema.mohan@gmail.com', 'c3d4'),
('willy.wonka@gmail.com', '8792'),
('nag.suma@gmail.com', 'y1z2'),
('suma.nagesh@gmail.com', '2345'),
('nat.vat@gmail.com', '12@*'),
('james.smith@gmail.com', 'a234'),
('smith.robert@gmail.com', '3124'),
('maria.gracia@gmail.com', '4939'),
('david.smith@gmail.com', '1249'),
('maria.rod@gmail.com', 'xyz1'),
('mary.joe@gmail.com', '2789'),
('maria.hernandez@gmail.com', 'cdef'),
('indra.chester@gmail.com', 'pax2'),
('venky.kathy@gmail.com', 'a1b2');

-- --------------------------------------------------------

--
-- Table structure for table `doc_spec`
--

CREATE TABLE `doc_spec` (
  `Spec_ID` int(11) NOT NULL,
  `Specialization` varchar(200) NOT NULL,
  `Complaint` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_spec`
--

INSERT INTO `doc_spec` (`Spec_ID`, `Specialization`, `Complaint`) VALUES
(1, 'Allergist', 'My ailment is related to allergies and asthma.'),
(2, 'Cardiologist', 'My ailment is related to the heart and cadiovascular system.'),
(3, 'Dermatologist', 'My ailment is related to skin, nails and hair.'),
(4, 'Endocrinologist', 'My ailment is related to diabetes, hormone imbalances and thyroid condition.'),
(5, 'Gastroenterologist', 'My ailment is related to the digestive system.'),
(6, 'General Physician', 'My ailment is related to cold, cough and fever.'),
(7, 'Gynecologist', 'My ailment is related to female reproductive health.'),
(8, 'Neurologist', 'My ailment is related to the brain and the nervous system.'),
(9, 'Opthalmologist', 'My ailment is related to eye and vision care.'),
(10, 'Orthodontist', 'My ailment is related to dental health.'),
(11, 'Orthopedist', 'My ailment is related to bones.'),
(12, 'Pediatrician', 'Baby health care.'),
(13, 'Pulmonologist', 'My ailment is related to organs involved with breathing.'),
(14, 'Urologist', 'My ailment is related to male reproductive health and UTI.');

-- --------------------------------------------------------

--
-- Table structure for table `patient_contact`
--

CREATE TABLE `patient_contact` (
  `ID` int(11) NOT NULL,
  `Phone_Number` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ec_fname` varchar(100) NOT NULL,
  `ec_lname` varchar(100) NOT NULL,
  `ec_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_contact`
--

INSERT INTO `patient_contact` (`ID`, `Phone_Number`, `Address`, `ec_fname`, `ec_lname`, `ec_phone`) VALUES
(1, '732-318-5035', '10 Vairo Blvd', 'Sam', 'West', '654-765-9809'),
(2, '767-876-9876', '17 Gunther Rd', 'Joe', 'Wright', '765-987-5643'),
(3, '757-676-9776', '19 Madison Ave', 'Simon', 'Smith', '965-956-5435'),
(4, '876-987-9800', '245 Berkeley Ave', 'David', 'Miller', '455-976-7435'),
(5, '876-087-9854', '25 Pennsylvania Ave', 'Gustavo', 'Graves', '678-345-7135');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `SEX` varchar(100) NOT NULL,
  `Insurance_ID` varchar(30) NOT NULL,
  `Blood_group` varchar(100) NOT NULL,
  `Genotype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`ID`, `First_Name`, `Last_Name`, `Email`, `DOB`, `SEX`, `Insurance_ID`, `Blood_group`, `Genotype`) VALUES
(1, 'Aishwarya', 'Joe', 'aish.joe@gmail.com', '1982-01-13', 'Female', '123-12-4939', 'A+', 'AA'),
(2, 'Joe', 'Watson', 'joe.watson@gmail.com', '1969-02-18', 'Male', '423-23-9823', 'O+', 'BB'),
(3, 'Sal', 'West', 'sal.west@gmail.com', '1972-11-13', 'Male', '224-123-8969', 'A-', 'OO'),
(4, 'Sri', 'Sub', 'sri.sub@gmail.com', '1982-08-17', 'Female', '487-234-9899', 'B-', 'AB'),
(5, 'Pp', 'Savi', 'pp.savi@gmail.com', '2003-12-18', 'Female', '814-325-8277', 'O-', 'BO'),
(6, 'apurva', 'srihari', 'apu.srihari@gmail.com', '1996-11-06', 'female', '123-456-7890', 'B+', 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medication_history`
--

CREATE TABLE `patient_medication_history` (
  `Med_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Med_Name` varchar(200) NOT NULL,
  `Med_Inst` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_medication_history`
--

INSERT INTO `patient_medication_history` (`Med_ID`, `ID`, `Doctor_ID`, `Med_Name`, `Med_Inst`) VALUES
(4, 3, 3, 'Cetirizine', 'Take 10 pills, everyday after dinner for 10 days.'),
(5, 1, 3, 'Althrocin', 'Take 10 pills, everyday after dinner for 10 days.'),
(6, 1, 3, 'Aspirin', 'Take 5 pills, before food, 1 pill a day.'),
(7, 1, 3, 'Acetaminophen', 'Take 4 pills, after food, 1 pill a day.');

-- --------------------------------------------------------

--
-- Table structure for table `patient_password`
--

CREATE TABLE `patient_password` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_password`
--

INSERT INTO `patient_password` (`email`, `password`) VALUES
('joe.watson@gmail.com', '9876'),
('sal.west@gmail.com', '4939'),
('sri.sub@gmail.com', 'abcd'),
('pp.savi@gmail.com', 'xyza'),
('aish.joe@gmail.com', '1234'),
('apu.srihari@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `patient_visit`
--

CREATE TABLE `patient_visit` (
  `VID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Date_of_visit` date NOT NULL,
  `Time_of_appointment` time NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Complaint` varchar(100) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Prescription_Available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_visit`
--

INSERT INTO `patient_visit` (`VID`, `ID`, `Date_of_visit`, `Time_of_appointment`, `Doctor_ID`, `Complaint`, `Specialization`, `Status`, `Prescription_Available`) VALUES
(2, 3, '2021-02-02', '02:30:00', 6, 'My ailment is related to skin, nails and hair.', 'Dermatologist', 'Scheduled', 'No'),
(3, 3, '2021-02-16', '01:30:00', 10, 'My ailment is related to the heart and cadiovascular system.', 'Cardiologist', 'Scheduled', 'No'),
(4, 3, '2021-02-28', '04:32:00', 3, 'My ailment is related to allergies and asthma.', 'Allergist', 'Scheduled', 'Yes'),
(5, 1, '2021-02-25', '03:15:00', 3, 'My ailment is related to allergies and asthma.', 'Allergist', 'Scheduled', 'Yes'),
(6, 1, '2021-02-27', '05:30:00', 3, 'My ailment is related to allergies and asthma.', 'Allergist', 'Scheduled', 'Yes'),
(7, 1, '2021-03-03', '09:15:00', 3, 'My ailment is related to allergies and asthma.', 'Allergist', 'Scheduled', 'Yes'),
(8, 1, '2021-03-01', '07:30:00', 10, 'My ailment is related to the heart and cadiovascular system.', 'Cardiologist', 'Cancelled by Doctor', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_info`
--
ALTER TABLE `appointment_info`
  ADD PRIMARY KEY (`VID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`,`ID`,`Date_of_Appointment`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`Doctor_ID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`,`Email`);

--
-- Indexes for table `doctor_password`
--
ALTER TABLE `doctor_password`
  ADD KEY `email` (`email`);

--
-- Indexes for table `doc_spec`
--
ALTER TABLE `doc_spec`
  ADD PRIMARY KEY (`Spec_ID`),
  ADD KEY `Specialization` (`Specialization`,`Complaint`);

--
-- Indexes for table `patient_contact`
--
ALTER TABLE `patient_contact`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`,`DOB`);

--
-- Indexes for table `patient_medication_history`
--
ALTER TABLE `patient_medication_history`
  ADD PRIMARY KEY (`Med_ID`),
  ADD KEY `ID` (`ID`,`Doctor_ID`);

--
-- Indexes for table `patient_password`
--
ALTER TABLE `patient_password`
  ADD KEY `email` (`email`);

--
-- Indexes for table `patient_visit`
--
ALTER TABLE `patient_visit`
  ADD PRIMARY KEY (`VID`),
  ADD KEY `ID` (`ID`,`Date_of_visit`,`Time_of_appointment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_info`
--
ALTER TABLE `appointment_info`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doc_spec`
--
ALTER TABLE `doc_spec`
  MODIFY `Spec_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient_contact`
--
ALTER TABLE `patient_contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_visit`
--
ALTER TABLE `patient_visit`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
