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

// Get Student Count
function getStudentCount($conn) {


    $getStudentCountQuery = "SELECT COUNT(stu_id) as count FROM student";
    $count = 0;
    $result = $conn->query($getStudentCountQuery);
    if ($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $count =$row['count'];
        }
    }
    return $count;
}

// Get Lectuer Count
function getLectuerCount($conn) {
    $getLectuerCountQuery = "SELECT COUNT(lec_id) as count FROM lecturer";

     $count = 0;
    $result = $conn->query($getLectuerCountQuery);
    if ($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $count =$row['count'];
        }
    }
    return $count;
}

// Get Course Count
function getDegreeCount($conn) {
    $getDegreeCountQuery = "SELECT COUNT(deg_id) as count FROM degree";
 $count = 0;
    $result = $conn->query($getDegreeCountQuery);
    if ($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $count =$row['count'];
        }
    }
    return $count;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <h4> Welcome <?php echo $_SESSION['username']; ?> </h4>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Students</h5>
                            <P class="card-text">Number Of Students</P>
                            <h6 class="align-content-center"><strong><?php print_r(getStudentCount($conn)); ?></strong></h6>

                            <div class="row float-right">
                                <a class="btn btn-light " href="students.php">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lectuers</h5>
                            <P class="card-text">Number Of Lectuers </P>
                            <h6 class="align-content-center"><strong><?php print_r(getLectuerCount($conn)); ?></strong></h6>
                            <div class="row float-right">
                                <a class="btn btn-light" href="lectures.php">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Degrees</h5>
                            <P class="card-text">Number Of Degrees</P>
                            <h6 class="align-content-center"><strong><?php print_r(getDegreeCount($conn)); ?></strong></h6>
                            <div class="row float-right">
                                <a class="btn btn-light" href="degrees.php">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
