<?php 

    $hostname = "localhost";
    $username = "phpmyadmin";
    $password = "";    
    $database = "med-register";
    

    $db_conn = mysqli_connect($hostname, $username, $password, $database);

    if(!$db_conn){
        die("Connection error. Is server alive?" . mysqli_connect_error());
    } else {
        echo "<script>alert(\"Connection successful!\")</script>";
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
