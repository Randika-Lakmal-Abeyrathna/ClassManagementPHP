<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_SESSION['username']) != 1) {
    header('Location:index.php');
}
$id = '';
if (empty($_GET['id'])) {
    header('Location:lectures.php');
} else {

    $id = $_GET['id'];

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


    $sql = "DELETE FROM lecturer WHERE lec_id ='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location:lectures.php');
    }
}

