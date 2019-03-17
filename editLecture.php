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
$id = '';
if (empty($_GET['id'])) {
    header('Location:lectures.php');
} else {

    $id = $_GET['id'];
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




if (isset($_POST['update'])) {

    $servername = "localhost";
    $dbusername = "randika";
    $dbpassword = "Admin@123";
    $dbname = "mydb";
// Create connection
    $conn1 = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }

    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $mobile = $_POST['mobile'];
    $id = $_POST['id'];

    $updateLectureDataQuery = "UPDATE `lecturer` SET `name`='$name',`nic`='$nic',`mobile`='$mobile' WHERE lec_id ='$id'";

//    print_r('data' . $conn1->query($updateStudentDataQuery));
    if ($conn1->query($updateLectureDataQuery) === TRUE) {
        header('Location:lectures.php');
//       echo 'success';
    } else {
        echo 'else';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Lecture</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <h4> Update Lecture Details</h4>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <?php
                    $getStudentDataQuery = "SELECT lec_id,name,nic,mobile FROM lecturer WHERE lec_id=" . $_GET['id'] . "";
                    $result = $conn->query($getStudentDataQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                    <form action="editLecture.php?id=<?php print_r($id) ?>" method="post">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php print_r($_GET['id']) ?>" />
                                    <div class="form-group col-md-12">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="name" value="<?php print_r($row['name']) ?>" placeholder="Name"  required="true"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="nic">NIC</label>
                                        <input type="text" class="form-control" id="nic" name="nic" value="<?php print_r($row['nic']) ?>"  placeholder="Nic" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php print_r($row['mobile']) ?>"  placeholder="Mobile"/>
                                    </div>
                                </div>
                                <div class="float-left">
                                    <a class="btn btn-primary" href="students.php">Back</a>

                                </div>
                                <div class="row float-right">

                                    <button class="btn btn-success" type="submit" name="update">Update</button>

                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        echo 'in Else';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

