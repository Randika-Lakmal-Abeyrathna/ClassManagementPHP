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

function getLectures($conn) {
    $data = '';
    $getStudentDataQuery = "SELECT lec_id,name,nic,mobile FROM lecturer";

    $result = $conn->query($getStudentDataQuery);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $data . '<tr>'
                    . '<td>' . $row['lec_id'] . '</td>'
                    . '<td>' . $row['name'] . '</td>'
                    . '<td>' . $row['nic'] . '</td>'
                    . '<td>' . $row['mobile'] . '</td>'
                    . '<td><a class="btn btn-secondary" href="editLecture.php?id=' . $row['lec_id'] . '">Edit Details</a></td>'
                    . '<td><a class="btn btn-danger" href="deleteLecture.php?id=' . $row['lec_id'] . '">Delete</a></td>'
                    . '</tr>';
        }
    }
    return $data;
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lectures</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
       <div class="container-fluid"> 

            <div class="row">

                <h4> Lectures Details</h4>
            </div>

            <div class="row">
                <div class="col-md-10">

                    <table class="table">
                        <thead>
                            <tr>
                               <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">NIC</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Edit Details</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
print_r(getLectures($conn));
?>
                        </tbody>
                    </table>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" href="lectureRegistration.php">New Lecture</a>
                    <a class="btn btn-warning" href="adminPage.php">Back</a>
                </div>

            </div>
        </div>
    </body>
</html>
