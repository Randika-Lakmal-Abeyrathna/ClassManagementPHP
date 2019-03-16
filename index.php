<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

session_start();
$errormsg = NULL;


//$dbConnection =getDBConnection();
if (isset($_POST['login']) && !empty($_POST['userName']) && !empty($_POST['password'])) {


$servername = "localhost";
$dbusername = "randika";
$dbpassword = "Admin@123";
$dbname = "mydb";


$loginUserName = $_POST['userName'];
$loginPassword = $_POST['password'];

$encriptPassword = md5($loginPassword);

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$loginDataQuery = "SELECT usertype_idusertype FROM login WHERE username='".$loginUserName."' and password ='$loginPassword'";
$result = $conn->query($loginDataQuery);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
    print_r( $row["usertype_idusertype"]);

    $userTypeDataQuery = "SELECT type FROM usertype WHERE idusertype='".$row['usertype_idusertype']."'";
    
    $userTypeResults = $conn->query($userTypeDataQuery);
    
    if ($userTypeResults->num_rows > 0) {
        while ($userTypeRow = $userTypeResults->fetch_assoc()) {
            
            if ($userTypeRow['type'] === 'admin') {
                $_SESSION['username'] = $loginUserName;
                header('Location:adminPage.php');
            }else if ($userTypeRow['type'] === 'lecture') {
                
            }else if ($userTypeRow['type'] === 'student') {
                
            }
            
        }
    }
    
}

}else{
    $errormsg = 'Invalid User Name or Password';
    
}


$conn->close();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>



    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <h2>Class Manegment System</h2>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <?php
                    if ($errormsg != NULL) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $errormsg ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span  aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }
                    ?>


                    <!--alert-->
                    <div class="panel panel-success">
                        <div class="panel panel-heading"><h4>Login</h4></div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="index.php" method="post">
                                <div class="form-group">
                                    <label for="userName" class="control-label">User Name</label>
                                    <div >
                                        <input type="text" name="userName"  placeholder="Enter Your User Name" class="form-control" id="userName" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <div >
                                        <input type="password" name="password"  placeholder="Enter Your Password" class="form-control" id="password">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <aside >
                                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                                    </aside>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </body>
</html>
