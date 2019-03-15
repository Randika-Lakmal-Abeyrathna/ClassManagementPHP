<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//This file contains database Configerations 

class Database{
    private $_dbconnection;
    private static $_instance;
    private $_dbhost='localhost';
    private $_dbusername ='randika';
    private $_dbpassword='Admin@123';
    private $_dbname = 'mydb';
    
    public static function getInstance(){
        if (!self::$_instance) {
            self::$_instance=new self();
        }
        return self::$_instance;
    }
    
    private function __construct() {
        $this->_dbconnection = new mysqli($this->_dbhost, $this->_dbusername,
                $this->_dbpassword, $this->_dbname);
        
        if (mysqli_connect_error()) {
            trigger_error("Faild to connect to Database".mysqli_connect_error(),E_USER_ERROR);
        }
    }
    
    private function __clone() {
        
    }
    
    public function getConnection(){
        return $this->_dbconnection;   
    }
    
}
    
