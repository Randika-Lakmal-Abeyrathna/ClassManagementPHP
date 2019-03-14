<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
$errormsg = NULL;

if (isset($_POST['login']) && !empty($_POST['userName']) && !empty($_POST['password'])) {

    if ($_POST['username'] == 'tutorialspoint' &&
            $_POST['password'] == '1234') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'tutorialspoint';

        $errormsg = 'You have entered valid use name and password';
    } else {
        $errormsg = 'Wrong username or password';
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <!--Scripts-->
        <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
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


        <?php
// put your code here
        ?>




    </body>
</html>
