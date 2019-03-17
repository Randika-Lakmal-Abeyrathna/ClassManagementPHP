<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

if (isset($_SESSION['username']) != 1) {
    header('Location:index.php');
}

$servername = "localhost";
$dbusername = "randika";
$dbpassword = "Admin@123";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['saveLecture'])) {

    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $mobile = $_POST['mobile'];


    $insertLectureQuery = "INSERT INTO lecturer(name,nic,mobile) VALUES('$name','$nic','$mobile') ";

    if ($conn->query($insertLectureQuery) === TRUE) {
         header('Location:lectures.php');

    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lecture Registration</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <h2>Lecture Registration</h2>
            </div>
            <form action="lectureRegistration.php" method="post">

                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="firstName">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="true"/>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nic">NIC</label>
                                <input type="text" class="form-control" id="nic" name="nic" placeholder="Nic" required="true"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 float-left">

                                <a class="btn btn-secondary" href="lectures.php">Back</a>
                            </div>
                            <div class="col-md-auto float-right">
                                <button type="submit" name="saveLecture" class="btn btn-primary ">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </body>
</html>
