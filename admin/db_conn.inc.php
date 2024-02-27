<?php

define("DB_HOST", "localhost");
define("DB_USER", "phpmyadmin");
define("DB_PASSWORD", "CUBEX1nscc");
define("DB_DATABASE", "med-register");

$db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$db_conn) {
    die("Connection error. Is the server alive? " . mysqli_connect_error());
} else {
    // Set the character set for the connection
    mysqli_set_charset($db_conn, "utf8");

}


    /**
    try{
        $db_conn = mysqli_connect($hostname, $username,
                                 $password, $database);
        
    } catch(Exception $e) {
        if(mysqli_connect_errno()){
            die("Connection error: ". mysqli_connect_error());
        }

    } */
    
    
  