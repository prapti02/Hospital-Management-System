# Hospital-Management-System
This is a project to create a Hospital Database Management System **MEDFIT** from both the perspectives of Patients and Doctors. 
The project was created using HTML5, CSS, PHP and MySQL. The website has multiple functionalities for both Doctors and Patients.
The website is handled to support concurrent transactions. The transactions are designed to be secure with efficient rollbacks and Isolation.

The **WORKING DEMO** of the website can be found here:
http://181.149.67.34.bc.googleusercontent.com/Database_Project/index.php


The website is hosted on Google Cloud Platform (https://cloud.google.com/) using Bitnami (https://bitnami.com/) and Apache Xampp (https://www.apachefriends.org/index.html)

The tutorial to host Xampp applications on GCP can be found here:
https://www.apachefriends.org/docs/hosting-xampp-on-google.html

The **HOMEPAGE** of the site looks like this:
![1](https://user-images.githubusercontent.com/35360830/117248766-82132500-ae0e-11eb-895e-49a52ff8eec3.PNG)

Following functionalities are available:
1. **Patient Register**:
   To test our software, users can register themselves with valid/invalid email ids and other information.
   ![2](https://user-images.githubusercontent.com/35360830/117249679-fdc1a180-ae0f-11eb-9f8f-cd0a833b2e9e.PNG)
   
2. **Patient Login**:
   After the patient registers, they can login using their credentials - email and password. 
   For testing purposes, we provide you with the following patient credentials for patient login:
   | email                   |  password |
   --------------------------|------------
   | joe.watson@gmail.com    |  9876     |
   | sal.west@gmail.com      |  4939     |
   | sri.sub@gmail.com       |  abcd     |
   | pp.savi@gmail.com       |  xyza     |
   | aish.joe@gmail.com      |  1234     |
   | apu.srihari@gmail.com   |  1234     |
   
   
   ![3](https://user-images.githubusercontent.com/35360830/117250201-dfa87100-ae10-11eb-86f9-6a6d039396a4.PNG)

3. **Doctor Login**
   Only the administration has the ability to add and remove doctors in our system. There is one doctor per specialization in our            hospital. There are 14 specializations in total. For testing purposes, we provide the following credentials of our Doctors:
   | email                    |  password   |   specialization       |
   |--------------------------|-------------|------------------------|
   | prema.mohan@gmail.com    |  c3d4       |   Pediatrician         |
   | willy.wonka@gmail.com    |  8792       |   General Physician    |
   | nag.suma@gmail.com       |  y1z2       |   Dermatologist        |
   | suma.nagesh@gmail.com    |  2345       |   Orthodontist         | 
   | nat.vat@gmail.com        |  12@*       |   Opthalmologist       |
   | james.smith@gmail.com    |  a234       |   Gynecologist         | 
   | smith.robert@gmail.com   |  3124       |   Cardiologist         |
   | maria.gracia@gmail.com   |  4939       |   Endocrinologist      | 
   | david.smith@gmail.com    |  1249       |   Gastroenterologist   |
   | maria.rod@gmail.com      |  xyz1       |   Urologist            |
   | mary.joe@gmail.com       |  2789       |   Orthopedist          |
   | maria.hernandez@gmail.com|  cdef       |   Neurologist          | 
   | indra.chester@gmail.com  |  pax2       |   Pulmonologist        |
   | venky.kathy@gmail.com    |  a1b2       |   Allergist            |
   
   
   ![13](https://user-images.githubusercontent.com/35360830/117250786-b9cf9c00-ae11-11eb-9b81-02e3d0e7603c.PNG)
   
4. **Patient Dashboard**:
   After logging in, the user is taken to the Patient Dashboard
   ![4](https://user-images.githubusercontent.com/35360830/117250941-f602fc80-ae11-11eb-8887-7849658e13e2.PNG)
   
5. **Book an Appointment**:
   The patient can choose the ailment, and the corresponding Doctor is shown for choosing.
   ![6](https://user-images.githubusercontent.com/35360830/117251031-192dac00-ae12-11eb-92f2-47206e337cc8.PNG)
   ![7](https://user-images.githubusercontent.com/35360830/117251043-1d59c980-ae12-11eb-935a-cffb700ff37c.PNG)

6. **View Appointments**:
   The patient can view his/her appointments and have the choice to either **Edit** or **Delete** the appointment.
   ![8](https://user-images.githubusercontent.com/35360830/117251218-598d2a00-ae12-11eb-8772-6a742ae3a46a.PNG)
   
7. **Doctor Dashboard**:
   After logging in, the Doctor is taken to his/her dashboard.
   ![9](https://user-images.githubusercontent.com/35360830/117251316-76296200-ae12-11eb-9a92-f96aeac23e2e.PNG)
   

   
8. **View Doctor Appointments**:
   The Doctor can view his/her appointment schedule with multiple patients. The Doctor has the ability to make an **online prescription**    or **cancel** the appointment.
   ![10](https://user-images.githubusercontent.com/35360830/117251434-ab35b480-ae12-11eb-8d64-e0c1c967019a.PNG)

9. **Make Prescription**:
   The Doctor can choose which medicine to provide and write a note to the patient about the medication and dosage.
   ![11](https://user-images.githubusercontent.com/35360830/117251616-ea640580-ae12-11eb-98ce-f16081a6afe0.PNG)

10. **View Prescription**:
    The patient can view his/her prescription after the Doctor has made one in the "View Prescription" tab in the patient dashboard. The     The patient can also download a pdf of the bill from his/her portal.
    ![12](https://user-images.githubusercontent.com/35360830/117251837-2bf4b080-ae13-11eb-9912-eccb55b71caf.PNG)

   





   
