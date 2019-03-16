<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

session_start();


if (isset($_SESSION['username']) !=1) {
     header('Location:index.php');
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
                            <h6 class="align-content-center"><strong>#</strong></h6>
                            
                            <div class="row float-right">
                                <a class="btn btn-light " href="#">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lectuers</h5>
                            <P class="card-text">Number Of Lectuers </P>
                            <h6 class="align-content-center"><strong>#</strong></h6>
                            <div class="row float-right">
                                <a class="btn btn-light" href="#">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Coursers</h5>
                            <P class="card-text">Number Of Coursers</P>
                            <h6 class="align-content-center"><strong>#</strong></h6>
                            <div class="row float-right">
                                <a class="btn btn-light" href="#">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
