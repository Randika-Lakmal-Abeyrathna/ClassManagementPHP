<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//This file contains database Configerations 

class dbConfig {

    function getdbConnection() {
//        $servername = "localhost";
//        $dbusername = "randika";
//        $dbpassword = "Admin@123";
//        $dbname = "mydb";
        // Create connection
        $conn = mysqli_connect("localhost","randika","Admin@123","mydb") or die("Couldn't connect");
//        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
//// Check connection
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
        return $conn;
    }

}
